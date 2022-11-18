<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index() {

        $releases = Product::all();

        $count = count($releases);

        return view('welcome', ['releases' => $releases, 'count' => $count]);
    }

    function show($id) {

        $user = auth()->user();

        $product = Product::findOrFail($id);
        $inCart = false;

        if ($user) {

            $userProducts = $user->cart->toArray();

            foreach ($userProducts as $userproduct) {
                if ($userproduct['id'] == $id) {
                    $inCart =  true;
                }
            }
        }

        return view('products.show', ['products' => $product, 'inCart' => $inCart]);
    }
    function create() {

        $user = auth()->user();

        if ($user->user_level < 6) {
            return redirect('/');
        }

        return view('products.create');
    }

    function store(Request $request) {

        $product = new Product;

        $product->name_product = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description_product = $request->description_product;
        $product->quantidade_produto = $request->theamount;
        $product->specifications = $request->specification;

        $allphotos = $request->photos;

        if ($request->hasFile('photos')) {
            foreach ($allphotos as $allphoto) {
                $requestImage = $allphoto;
                $ImageExtension = $requestImage->extension();
                $NewImageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $ImageExtension;
                $requestImage->move(public_path("/img/img-products"), $NewImageName);
                $newsphotos[] = $NewImageName;
            }
            $product->photosProduct = $newsphotos;
        }


        $product->save();

        return redirect('/dashboard');
    }


    function edit($id) {

        $user = auth()->user();

        if ($user->user_level < 6) {
            return redirect('/');
        }

        $product = Product::findOrFail($id);

        return view('products.edit', ['product' => $product]);
    }

    function update(Request $request) {

        $data = $request->all();

        if ($request->promotion) {
            $data['promotion'] = 1;
        }

        Product::findOrFail($request->id)->update($data);

        return redirect('/dashboard');
    }

    function destroy($id) {

        Product::findOrFail($id)->delete();

        return redirect('/admin');
    }

    function addCart($id) {

        $user = auth()->user();

        $user->cart()->attach($id);

        return redirect("/product/{$id}");
    }

    function leaveCart($id) {

        $user = auth()->user();

        $user->cart()->detach($id);

        return redirect("/product/{$id}");
    }

    function userCart() {

        $user = auth()->user();

        $productsCart = $user->cart;

        return view('products.cart', ['user' => $user, 'products' => $productsCart, 'si' => 4]);
    }

    function search() {

        $search = request('search');

        $products = Product::where([
            ['name_product', 'like', '%'.$search.'%']
        ])->get();

        return view('products.search', ['products' => $products, 'search' => $search]);
    }
}
