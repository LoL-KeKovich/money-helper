<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required|alpha_dash',
        ]);
        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->initials = $request->initials;
        $user->role = $request->role;
        $user->save();
        return(json_encode('created user'));
    }

    public function update(Request $request, $pass) {
        $request->validate([
            'password'=>'required',
            'email'=>'prohibited',
            'initials'=>'prohibited',
            'role'=>'prohibited',
        ]);
        $user = User::find($pass);
        $request->merge([
            'password' => Hash::make($request->password),
        ]);
        $user->update($request->all());
        return(json_encode('changed password'));
    }
}
