@extends('templates.templates')

@section('content')
<div class="route-bar p-col-40 p-md-12 p-lg-12">
    <div class="route-bar-breadcrumb">
        <ul>
            <li>
                <a href="dashboard.html">
                    <i class="pi pi-home"></i>
                </a>
            </li>
            <li>/</li>
            <li><strong><a href="dashboard.html" class="ui-link ui-widget">Painel Principal</a></strong></li>
            <div class="overview-subinfo p-grid">
                <span class="p-col-12">Dados Estatístico das Últimas 24 Horas</span>
            </div>
        </ul>
    </div>
</div>
<div class="layout-content">
    <div class="p-col-12">
        <div class="card">
            <h5>Estoque</h5>
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Opss!</strong> Algum problema com seu formulário<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="table-responsive-md">
                <table class="table p-field p-col-12 p-md-12 table table-striped" style="margin-top: 2%;">
                    <caption>Lista do Estoque</caption>
                    <thead>
                        <tr>
                            <th scope="row">Nrº</th>
                            <th scope="col">Artigo</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">preço</th>
                            <th scope="col">Ícone</th>
                            <th scope="col">Armazém</th>
                            <th scope="col">Qtd. Mínimo</th>
                            <!-- <th scope="col">Utilizador</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stock as $c)
                        <tr>
                            <td scope="row">{{ ++$i }}</td>
                            <td>{{$c->artigos->nome}}</td>
                            <td>{{$c->quantidade}}</td>
                            <td>{{ number_format($c->artigos->preco, 2, ',','.')}}MT</td>
                            <td><img class="img-fluid" src="assets/images/artigo/{{$c->artigos->icon}}" style="width: 30px; text-align: center;" /></td>
                            <td>{{$c->armazens->nome}}</td>
                            <td>{{$c->stockminimo}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$stock->links()}}
                <style>
                    .w-5 {
                        display: none;
                        margin-left: 20%;
                    }
                </style>
            </div>
        </div>

    </div>

</div>
@endsection