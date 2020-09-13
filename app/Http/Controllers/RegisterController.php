<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RegisterRequest;

use App\Models\User;


class RegisterController extends Controller
{
  public function create()
  {
    return view('register');
  }

  public function store(RegisterRequest $req)
  //public function store()
  {
    //$user = User::create(request(['name', 'email', 'password']));
    $user = User::create(['name' => $req->name, 'email' => $req->email, 'password' => bcrypt($req->password)]);

    auth()->login($user);

    return redirect()->home();

  }
}
