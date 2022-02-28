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
            @if ($message = Session::get('status'))
            <div>
                <p class="alert alert-success" class="table p-field p-col-12 p-md-6 table-striped" style="text-align: center;">{{ $message }}</p>
            </div>
            @endif
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

            <form action="{{ route('itemcotacao.index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="ui-fluid p-formgrid p-grid">

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Nome do Artigo</label>
                        <select name="artigo_id" class="form-control">
                            <option value="">Seleccione o Artigo</option>
                            @foreach($artigo as $c)
                            <option value="{{$c->id ?? ''}}">{{$c->nome ?? ''}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Nome da Empresa</label>
                        <select name="cotacao_id" class="form-control">
                            <option value="">Seleccione a Empresa</option>
                            @foreach($cotacao as $c)
                            <option value="{{$c->id ?? ''}}">{{$c->nome ?? ''}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Designação</label>
                        <input name="designacao" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                        <input name="users_id" hidden type="text" value="{{Auth::user()->id}}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        <input name="idacesso" hidden type="text" value="{{Auth::user()->idacesso}}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="lastname2">Quantidade</label>
                        <input name="quantidade" type="number" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                    </div>

                </div>
                <div class="p-field p-col-12 p-md-1">
                    <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                        <span class="ui-button-text ui-c">Adicionar</span></button>
                </div>
            </form>

            <div class="table-responsive-md">
                <table class="table p-field p-col-12 p-md-12 table table-striped" style="margin-top: 2%;">
                    <caption>Lista de Categorias</caption>
                    <thead>
                        <tr>
                            <th scope="col">Artigo</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Designacao</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Preço</th>
                            <th scope="col">SubTotal</th>
                            <th scope="col">Acções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($item as $c)
                        <tr>
                            <td>{{$c->artigos->nome}}</td>
                            <td>{{$c->cotacaos->nome}}</td>
                            <td>{{$c->designacao}}</td>
                            <td>{{$c->quantidade}}</td>
                            <td>{{ number_format($c->artigos->preco, 2, ',','.')}}</td>
                            <td>{{ number_format($c->subtotal, 2, ',','.')}}</td>
                            <td role="gridcell" style="display: flex; justify-content: flex-start;">
                                <a href="{{ route('itemcotacao.edit',$c->id) }}" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only edit-button rounded-button ui-button-success"><span class="ui-button-icon-left ui-icon ui-c pi pi-pencil"></span><span class="ui-button-text ui-c">ui-button</span></a>
                                <form action="{{ route('itemcotacao.destroy',$c->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-button-warning rounded-button"><span class="ui-button-icon-left ui-icon ui-c pi pi-trash"></span><span class="ui-button-text ui-c">ui-button</span></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <strong style="font-size: 15px; font-weight: bold; color: cadetblue; margin-right: 100px; float: right;">SubTotal: {{ number_format($item->total, 2, ',','.')}}MT</strong><br>

            </div>

            <form action="{{ route('itemcotacao.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-field p-col-12 p-md-6">
                    <input name="cotacao_id" hidden value="{{$item->cotacao_id}}" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                    <input name="valortotal" hidden value="{{$item->total}}" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                </div>
                <div class="ui-fluid p-formgrid p-grid">
                <div class="p-field p-col-12 p-md-6">
                    <label class="ui-outputlabel ui-widget" for="">Nome da Cotação</label>
                    <select name="cotacao" class="form-control">
                        <option value="">Seleccione da Cotação</option>
                        <option value="Cotação">Cotação</option>
                        <option value="Factura">Factura</option>
                        <option value="Recibo">Recibo</option>
                    </select>
                </div>
                <div class="p-field p-col-12 p-md-6">
                </div>
                <!-- <div class="p-field p-col-12 p-md-6">
                    <label class="ui-outputlabel ui-widget" for="">Iva</label><br />
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" name="iva" class="custom-control-input" id="defaultInline1">
                        <label class="custom-control-label" for="defaultInline1">Incluir Iva</label>
                    </div>
                </div> -->
                <div class="p-field p-col-12 p-md-1">
                    <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                        <span class="ui-button-text ui-c">Emitir</span></button>
                </div>
                </div>
        </div>
        </form>
    </div>

</div>

</div>
@endsection