<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function ProductAdd()
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();

        return view('admin.product.product_add', compact('brands', 'categories', 'subcategories', 'subsubcategories'));
    }

    public function ProductStore(Request $request)
    {
        $image = $request->file('product_thumbnail');
        $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $imageName);
        $imageUrl = 'upload/products/thumbnail/' . $imageName;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_id' => $request->product_name_id,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_id' => strtolower(str_replace(' ', '-', $request->product_name_id)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_id' => $request->product_tags_id,
            'product_size_en' => $request->product_size_en,
            'product_size_id' => $request->product_size_id,
            'product_color_en' => $request->product_color_en,
            'product_color_id' => $request->product_color_id,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_id' => $request->short_descp_id,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_id' => $request->long_descp_id,
            'product_thumbnail' => $imageUrl,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);


        // Upload Multi Image
        $multi_img = $request->file('multi_imgs');

        foreach ($multi_img as $img) {
            $imageName = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-images/' . $imageName);
            $imageUrl = 'upload/products/multi-images/' . $imageName;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $imageUrl,
                'created_at' => Carbon::now()
            ]);
        }

        $notification = [
            'alert-type'    => 'success',
            'message'       => 'Add Product successfully'
        ];

        return redirect()->route('product.manage')->with($notification);
    }

    public function ProductManage()
    {
        $products = Product::latest()->get();
        return view('admin.product.product_manage', compact('products'));
    }

    public function ProductEdit($id)
    {
        $multi_imgs = MultiImg::where('product_id', $id)->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $product = Product::findOrFail($id)->first();

        return view('admin.product.product_edit', compact('brands', 'categories', 'subcategories', 'subsubcategories', 'product', 'multi_imgs'));
    }

    public function ProductUpdate(Request $request)
    {
        $product_id = $request->product_id;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_id' => $request->product_name_id,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_id' => strtolower(str_replace(' ', '-', $request->product_name_id)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_id' => $request->product_tags_id,
            'product_size_en' => $request->product_size_en,
            'product_size_id' => $request->product_size_id,
            'product_color_en' => $request->product_color_en,
            'product_color_id' => $request->product_color_id,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_id' => $request->short_descp_id,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_id' => $request->long_descp_id,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        $notification = [
            'alert-type'    => 'success',
            'message'       => 'Update Product successfully'
        ];

        return redirect()->route('product.manage')->with($notification);
    }

    public function ProductUpdateMultiImg(Request $request)
    {
        $multi_imgs = $request->multi_imgs;

        foreach ($multi_imgs as $id => $img) {
            $old_img = MultiImg::where('id', $id)->first();
            unlink($old_img->photo_name);
            $imageName = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-images/' . $imageName);
            $imageUrl = 'upload/products/multi-images/' . $imageName;

            MultiImg::findOrFail($id)->update([
                'photo_name' => $imageUrl,
                'updated_at' => Carbon::now()
            ]);
        }

        $notification = [
            'alert-type'    => 'info',
            'message'       => 'Update Multi Image Product successfully'
        ];

        return redirect()->back()->with($notification);
    }

    public function ProductUpdateThumbnail(Request $request)
    {
        $product_id = $request->id;
        $old_img = $request->old_image;


        unlink($old_img);
        $image = $request->file('product_thumbnail_new');
        if ($image) {
            $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $imageName);
            $imageUrl = 'upload/products/thumbnail/' . $imageName;

            Product::findOrFail($product_id)->update([
                'product_thumbnail' => $imageUrl,
                'updated_at' => Carbon::now()
            ]);
        }

        $notification = [
            'alert-type'    => 'info',
            'message'       => 'Update Thumbnail Product successfully'
        ];

        return redirect()->back()->with($notification);
    }

    public function ProductDeleteMultiImg($id)
    {
        $old_img = MultiImg::findOrFail($id);
        unlink($old_img->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = [
            'alert-type'    => 'info',
            'message'       => 'Delete Multi Image Product successfully'
        ];

        return redirect()->back()->with($notification);
    }

    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);

        $notification = [
            'alert-type'    => 'success',
            'message'       => 'Product Activated successfully'
        ];

        return redirect()->route('product.manage')->with($notification);
    }


    public function ProductInActive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);

        $notification = [
            'alert-type'    => 'success',
            'message'       => 'Product InActivated successfully'
        ];

        return redirect()->route('product.manage')->with($notification);
    }

    public function ProductDelete($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('id', $id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }

        $notification = [
            'alert-type'    => 'success',
            'message'       => 'Delete Product successfully'
        ];

        return redirect()->route('product.manage')->with($notification);
    }
}
