<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginsController extends Controller
{

    public function __construct ()
    {
        $this->middleware('guest')->except ('logout');
    }

    public function create() {
        return view('auth.login');
    }

    public function store()
    {
        $user = User::where('name', request()->name)->orWhere('email', request()->name)->first();
        if ($user) {
            if (password_verify(request()->password, $user->password)) {
                if (request('remember')) {
                    auth()->login($user, true);
                }
                auth()->login($user, false);
                return redirect(request('page'));
            }
            return back();
        }
        return back();
    }

    public function logout() {
         auth()->logout();
         return back();
    }
}
