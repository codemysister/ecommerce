<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function SliderView()
    {
        $slider = Slider::latest()->get();
        return view('admin.slider.slider_view', compact('slider'));
    }

    public function SliderStore(Request $request)
    {
        $request->validate([
            'slider_img' => 'required'
        ], [
            'slider_img.required' => 'Please insert slider image',
        ]);

        $image = $request->file('slider_img');
        $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/slider/' . $imageName);
        $imageUrl = 'upload/slider/' . $imageName;

        Slider::insert([
            'slider_img' => $imageUrl,
            'title' => $request->title,
            'description' => $request->description,
            'created_at'   => Carbon::now()
        ]);

        $notification = [
            'alert-type'    => 'success',
            'message'       => 'Add slider successfully'
        ];

        return redirect()->back()->with($notification);
    }

    public function SliderEdit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.slider_edit', compact('slider'));
    }

    public function SliderUpdate(Request $request)
    {
        $slider_id = $request->id;
        $old_image = $request->oldimage;

        if ($request->file('slider_img')) {
            $file = $request->file('slider_img');
            unlink($old_image);
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/slider/'), $fileName);
            $imageUrl = 'upload/slider/' . $fileName;

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $imageUrl,
                'updated_at' => Carbon::now()
            ]);

            $notification = [
                'alert-type' => 'info',
                'message' => 'Update slider successfully'
            ];

            return redirect()->route('slider.manage')->with($notification);
        } else {

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
            ]);

            $notification = [
                'alert-type' => 'info',
                'message' => 'Update slider successfully'
            ];

            return redirect()->route('slider.manage')->with($notification);
        }
    }

    public function SliderDelete($id)
    {
        $slider = Slider::findOrFail($id);
        unlink($slider->slider_img);

        Slider::findOrFail($id)->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Delete slider successfully'
        ];

        return redirect()->route('slider.manage')->with($notification);
    }

    public function SliderActive($id)
    {
        Slider::findOrFail($id)->update(['status' => 1]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Activate slider successfully'
        ];

        return redirect()->route('slider.manage')->with($notification);
    }

    public function SliderInActive($id)
    {
        Slider::findOrFail($id)->update(['status' => 0]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'InActivate slider successfully'
        ];

        return redirect()->route('slider.manage')->with($notification);
    }
}
