<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     public function create()
     {
         return view('user.create');
     }

     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required',
             'email' => 'required|email|unique:users',
             'password' => 'required|confirmed',
         ]);

         $user = User::query()->create([
             'name' => $request->name,
             'email' => $request->email,
//             'password' => Hash::make($request->password),
             'password' => bcrypt($request->password),
         ]);

         session()->flash('success', 'Регистрация пройдена');
         Auth::login($user);
         return redirect()->route('home');
     }
}
