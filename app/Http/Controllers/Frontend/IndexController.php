<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
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
}
