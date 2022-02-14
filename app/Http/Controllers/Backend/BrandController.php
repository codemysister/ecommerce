<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.brand_view', compact('brands'));
    }

    public function BrandStore(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_id' => 'required',
            'brand_image' => 'required'
        ], [
            'brand_name_en.required' => 'Please insert brand name in English',
            'brand_name_id.required' => 'Please insert brand name in Indonesia',
            'brand_image.required' => 'Please insert brand image',
        ]);

        $image = $request->file('brand_image');
        $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand/' . $imageName);
        $imageUrl = 'upload/brand/' . $imageName;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_id' => $request->brand_name_en,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_id' => strtolower(str_replace(' ', '-', $request->brand_name_id)),
            'brand_image'   => $imageUrl
        ]);

        $notification = [
            'alert-type'    => 'success',
            'message'       => 'Add brand successfully'
        ];

        return redirect()->back()->with($notification);
    }


    public function BrandEdit($id)
    {
        $brand = Brand::findOrFail($id)->first();
        return view('admin.brand.edit', compact('brand'));
    }

    public function BrandUpdate(Request $request)
    {
        $brand_id = $request->id;
        $old_image = $request->oldimage;

        if ($request->file('brand_image')) {
            $file = $request->file('brand_image');
            unlink($old_image);
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/brand/'), $fileName);
            $imageUrl = 'upload/brand/' . $fileName;

            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_id' => $request->brand_name_id,
                'brand_slug_en' => strtolower(str_replace('', '-', $request->brand_name_en)),
                'brand_slug_id' => strtolower(str_replace('', '-', $request->brand_name_id)),
                'brand_image' => $imageUrl
            ]);

            $notification = [
                'alert-type' => 'info',
                'message' => 'Update brand successfully'
            ];

            return redirect()->route('all.brands')->with($notification);
        } else {

            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_id' => $request->brand_name_id,
                'brand_slug_en' => strtolower(str_replace('', '-', $request->brand_name_en)),
                'brand_slug_id' => strtolower(str_replace('', '-', $request->brand_name_id)),
            ]);

            $notification = [
                'alert-type' => 'info',
                'message' => 'Update brand successfully'
            ];

            return redirect()->route('all.brands')->with($notification);
        }
    }

    public function BrandDelete($id)
    {
        $brand = Brand::findOrFail($id);
        unlink($brand->brand_image);

        Brand::findOrFail($id)->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Delete brand successfully'
        ];

        return redirect()->route('all.brands')->with($notification);
    }
}
