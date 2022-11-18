<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    
    function loginPage() {
        return view('auth.login');
    }

    function login(Request $request) {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = User::where('email', $request->email)->first();

            if ($user->user_level <= 5) {
                return redirect('/');
            } else if ($user->user_level > 5) {
                return redirect('/dashboard');
            }

        } else {
            return redirect('/login');
        }
    }
    function authLogout() {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

    function dashboard() {
        $user = auth()->user();

        if ($user->user_level < 6) {
            return redirect('/');
        }
        $products = Product::all();

        $loja = Loja::findOrFail(1);

        return view('admin.dashboard', ['products' => $products, 'loja' => $loja]);
    }

}
