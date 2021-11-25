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
            <h5>Artigos</h5>
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

                <div class="table-responsive">
                <table class="table p-field p-col-12 p-md-12 table table-striped" style="margin-top: 2%;">
                    <caption>Lista dos Artigos</caption>
                    <thead>
                        <tr>
                            <th scope="col">Codigo de Barra</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">SubCategoria</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Ícone</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Iva</th>
                            <th scope="col">Acções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($artigo as $c)
                        <tr>
                            <td>{{$c->codigobarra}}</td>
                            <td>{{$c->categorias->nome}}</td>
                            <td>{{$c->subcategorias->nome}}</td>
                            <td>{{$c->tipos->nome}}</td>
                            <td>{{$c->nome}}</td>
                            <td><img class="img-fluid" src="assets/images/artigo/{{$c->icon}}" style="width: 30px; text-align: center;" /></td>
                            <td>{{$c->preco}}</td>
                            <td>{{$c->iva}}</td>
                            <td role="gridcell"   style="display: flex; justify-content: flex-start;">
                                <a href="{{url("artigo/$c->id/edit")}}" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only edit-button rounded-button ui-button-success"><span class="ui-button-icon-left ui-icon ui-c pi pi-pencil"></span><span class="ui-button-text ui-c">ui-button</span></a>
                                <form action="{{ route('subcategoria.destroy',$c->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-button-warning rounded-button"><span class="ui-button-icon-left ui-icon ui-c pi pi-trash"></span><span class="ui-button-text ui-c">ui-button</span></button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
        </div>

    </div>

</div>
@endsection