<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        // Task: fill in the code here to update name and email
        // Also, update the password if it is set

        $user = auth()->user();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password') ? Hash::make(request('password')) : $user->password; 
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated.');
    }
}
