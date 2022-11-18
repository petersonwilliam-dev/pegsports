@extends('layouts.main')

@section('title', 'Cart | '.$user->name)

@section('links')
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/styleWelcome.css">
    <link rel="stylesheet" href="/css/styleCart.css">
@endsection

@section('content')
    <div class="content">
        <div class="title">
            <h1>Carrinho de {{$user->name}}</h1>
        </div>

        @if (count($products) > 0)
        <div class="content-cart">

        @foreach ($products as $product)
            <div class="container-product-single">
                <div class="img-product" style="text-align: center; margin-bottom:15px">
                    <img src="/img/img-products/{{$product->photosProduct[0]}}" width="200px" alt="">
                </div>
                <div class="description-product">
                    <h3 class="title_product">{{$product->name_product}}<h3>
                    @if ($product->promotion)
                        <p class="text-secondary-product">R$ {{$product->price}}</p>
                        <h4 style="color:#212529;">R$ {{$product->new_price}}<h4>
                        <p class="portion">Ou 4x de R$ {{floor($product->new_pice/4)}}</p>
                    @else
                        <h4 style="color:#212529;">R$ {{$product->price}}<h4>
                        <p class="portion">Ou 4x de R$ {{ceil($product->price/4)}}</p>
                    @endif
                    <a href="/product/{{$product->id}}"><button class="btn-primary">Ver detalhes</button></a>
                </div>
            </div>{{--container-product-single--}}
        @endforeach
        </div>{{--content-cart--}}

        @else
        <div style="text-align: center;">
            <h3>Não há produtos no seu carrinho, adicione produtos para aparecerem aqui</h3>
            <a href="/" style="text-decoration: none">
                <button class="btn-back">
                    Voltar à página inicial
                </button>
            </a>
        </div>


        @endif

    </div>{{--content--}}
@endsection
