@extends('layouts.main')

@section('title', 'PEG Sports | '.$products->name_product)

@section('links')
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/styleShow.css">
@endsection

@section('content')
    <main class="main" id="main">

        <div class="product">

            <div class="product_image">

            <div class="product-small-imgs">
                @foreach ($products->photosProduct as $indice => $photo)
                    <img src="/img/img-products/{{$photo}}" onclick="trocaFoto({{$indice}})"  alt="Product photo" class="small-imgs">
                @endforeach
            </div>{{--product-small-imgs--}}

                <div class="product-img">
                    <img src="/img/img-products/{{$products->photosProduct[0]}}" alt="Imagem do produto" id="product_full_img" class="product_full_img">
                </div>{{--product-img--}}

            </div>{{--product_img--}}

            <div class="product_description">
                <h1>{{$products->name_product}}</h1>
                <div class="evaluation">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>{{--evualtion--}}
                <div class="price-content">
                    @if ($products->promotion)
                    <span class="price-promotion">R$ 1.099,00</span>
                    @endif
                    <h3 class="price">R$ {{number_format($products->price, 2, "." ,',')}}</h3>
                    <span class="card-installment"><ion-icon name="card-outline"></ion-icon> até 11x de {{}}</span>
                </div>number_format(($products->price/11), 2, "." ,',')
                <div class="buy-area">
                    <button href="#" class="btn-buy"><ion-icon name="bag-handle-outline"></ion-icon> Comprar</button>
                    @if (!$inCart)
                        <a href="/addCart/{{$products->id}}" style="text-decoration: none;"><button class="btn-cart"><ion-icon name="cart-outline"></ion-icon><ion-icon name="add-outline"></ion-icon>Adicionar ao carrinho</button></a>
                    @else
                        <form action="/leave/{{$products->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button id="button_leaveCart" type="submit" class="btn-cart-disabled" onmouseover="mudaBotao(1)" onmouseout="mudaBotao(2)"><ion-icon name="cart-outline"></ion-icon><ion-icon name="checkmark-outline"></ion-icon>Adicionado ao carrinho</button>
                        </form>
                    @endif
                    <a href="#info" style="font-weight: 300; display: block">mais informações</a>
                </div>{{--buy-area--}}
            </div>{{--product_description--}}
        </div>{{--product--}}

        <div class="product_info" id="info">
            <h3>Informações sobre Produto</h3>
            <p class="specification-product">
                {{$products->specifications}}
            </p>
        </div>{{--product_info--}}


        <h3 class="title">Semelhantes</h3>

        <div class="barra_lateral">
            <div class="container-itens" id="car">



            </div>{{--container-products--}}
        </div>{{--barra-produto--}}
    </main>{{--main--}}

    <footer class="footer" id="footer">
    <div class="payements-accepted">
        <h4 style="font-size: 14pt; color: #005eee; margin: 10px 0;">Aceitamos os cartões</h4>
        <div class="payements-cards">
            <img src="/img/visa.png" alt="" class="payement-card">
            <img src="/img/mastercard.png" alt="" class="payement-card">
            <img src="/img/hipercard.png" alt="" class="payement-card">
            <img src="/img/alelo.png" alt="" class="payement-card">
            <img src="/img/elo.png" alt="" class="payement-card">
            <img src="/img/maestro.png" alt="" class="payement-card">
        </div>{{--payements-cards--}}
    </div>{{--payements-accepted--}}
        <hr>
    <div class="footer-container">
        <div class="footer-content">
            <h4 class="title-footer">Ajuda</h4>
            <ul class="list-footer">
                <li class="footer-item"><a href="#" class="link-footer">Troca e devoluções</a></li>
                <li class="footer-item"><a href="#" class="link-footer">Entregas</a></li>
                <li class="footer-item"><a href="#" class="link-footer">Minha conta</a></li>
                <li class="footer-item"><a href="#" class="link-footer">Meus pedidos</a></li>
                <li class="footer-item"><a href="#" class="link-footer">Pagamentos</a></li>
                <li class="footer-item"><a href="#" class="link-footer">Cancelamentos</a></li>
                <li class="footer-item"><a href="#" class="link-footer">Como comprar</a></li>
                <li class="footer-item"><a href="#" class="link-footer">Guia de segurança digital</a></li>
            </ul>
        </div>{{--footer-content--}}
        <div class="footer-content">
            <h4 class="title-footer">Marketplace</h4>
            <ul class="list-footer">
                <li class="footer-item"><a href="#" class="link-footer">Proteção de marcas</a></li>
                <li class="footer-item"><a href="#" class="link-footer">Venda seus produtos</a></li>
            </ul>
        </div>{{--footer-content--}}

        <div class="footer-content">
            <h4 class="title-footer">Serviços</h4>
            <ul class="list-footer">
                <li class="footer-item"><a href="#" class="link-footer">Revista PEG</a></li>
                <li class="footer-item"><a href="#" class="link-footer">Kit de treino</a></li>
                <li class="footer-item"><a href="#" class="link-footer">Cartão PEG</a></li>
                <li class="footer-item"><a href="#" class="link-footer">Consórcio PEG</a></li>
                <li class="footer-item"><a href="#" class="link-footer">Cliente Ouro</a></li>
                <li class="footer-item"><a href="#" class="link-footer">Carnê digital</a></li>
                <li class="footer-item"><a href="#" class="link-footer">Empresas PEG</a></li>
            </ul>
        </div>{{--footer-content--}}

    </div>{{--footer-container--}}

</footer>
    <div class="end-footer">
        <p>Preços e condições de pagamento exclusivos para compras via internet, podendo variar nas lojas físicas. Ofertas válidas na compra de até 5 peças de cada produto por cliente, até o término dos nossos estoques para internet. Caso os produtos apresentem divergências de valores, o preço válido é o da sacola de compras</p>
        <p>Vendas sujeitas a análise e confirmação de dados.</p>
        <p>A PEG Sports atua como correspondente no País, nos termos da Resolução CMN nº 4.954/2021, e encaminha propostas de cartão de crédito e operações de crédito para a Luizacred S.A Sociedade de Crédito, Financiamento e Investimento inscrita no CNPJ sob o nº 02.206.577/0001-80</p>
        <p>PEG Sports S/A - CNPJ: 47.960.950/1088-36</p>
        <p>Endereço: Rua Arnulfo de Lima, 2385 - Vila Santa Cruz, Franca/SP - CEP 14.403-471</p>
        <p>® PEG Sports – Todos os direitos reservados. Endereço eletrônico: https://www.pegsoprts.com.br</p>
        <p>Fale conosco: https://www.pegsports.com.br/central-de-atendimento/fale-conosco/</p>
    </div>{{--end-footer--}}

    <script src="/JS/scriptShow.js"></script>
@endsection
