<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:users,name',
            'email' => 'required|email',
            'password' => 'required|min:6|same:re_pass'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }
        $user = User::query()->create(
            ['password' => Hash::make($request['pass'])] + $validator->validated()
        );
        Auth::login($user);
        return redirect()->route('main');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('main');
    }

    public function signin(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|min:6',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        if(!Auth::attempt($validator->validated())){
            return back()->withErrors(['invalid'=>'invalid credentials'])->withInput($request->all());
        }

        return redirect()->route('main');


    }
}
