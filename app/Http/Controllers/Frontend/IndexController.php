<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $slider = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $featured = Product::where('featured', 1)->limit(6)->get();
        $hot_deals = Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->limit(3)->get();
        $special_offer = Product::where('special_offer', 1)->limit(3)->get();
        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(5)->get();
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->get();
        return view('frontend.index', compact('categories', 'slider', 'products', 'featured', 'hot_deals', 'special_offer', 'special_deals', 'skip_category_0', 'skip_product_0'));
    }

    public function edit()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.user_profile', compact('user'));
    }

    public function update(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            unlink(public_path('upload/user_profile/' . $data->profile_photo_path));
            $filename = date('dMYH') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_profile/'), $filename);
            $data->profile_photo_path = $filename;
        }

        $data->save();

        $notification = [
            "alert-type" => 'success',
            "message" => "Update user profile successfully"

        ];

        return redirect()->route('dashboard')->with($notification);
    }

    public function changePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }

    public function updatePassword(Request $request)
    {

        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);


        $user = User::find(Auth::user()->id);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Update password successfully'
        ];

        if (Hash::check($request->oldpassword, $user->password)) {
            $hashPassword = Hash::make($request->password);
            $user->password = $hashPassword;
            $user->save();
            return redirect()->route('dashboard')->with($notification);
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function ProductDetail($id, $slug)
    {
        $product = Product::findOrFail($id);
        $color_en = explode(',', $product->product_color_en);
        $color_id = explode(',', $product->product_color_id);
        $size_en = explode(',', $product->product_size_en);
        $size_id = explode(',', $product->product_size_id);
        $multiImg = MultiImg::where('product_id', $id)->get();
        $relatedProduct = Product::where('category_id', $product->category_id)->orderBy('id', 'DESC')->limit(5)->get();
        return view('frontend.product.product_detail', compact('product', 'multiImg', 'color_en', 'color_id', 'size_id', 'size_en', 'relatedProduct'));
    }

    public function TagWishProduct($tag)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $products = Product::where('status', 1)->where('product_tags_en', $tag)->where('product_tags_id', $tag)->orderBy('id', 'DESC')->paginate(1);
        return view('frontend.tags.tag_view', compact('products', 'categories'));
    }

    public function SubCatWishProduct($id, $slug)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $products = Product::where('status', 1)->where('subcategory_id', $id)->orderBy('id', 'DESC')->paginate(1);
        return view('frontend.product.subcategory_view', compact('products', 'categories'));
    }

    public function SubSubCatWishProduct($id, $slug)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $products = Product::where('status', 1)->where('subsubcategory_id', $id)->orderBy('id', 'DESC')->paginate(2);
        return view('frontend.product.subsubcategory_view', compact('products', 'categories'));
    }

    public function ProductViewModal($id)
    {
        $product = Product::with('category', 'brand')->findOrFail($id);
        $color_en = explode(',', $product->product_color_en);
        $size_en = explode(',', $product->product_size_en);

        return response()->json(array(
            'product' => $product,
            'color'   => $color_en,
            'size'    => $size_en
        ));
    }
}
