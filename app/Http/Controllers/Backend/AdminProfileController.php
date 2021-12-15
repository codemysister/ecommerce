<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $user = Admin::find(2);
        return view('admin.admin_profile', compact('user'));
    }

    public function edit()
    {
        $user = Admin::find(2);
        return view('admin.admin_profile_edit', compact('user'));
    }

    public function update(Request $request)
    {
        $data = Admin::find(2);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->profile_photo_path) {
            $file = $request->profile_photo_path;
            @unlink(public_path('upload/profile/' . $data['profile_photo_path']));
            $filename = date('Ymdhis') . $file->getClientOriginalName();
            $file->move(public_path('upload/profile/'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $notification = [
            'message' => "Update profile successfully",
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.profile')->with($notification);
    }

    public function changePassword()
    {
        return view('admin.admin_change_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $password = Admin::find(2)->password;


        if (Hash::check($request->oldpassword, $password)) {
            $admin = Admin::find(2);
            $hashPassword = Hash::make($request->password);
            $admin->password = $hashPassword;
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        } else {
            return redirect()->back();
        }
    }
}
