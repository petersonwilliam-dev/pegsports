<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="stylesheet" href="/CSS/styleEditProduct.css">
    <link rel="stylesheet" href="/css/styleDashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edit Product</title>
</head>
<body>

    <div class="navbar-dashboard">
        <h1 style="display: flex; align-items:center;"><img src="/img/logo.png" alt="logo" style="width: 50px; margin-right:15px"> <span style="color:#005eee"> Admin</span></h1>
    </div>{{--navbar--dashboard--}}

<div class="container-edit">
        <div class="container-form">
        <h1>Editar Produto</h1>
        <form action="/update" method="post" class="form-create" id="form-create" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{$product->id}}" name="id">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="name_product" value="{{$product->name_product}}" placeholder="Insira o nome do produto">
                <label for="floatingInput">Nome do produto</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" step="0.01" min="0" class="form-control" value="{{$product->price}}" name="price" id="floatingInput"  placeholder="Insira o preço do produto">
                <label for="floatingInput">Preço do produto</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="quantidade_produto" value="{{$product->quantidade_produto}}" id="floatingInput" placeholder="Insira a quantidade">
                <label for="floatingInput">Quantidade</label>
            </div>

            <div class="row">
            <div class="col-6">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onclick="liberaPromocao()" name="promotion" role="switch" id="Promotion">
                    <label class="form-check-label" for="Promotion">Promoção?</label>
                </div>
            </div>
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="number" disabled step="0.01" min="0" class="form-control" name="new_price" id="pricePromotion"  placeholder="Insira o novo preço">
                    <label for="pricePromotion">Preço em promoção</label>
                    </div>
                </div>
            </div>

            <div class="form-floating">
                <select class="form-select" name="category" id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="{{$product->category}}">{{$product->category}}</option>
                    <option value="chuteira">Chuteira</option>
                    <option value="roupas">Roupas</option>
                    <option value="equipamentos">Equipamentos</option>
                    <option value="bolas">bolas</option>
                </select>
                <label for="floatingSelect">Selecione a categoria do produto</label>
            </div>

            <br>

            <div class="form-floating">
                <textarea class="form-control" name="description_product" placeholder="Faça uma descrição do produto" id="floatingTextarea">{{$product->description_product}}</textarea>
                <label for="floatingTextarea">Descrição</label>
            </div>
            <br>
            <div class="form-floating">
                <textarea class="form-control" name="specifications" placeholder="Escreva as especificações do produto" id="floatingTextarea">{{$product->specifications}}</textarea>
                <label for="floatingTextarea">Especificações</label>
            </div>

            <div class="container-input" style="text-align: center;">
                <input type="submit" class="btn-edit" value="Editar">
            </div>
        </form>{{--form-create--}}
        </div>{{--container-form--}}
    </div>{{--container-create--}}

    <script src="/js/scriptEdit.js"></script>

</body>
</html>
