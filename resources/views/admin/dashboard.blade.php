<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styleDashboard.css">
    <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard  | PEG Sports</title>
</head>
<body>

    <div class="navbar-dashboard">
        <h1 style="display: flex; align-items:center;"><img src="/img/logo.png" alt="logo" style="width: 50px; margin-right:15px"> <span style="color:#005eee"> Admin</span></h1>
    </div>{{--navbar--dashboard--}}

    <div class="options-dashboard">
        <button onclick="amostraConteudo(0)" class="btn btn-primary"><ion-icon name="podium-outline"></ion-icon> Tabela</button>
        <button onclick="amostraConteudo(1)" class="btn btn-success"><ion-icon name="analytics-outline"></ion-icon> Gráfico</button>
        <button onclick="amostraConteudo(2)" class="btn btn-warning"><ion-icon name="reader-outline"></ion-icon> Produtos</button>
    </div>

        <div class="receita" data-option="0">
            <div class="balance">
                <p>Saldo Atual: <span class="balance_value"><ion-icon name="cash-outline"></ion-icon>R$ {{$loja->balance}}</span></p>
            </div>

            <div class="spending">
                <table class="table table-bordered border-dark" style="overflow: scroll;">
                <thead class="table-dark">
                    <tr>
                        <th>Mês</th>
                        <th>Ganho</th>
                        <th>Gasto</th>
                        <th>Lucro</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Janeiro</td>
                        <td class="earnings">R$ 500.00</td>
                        <td class="spendings">R$ 1000.00</td>
                        <td class="profits">R$ -500.00</td>
                    </tr>
                    <tr>
                        <td>Janeiro</td>
                        <td class="earnings">R$ 500.00</td>
                        <td class="spendings">R$ 1000.00</td>
                        <td class="profits">R$ -500.00</td>
                    </tr>
                    <tr>
                        <td>Janeiro</td>
                        <td class="earnings">R$ 500.00</td>
                        <td class="spendings">R$ 1000.00</td>
                        <td class="profits">R$ -500.00</td>
                    </tr>
                    <tr>
                        <td>Janeiro</td>
                        <td class="earnings">R$ 500.00</td>
                        <td class="spendings">R$ 1000.00</td>
                        <td class="profits">R$ -500.00</td>
                    </tr>
                </tbody>
                </table>

            </div>{{--spending--}}

        </div>{{--receita--}}

        <div class="grafico" data-option="1">
            <canvas id="line-charts"></canvas>
        </div>{{--grafico--}}

    <br><br>

<div class="sales_table" data-option="2">

    <h2 class="text-center text-dark">Tabela de produtos</h2>
    <br>

    <table id="minhaTabela" class="table">
    <thead class="table-dark bg-dark">
      <tr>
        <th>Nome</th>
        <th>Valor</th>
        <th>Quantidade</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
        <td>{{$product->name_product}}</td>
        <td>R$ {{$product->price}}</td>
        <td>{{$product->quantidade_produto}}</td>
        <td style="display: flex;">
            <a class="btn btn-primary" href="/product/edit/{{$product->id}}"><ion-icon name="pencil-outline"></ion-icon></a>
            <form action="/destroy/{{$product->id}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><ion-icon name="trash-outline"></ion-icon></button>
            </form>
        </td>
        </tr>
    @endforeach
    </tbody>
  </table>

  <br>
    <div class="text-end">
        <a href="/product/create" class="btn btn-primary"> <ion-icon name="add-outline"></ion-icon>Novo produto</a>
    </div>
</div>{{--sales_table--}}

{{--Graphic--}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{--Table--}}
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script>
const labels = [
'Janeiro',
'Fevereiro',
'Março',
'Abril',
'Maio',
'Junho',
'Julho',
'Agosto',
'Setembro',
'Outubro',
'Novembro',
'Dezembro',
];

const data = {
    labels: labels,
    datasets: [{
    label: 'Ganhos de vendas em R$',
    backgroundColor: 'rgb(0,0,0)',
    borderColor: 'rgb(0,0,0)',
    data: [0, 10, 5, 2, 20, 30, 45,33,55,66,2,70],
}]
};

const config = {
    type: 'line',
    data: data,
    options: {}
};

const myChart = new Chart(
    document.getElementById('line-charts'),
    config
);

</script>

<script>
    $(document).ready(function(){
      $('#minhaTabela').DataTable({
        	"language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
        });
  });
</script>

<script src="/JS/scriptDashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" > </script>
<script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js" > </script>
</body>
</html>
