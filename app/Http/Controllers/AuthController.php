<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(7);

        return view('backend.authenticates.list', compact('users'));
    }

    public function create()
    {
        return view('backend.authenticates.login');
    }

    public function store(UserRequest $userRequest)
    {
        $users = new User();
        $users->fill($userRequest->all());
        $users->password = Hash::make($userRequest->password);
        $users->level = 'SupAdmin';
        $users->save();

        return redirect()->route('login')->with('message', 'Bạn đã đăng ký thành công!');
    }

    public function login()
    {
        return view('backend.authenticates.login');
    }

    public function authenticate(Request $request)
    {
        $authenticate = $request->only('email', 'password');

        if (Auth::attempt($authenticate)) {
            Session::regenerate();
            Session::push('login', true);
            return redirect()->route('stories.index')->with('message', 'Bạn đã đăng nhập thành công!');
        } else {
            return redirect()->route('login')->with('error', 'Bạn đăng nhập thất bại');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('message', 'Bạn đã đăng xuất thành công!');
    }
}
