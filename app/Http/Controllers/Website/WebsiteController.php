<?php

namespace App\Http\Controllers\Website;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WebsiteController extends Controller
{
    // Home index
    public function index_view()
    {
        return view('index');
    }

    // Edit profile
    public function edit_profile_view()
    {
        return view('Website.profile');
    }

    public function profile_submit(Request $request)
    {
        $user_data = User::where('email', Auth::guard('web')->user()->email)->first();

        $request->validate([
            'name' => 'max:50',
            'email' => 'email:rfc,dns',
        ]);

        if ($request->password != '') 
        {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password',
            ]);
            
            $user_data->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo'))
        {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif',
            ]);

            if (file_exists( public_path('uploads/'.$user_data->photo) ) and (!empty($user_data->photo)) )
            {
                unlink(public_path('uploads/' . $user_data->photo));
            }

            $ext = $request->file('photo')->extension();
            $final_name = 'admin' . '.' . $ext;
            
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            
            $user_data->photo = $final_name;

        }

        $user_data->name = $request->name;
        $user_data->email = $request->email;
        $user_data->update();

        return redirect()->back()->with('success', 'Profile information is saved successfully!');
    }

    // Logout
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}