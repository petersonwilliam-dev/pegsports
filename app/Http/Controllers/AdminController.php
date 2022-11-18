<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dashboard() {

        $products = Product::all();

        return view('admin.dashboard', ['products' => $products]);
    }
}
