<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function showRegisterForm()
    {
        return view('users.register');
    }

    public function register(Request $request)
    {
        $param = $request->input('user'); // 連想配列を返す
        $param['password'] = Hash::make($param['password']); //ハッシュ化する（必須）
        $user = User::create($param);
        Auth::login($user);
        return view('todos.index', ['user' => $user]);
    }
}
