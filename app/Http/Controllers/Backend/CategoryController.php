<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $categories = Category::all();
        return view('admin.category.category_view', compact('categories'));
    }

    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_id' => 'required',
            'category_icon' => 'required',
        ], [
            'category_name_en.required' => 'Please insert category name in English',
            'category_name_id.required' => 'Please insert category name in Indonesia',
            'category_icon.required' => 'Please insert category icon',
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_id' => $request->category_name_id,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_slug_en)),
            'category_slug_id' => strtolower(str_replace(' ', '-', $request->category_slug_id)),
            'category_icon' => $request->category_icon,
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Insert category successfully'
        ];

        return redirect()->route('all.categories')->with($notification);
    }

    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id)->first();
        return view('admin.category.category_edit', compact('category'));
    }

    public function CategoryUpdate(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'category_name_en' => 'required',
            'category_name_id' => 'required',
            'category_icon' => 'required',
        ], [
            'category_name_en.required' => 'Please insert category name in English',
            'category_name_id.required' => 'Please insert category name in Indonesia',
            'category_icon.required' => 'Please insert category icon',
        ]);

        Category::findOrFail($id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_id' => $request->category_name_id,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_slug_en)),
            'category_slug_id' => strtolower(str_replace(' ', '-', $request->category_slug_id)),
            'category_icon' => $request->category_icon,
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Update category successfully'
        ];

        return redirect()->route('all.categories')->with($notification);
    }

    public function CategoryDelete($id)
    {
        Category::findOrFail($id)->delete();


        $notification = [
            'alert-type' => 'success',
            'message' => 'Delete category successfully'
        ];

        return redirect()->back()->with($notification);
    }
}
