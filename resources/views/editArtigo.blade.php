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


            <form method="POST" action="{{ route('artigo.update', $artigo->id) }}"  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="ui-fluid p-formgrid p-grid">
                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Código de Barra</label>
                        <input name="codigobarra" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required value="{{$artigo->codigobarra}}" />
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Nome da Categoria</label>
                        <select name="categoria_id" class="form-control">
                            <option value="{{$artigo->categorias->id}}">{{$artigo->categorias->nome}}</option>
                            @foreach($categoria as $c)
                            <option value="{{$c->id}}">{{$c->nome}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Nome da Subcategoria</label>
                        <select name="subcategoria_id" class="form-control">
                            <option value="{{$artigo->subcategorias->id}}">{{$artigo->subcategorias->nome}}</option>
                            @foreach($subcategoria as $c)
                            <option value="{{$c->id}}">{{$c->nome}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Tipo</label>
                        <select name="tipo_id" class="form-control">
                            <option value="{{$artigo->tipos->id}}">{{$artigo->tipos->nome}}</option>
                            @foreach($tipo as $c)
                            <option value="{{$c->id}}">{{$c->nome}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Nome do Artigo</label>
                        <input name="nome" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required value="{{$artigo->nome}}" />
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="lastname2">Ícone</label>
                        <input name="icon" type="file" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Armazém</label>
                        <select name="armazem_id" class="form-control">
                            @foreach($armazem as $c)
                            <option value="{{$c->id}}">{{$c->nome}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <span><img src="{{asset('./assets/images/artigo/'.$artigo->icon)}}" style="width: 15%; margin-left: 45%;" /></span>
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Unidade</label>
                        <select name="unidade_id" class="form-control">
                            @foreach($unidade as $c)
                            <option value="{{$c->id}}">{{$c->nome}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Preço</label>
                        <input name="preco" type="text" value="{{$artigo->preco}}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                    </div>

                    @foreach($artigo->stocks as $s)

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Estoque Mínimo</label>
                        <input name="stockminimo" type="text" value="{{$s->stockminimo}}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Quantidade</label>
                        <input name="quantidade" type="numeric" value="{{$s->quantidade}}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                    </div>
                    @endforeach

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Iva</label>
                        <input name="iva" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required value="2" />
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Desconto</label>
                        <input name="desconto" type="text" value="{{$artigo->desconto}}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required value="2" />
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Garantia</label>
                        <input name="garantia" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required value="{{$artigo->garantia}}" />
                        <input name="users_id" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required hidden value="{{Auth::user()->id}}" />
                    </div>

                </div>

                <div class="p-field p-col-12 p-md-1">
                    <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                        <span class="ui-button-text ui-c">Alterar</span></button>
                </div>


            </form>
        </div>

    </div>

</div>
@endsection