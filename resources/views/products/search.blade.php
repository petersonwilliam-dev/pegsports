@extends('layouts.main')

@section('links')
    <link rel="stylesheet" href="/css/styleWelcome.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/styleSearch.css">
@endsection

@section('title', 'Busca | '.$search)

@section('content')
<div class="content">
        <div class="title">
            <h1>Pesquisa: <span class="product-search">{{"'".$search."'"}}</span></h1>
        </div>

        @if (count($products) > 0)
        <div class="content-search">

        @foreach ($products as $product)
        <div class="container-product-single">
                    <a href="/product/{{$product->id}}" style="text-decoration: none;">
                    <div class="img-product" style="text-align: center;">
                        <img src="/img/img-products/{{$product->photosProduct[0]}}" width="200px" alt="">
                    </div>
                    <div class="description-product">
                        <h3 class="title_product">{{$product->name_product}}<h3>
                        <div class="evaluation">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star-half"></ion-icon>
                        </div>
                        <p style="color: #008000; font-weight: 300">FRETE GRÁTIS <ion-icon name="checkmark"></ion-icon></p>
                        @if ($product->promotion)
                            <p class="text-secondary-product">R$ {{$product->price}}</p>
                            <h4 style="color:#212529;">R$ {{$product->new_price}}<h4>
                            <p class="portion">Ou 4x de R$ {{floor($product->new_pice/4)}}</p>
                        @else
                            <h4 style="color:#212529;">R$ {{$product->price}}<h4>
                            <p class="portion">Ou 4x de R$ {{ceil($product->price/4)}}</p>
                        @endif
                    </a>
            </div>{{--container-product-single--}}
            </div>{{--content-search--}}
        @endforeach

        @else
        <div style="text-align: center;">
            <h3 style="text-align: center;">Não há produtos com esse nome ou semelhante, pesquise por outro</h3>
            
            <a href="/" style="text-decoration: none">
                <button class="btn-back">
                    Voltar à página inicial
                </button>
            </a>
        </div>
        @endif

    </div>{{--content--}}
@endsection
