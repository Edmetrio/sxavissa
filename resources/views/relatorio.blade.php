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
            <h5>Relatorio</h5>
            <table class="table p-field p-col-12 p-md-12 table table-striped" style="margin-top: 2%;">
                <caption>Lista dos Relatório</caption>
                <thead>
                    <tr>
                        <th scope="col">Codigo de Barra</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ícone</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">SubTotal</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($relatorio as $c)
                    <tr>
                        <td>{{$c->artigos->codigobarra ?? ''}}</td>
                        <td>{{$c->artigos->nome ?? ''}}</td>
                        <td><img class="img-fluid" src="{{asset('storage')}}/{{$c->artigos->icon}}" style="width: 30px; text-align: center;" /></td>
                        <td>{{number_format($c->artigos->preco, 2, ',','.') ?? ''}}</td>
                        <td>{{$c->quantidade ?? ''}}</td>
                        <td>{{number_format($c->subtotal, 2, ',','.') ?? ''}}</td>
                        <td>{{$c->created_at->format('d-m-y')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection