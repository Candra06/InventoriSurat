<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        return view('dashboard.setting.profile', compact('user'));
    }

    public function password()
    {
        return view('dashboard.setting.password');
    }

    public function updateprofile(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'avatar' => 'file|between:0,2048|mimes:jpeg,jpg,png',
        ]);

        $user = User::where('id', $id)->first();

        if ($request['avatar']) {
            if($user->avatar) {
                Storage::delete($user->avatar);
            }
            $filetype = $request->file('avatar')->extension();
            $text = Str::random(16) . '.' . $filetype;
            $data['avatar'] = Storage::putFileAs('postImage', $request->file('avatar'), $text);
        }

        $user->update($data);
        return redirect('/dashboard/settings/profile')->with('status', 'Profile Updated');
    }

    public function updatepassword(Request $request)
    {
        $data = $request->validate([
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8',
        ]);

        $currentPassword = Auth::user()->password;
        if(Hash::check($data['old_password'], $currentPassword)) {
            $user = User::where('id', Auth::user()->id)->first();
            $password = Hash::make($data['new_password']);
            $user->update(['password' => $password]);
            return redirect('/dashboard/settings/password')->with('status', 'Password Diganti');
        } else {
            return redirect('/dashboard/settings/password')->with('password', 'Password Lama Salah');
        }
    }
}
