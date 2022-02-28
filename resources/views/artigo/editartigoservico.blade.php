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
                <h5>Serviço</h5>
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


                <form action="{{url('artigo')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="ui-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Código de Barra</label>
                            <input name="codigobarra" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Categoria</label>
                            <select name="categoria_id" wire:model="selectedCategoria" class="form-control">
                                <option value="">Seleccione a Categoria</option>
                                @foreach($categoria as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        @if (!is_null($selectedCategoria))
                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Subcategoria</label>
                            <select name="subcategoria_id" class="form-control">
                                @foreach($subcategoria as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Tipo</label>
                            <select name="tipo_id" class="form-control">
                                <option value="9ed66d9f-614f-4adc-994f-a205099e95a4">Serviço</option>
                            </select>
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome do Artigo</label>
                            <input name="nome" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="lastname2">Ícone</label>
                            <input name="icon" type="file" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Preço</label>
                            <input name="preco" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            <input name="users_id" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required hidden value="{{ Auth::user()->id  }}" />
                            <input name="idacesso" hidden type="text" value="{{Auth::user()->idacesso}}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div>

                    </div>
                    <div class="p-field p-col-12 p-md-1">
                        <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                            <span class="ui-button-text ui-c">Adicionar</span></button>
                    </div>


                </form>

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

                </table>
            </div>

        </div>

    </div>
@endsection