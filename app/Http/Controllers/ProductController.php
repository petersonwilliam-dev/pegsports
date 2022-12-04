<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use App\Models\Product;
use App\Models\Profit;
use App\Models\Purchase;
use DateTime;
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
        $similar = Product::where([['category', $product->category]])->get();
        $inCart = false;

        if ($user) {

            $userProducts = $user->cart->toArray();

            foreach ($userProducts as $userproduct) {
                if ($userproduct['id'] == $id) {
                    $inCart =  true;
                }
            }
        }

        return view('products.show', ['products' => $product, 'inCart' => $inCart, 'similar' => $similar]);
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

    function buyItem($id) {

        $product = Product::findOrFail($id);

        return view('products.buy', ['product' => $product]);
    }

    function buy(Request $request) {

        $purchase = new Purchase();
        $profit = new Profit();
        $store = Loja::findOrFail(1);
        $product = Product::findOrFail($request->id);


        $purchase->id_product = $product->id;
        $purchase->buyers_name = $request->buyer_name;
        $purchase->cpf = $request->cpf;
        $purchase->phone = $request->phone;
        $purchase->email = $request->email;
        $purchase->uf = $request->uf;
        $purchase->city = $request->city;
        $purchase->address = $request->address;
        $purchase->home_number = $request->home_number;
        $purchase->card_numbers = $request->card_numbers;
        $purchase->cvv = $request->cvv;
        $purchase->due_date = $request->due_date;
        $purchase->quantity = $request->quantity;

        $purchase->save();

        $quant = $product->quantidade_produto;
        $product->update(['quantidade_produto' => $quant - $purchase->quantity]);

        $profit->date = date('Y,m,d');
        $profit->spent = 0;
        if ($product->promotion) {
            $profit->earnings = $product->new_price;
            $store->update(['balance' => $store->balance += $product->new_price]);
        }else {
            $profit->earnings = $product->price;
            $store->update(['balance' => $store->balance += $product->price]);
        }
        $profit->save();



        return redirect("/product/{$request->id}");
    }
}
