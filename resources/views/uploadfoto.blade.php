<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@foreach ($fotos as $foto)

@if ($similar)

@foreach ($similar as $like)

<div class="container-product-single">
        <a href="/product/{{$like->id}}" style="text-decoration:none;">
        <div class="img-product">
            <img src="/img/img-products/{{$like->photosProduct[0]}}" width="200px" alt="{{$like->name_product}}">
        </div>
        <div class="description-product">
            <h3 class="title_product">{{$like->name_product}}<h3>
            <div class="evaluation">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star-half"></ion-icon>
            </div>
            <p style="color: #008000; font-weight: 300">FRETE GRÁTIS <ion-icon name="checkmark"></ion-icon></p>
            @if ($like->promotion)
                <p class="text-secondary-product">R$ {{$like->price}}</p>
                <h4 style="color:#212529;">R$ {{$like->new_price}}<h4>
                <p class="portion">Ou 4x de R$ {{floor($like->new_pice/4)}}</p>
            @else
                <h4 style="color:#212529;">R$ {{$like->price}}<h4>
                <p class="portion">Ou 4x de R$ {{ceil($like->price/4)}}</p>
            @endif
        </div>
        </a>

    </div>{{--container-product-single--}}

@endforeach
@else

<h3 style="text-align: center;">Não há produtos semelhantes ao produto que você pesquisou</h3>

@endif

@endforeach

</body>
</html>
