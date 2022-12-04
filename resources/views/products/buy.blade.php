@extends('layouts.main')

@section('title', 'Comprar')

@section('links')
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/styleWelcome.css">
<link rel="stylesheet" href="/css/styleBuy.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-lg-6">
                <div class="container-form-buy">
                    <h3 class="text-center">Dados da compra</h3>

                    <form action="/buy/{{$product->id}}" method="post" style="margin: 20px 0;">
                    @csrf

                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="buyer_name" onkeyup="verifyInputs(0)" id="floatingInput" placeholder="Nome do comprador">
                        <label for="floatingInput">Nome do destinatário</label>
                    </div>

                    <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="cpf" maxlength="15" onkeyup="verifyInputs(1)" id="floatingInputGrid" placeholder="CPF">
                            <label for="floatingInputGrid">CPF</label>
                        </div>
                    </div>{{--col-md--}}
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="phone" onkeyup="verifyInputs(2)" id="floatingInputGrid" placeholder="phone">
                            <label for="floatingInputGrid">Telefone</label>
                        </div>
                    </div>{{--col-md--}}
                    </div>{{--row-g2--}}


                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" onkeyup="verifyInputs(3)" id="floatingInput" placeholder="Email">
                        <label for="floatingInput">Email</label>
                    </div>


                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                            <select class="form-select form-control" name="uf" onmouseout="verifyInputs(4)" id="floatingSelectGrid">
                                <option selected></option>
                                <option value="Acre">AC</option>
                                <option value="Alagoas">AL</option>
                                <option value="Amapá">AP</option>
                                <option value="Amazonas">AM</option>
                                <option value="Bahia">BA</option>
                                <option value="Ceara">CE</option>
                                <option value="Espírito Santo">ES</option>
                                <option value="Goiás">GO</option>
                                <option value="Maranhão">MA</option>
                                <option value="Mato Grosso">MT</option>
                                <option value="Mato Grosso do Sul">MS</option>
                                <option value="Minas Gerais">MG</option>
                                <option value="Pará">PA</option>
                                <option value="Paraíba">PB</option>
                                <option value="Paraná">PR</option>
                                <option value="Pernambuco">PE</option>
                                <option value="Piauí">PI</option>
                                <option value="Rio de Janeiro">RJ</option>
                                <option value="Rio Grande do Norte">RN</option>
                                <option value="Rio Grande do Sul">RS</option>
                                <option value="Rondônia">RO</option>
                                <option value="Roraima">RR</option>
                                <option value="Santa Catariona">SC</option>
                                <option value="São Paulo">SP</option>
                                <option value="Sergipe">SE</option>
                                <option value="Tocantins">TO</option>
                                <option value="Distrito Federal">DF</option>
                            </select>
                            <label for="floatingSelectGrid">Selecione seu Estado</label>
                            </div>
                        </div>{{--col-md--}}
                        <div class="col-md">
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="city" onkeyup="verifyInputs(5)" id="floatingInputGrid" placeholder="name@example.com">
                            <label for="floatingInputGrid">Cidade</label>
                            </div>
                        </div>{{--col-md--}}
                    </div>

                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="address" onkeyup="verifyInputs(6)" id="floatingInput" placeholder="Endereço">
                                <label for="floatingInput">Endereço</label>
                            </div>
                        </div>{{--col-md--}}
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="int" class="form-control" maxlength="4" name="home_number" onkeyup="verifyInputs(7)" id="floatingInput" placeholder="Número da casa">
                                <label for="floatingInput">Número da casa</label>
                            </div>
                        </div>{{--col-md--}}
                    </div>


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="card_numbers" maxlength="22" onkeyup="verifyInputs(8)" id="floatingPassword" placeholder="Números do cartão ">
                        <label for="floatingPassword">Números do cartão</label>
                    </div>

                    <div class="row g-3">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="cvv" onkeyup="verifyInputs(9)" maxlength="3" id="floatingInputGrid" placeholder="CVV">
                            <label for="floatingInputGrid">CVV</label>
                        </div>
                    </div>{{--col-md--}}

                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="date" onkeyup="verifyInputs(10)" name="due_date" class="form-control" require id="floatingInputGrid" placeholder="Vencimento do cartão">
                            <label for="floatingInputGrid">Vencimento do cartão</label>
                        </div>
                    </div>{{--col-md--}}

                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="int" onkeyup="verifyInputs(11)" maxlength="3" name="quantity" class="form-control" require id="floatingInputGrid" placeholder="Quantidade">
                            <label for="floatingInputGrid">Quantidade</label>
                        </div>
                    </div>{{--col-md--}}
                    </div>{{--row-g2--}}

                    <div class="text-center">
                        <button type="submit" id="btn-buy" disabled class="btn btn-primary">Comprar <ion-icon style="margin-left: 10px;" name="bag-check-outline"></ion-icon></button>
                    </div>

                    </form>{{--form--}}

                </div>{{--container-form-buy--}}
            </div>{{--col--}}


            <div class="col-12 col-lg-6 text-center" style="padding: 20px;">
                <img src="/img/img-products/{{$product->photosProduct[0]}}" class="img-product" alt="">
                <div class="info-product text-start">
                    <h3>{{$product->name_product}}</h3>
                    @if ($product->promotion)
                        <h5 class="text-secondary lead" style="text-decoration: line-through;">R$ {{number_format(($product->price), 2, "." ,',')}}</h5>
                        <h4 style="color:#212529;">R$ {{number_format(($product->new_price), 2, "." ,',')}}<h4>
                    @else
                        <h4>R$ {{number_format(($product->price), 2, "." ,',')}}</h4>
                    @endif
                    <p style="color: #008000; font-weight: 500">FRETE GRÁTIS <ion-icon name="checkmark"></ion-icon></p>
                </div>{{--info--product--}}
            </div>{{--col--}}
        </div>{{--row--}}

    </div>{{--container-fluid--}}

    <script src="/js/scriptBuy.js"></script>
@endsection
