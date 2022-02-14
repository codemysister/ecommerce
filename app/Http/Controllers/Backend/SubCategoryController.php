<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('admin.category.subcategory_view', compact('subcategory', 'categories'));
    }

    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_id' => 'required',
        ], [
            'category_id.required' => 'Please insert category',
            'subcategory_name_en.required' => 'Please insert subcategory in English',
            'subcategory_name_id.required' => 'Please insert subcategory in Indonesia',
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_id' => $request->subcategory_name_id,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_id' => strtolower(str_replace(' ', '-', $request->subcategory_name_id)),
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Add sub category successfully'
        ];

        return redirect()->route('all.subcategories')->with($notification);
    }

    public function SubCategoryEdit($id)
    {

        $category = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.category.subcategory_edit', compact('subcategory', 'category'));
    }

    public function SubCategoryUpdate(Request $request)
    {
        $id = $request->subcategory_id;

        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_id' => 'required',
        ], [
            'category_id.required' => 'Please insert category',
            'subcategory_name_en.required' => 'Please insert subcategory in English',
            'subcategory_name_id.required' => 'Please insert subcategory in Indonesia',
        ]);

        SubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_id' => $request->subcategory_name_id,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_id' => strtolower(str_replace(' ', '-', $request->subcategory_name_id)),
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Update sub category successfully'
        ];

        return redirect()->route('all.subcategories')->with($notification);
    }

    public function SubCategoryDelete($id)
    {
        SubCategory::findOrFail($id)->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Delete sub category successfully'
        ];

        return redirect()->back()->with($notification);
    }


    // Sub SubCategory
    public function SubSubCategoryView()
    {
        $categories = Category::latest()->get();
        $sub_subcategory = SubSubCategory::latest()->get();
        return view('admin.category.sub_subcategory_view', compact('sub_subcategory', 'categories'));
    }

    public function SubSubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_id' => 'required',
        ], [
            'category_id.required' => 'Please insert category',
            'subcategory_id.required' => 'Please insert sub category',
            'subsubcategory_name_en.required' => 'Please insert sub-subcategory in English',
            'subsubcategory_name_id.required' => 'Please insert sub-subcategory in Indonesia',
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_id' => $request->subsubcategory_name_id,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_id' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_id)),
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Insert Sub-subcategory successfully'
        ];

        return redirect()->route('all.subsubcategories')->with($notification);
    }

    public function SubSubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);

        return view('admin.category.sub_subcategory_edit', compact('categories', 'subcategories', 'subsubcategory'));
    }



    public function SubSubCategoryUpdate(Request $request)
    {

        $id = $request->subsubcategory_id;

        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_id' => 'required',
        ], [
            'category_id.required' => 'Please insert category',
            'subcategory_id.required' => 'Please insert sub category',
            'subsubcategory_name_en.required' => 'Please insert subcategory in English',
            'subsubcategory_name_id.required' => 'Please insert subcategory in Indonesia',
        ]);

        SubSubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_id' => $request->subsubcategory_name_id,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_id' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_id)),
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Update sub-subcategory successfully'
        ];

        return redirect()->route('all.subsubcategories')->with($notification);
    }

    public function SubSubCategoryDelete($id)
    {
        SubSubCategory::findOrFail($id)->delete();
        $notification = [
            'alert-type' => 'success',
            'message' => 'Delete sub-subcategory successfully'
        ];

        return redirect()->back()->with($notification);
    }

    public function GetSubCategory($id)
    {
        $subcategory = SubCategory::where('category_id', $id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subcategory);
    }

    public function GetSubSubCategory($id)
    {
        $subsubcategory = SubSubCategory::where('subcategory_id', $id)->orderBy('subsubcategory_name_en', 'ASC')->get();
        return json_encode($subsubcategory);
    }
}
