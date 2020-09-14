<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\SocialController;

class SessionController extends Controller
{

    function __construct() {
      $this->middleware('guest',['except' => 'destroy']);
    }

    function create() {
        return view('login');
    }

    function store(LoginRequest $req) {
        if (! auth()->attempt(['name' => $req->name, 'password' => $req->password])) {
          return back()->with('error', 'Неверный логин или пароль');
        }
        return redirect()->home();
    }

    function destroy(Request $req) {
        auth()->logout();
        session()->flush();
        session()->regenerate();
        return redirect()->home();
    }
}
