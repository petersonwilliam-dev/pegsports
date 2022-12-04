@extends('layouts.main')

@section('title', 'PEG Sports')

@section('links')
<link rel="stylesheet" href="/css/styleWelcome.css">
<link rel="stylesheet" href="/css/style.css">
@endsection

@section('content')

<div class="intro">
    <img src="/img/imgintro.jpg" alt="intro" class="img_intro">
</div>{{--intro--}}

<main class="main" id="main">
    <section class="lancamentos">
        <h3 class="title">Lançamentos</h3>

        <div class="barra_lateral">
            <div class="container-itens" id="car">
                @for ($i = ($count - 5); $i < $count; $i++)

                <div class="container-product-single">
                    <a href="/product/{{$releases[$i]->id}}" style="text-decoration:none;">
                    <div class="img-product">
                        <img src="/img/img-products/{{$releases[$i]->photosProduct[0]}}" width="190px" alt="{{$releases[$i]->name_product}}">
                    </div>
                    <div class="description-product">
                        <h3 class="title_product">{{$releases[$i]->name_product}}<h3>
                        <div class="evaluation">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star-half"></ion-icon>
                        </div>
                        <p style="color: #008000; font-weight: 300">FRETE GRÁTIS <ion-icon name="checkmark"></ion-icon></p>
                        @if ($releases[$i]->promotion)
                            <p class="text-secondary-product">R$ {{number_format(($releases[$i]->price), 2, "," ,'.')}}</p>
                            <h4 style="color:#212529;">R$ {{number_format(($releases[$i]->new_price), 2, "," ,'.')}}<h4>
                            <p class="portion">Ou 4x de R$ {{number_format(($releases[$i]->price/11), 2, "," ,'.')}}</p>
                        @else
                            <h4 style="color:#212529;">R$ {{number_format(($releases[$i]->price), 2, "," ,'.')}}<h4>
                            <p class="portion">Ou 4x de R$ {{number_format(($releases[$i]->price/11), 2, "," ,'.')}}</p>
                        @endif
                    </div>
                    </a>

                </div>{{--container-product-single--}}
                @endfor
            </div>{{--container-products--}}
        </div>{{--barra-produto--}}

    </section>{{--lancamentos--}}

    <section class="announcement">
        <img src="/img/calcoes.png" class="img_announcement" height="350px" alt="anuncio">
        <img src="/img/preserve.png" class="img_announcement" alt="anuncio">
        <img src="/img/europeu.png" class="img_announcement" alt="anuncio">
    </section>{{--announcement--}}

    <section class="peg_itens">

        <h3 class="title">Na  <img src="/img/logo.png" width="30px" alt="">  temos</h3>

            <div class="container-itens">
                @for ($i = 0; $i <= 7; $i++)
                <div class="container-item-single">
                    <img src="" class="img_item" alt="">
                    <p class="name_item"></p>
                </div>
                @endfor
            </div>{{--container-items--}}

    </section>{{--peg_itens--}}

    <section class="carrossel">
        <div class="container-carrossel">
            <div class="carrossel-items" id="carrossel">
                <img src="/img/superfly.jpg" width="" class="img_carrossel" alt="Anúncio carrossel">
                <img src="/img/camisaseuropeias.jpg" class="img_carrossel" alt="Anúncio carrossel">
            </div>{{--carrossel-items--}}
        </div>{{--container-carrossel--}}
    </section>{{--carrossel--}}
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

    <script src="/js/scriptWelcome.js"></script>
@endsection
