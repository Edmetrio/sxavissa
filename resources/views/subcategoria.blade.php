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
            <h5>Subcategorias</h5>
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

                @can('subcategoria-criar')
                <form action="{{url('subcategoria')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="ui-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Subcategoria</label>
                            <input name="nome" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                            <input name="users_id" hidden type="text" value="{{Auth::user()->id}}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            <input name="idacesso" hidden type="text" value="{{Auth::user()->idacesso}}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Categoria</label>
                            <select name="categoria_id" class="form-control">
                                <option value="">Seleccione a Categoria</option>
                                    @foreach($categoria as $c)
                                    <option value="{{$c->id}}">{{$c->nome}}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="lastname2">Ícone</label>
                            <input name="icon" type="file" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                        </div>

                        </div>
                        <div class="p-field p-col-12 p-md-1">
                            <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                                <span class="ui-button-text ui-c">@if(isset($var)) Alterar @else Adicionar @endif</span></button>
                        </div>
                </form>
                @endcan
                <div class="table-responsive-md">
                <table class="table p-field p-col-12 p-md-12 table table-striped" style="margin-top: 2%;">
                    <caption>Lista de Categorias</caption>
                    <thead>
                        <tr>
                            <th scope="col">Subcategoria</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Data de Criação</th>
                            <th scope="col">Acções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subcategoria as $c)
                        <tr>
                            <td>{{$c->nome}}</td>
                            <td>{{$c->categorias->nome}}</td>
                            <td><img class="img-fluid" src="assets/images/subcategoria/{{$c->icon}}" style="width: 30px; text-align: center;" /></td>
                            <td>{{$c->estado}}</td>
                            <td>{{ $c->created_at->diffForhumans() }}</td>
                            <td role="gridcell"   style="display: flex; justify-content: flex-start;">
                            @can('subcategoria-alterar')   
                            <a href="{{url("subcategoria/$c->id/edit")}}" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only edit-button rounded-button ui-button-success"><span class="ui-button-icon-left ui-icon ui-c pi pi-pencil"></span><span class="ui-button-text ui-c">ui-button</span></a>
                            @endcan
                            @can('subcategoria-apagar')   
                            <form action="{{ route('subcategoria.destroy',$c->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-button-warning rounded-button"><span class="ui-button-icon-left ui-icon ui-c pi pi-trash"></span><span class="ui-button-text ui-c">ui-button</span></button>
                            </form>
                            @endcan
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