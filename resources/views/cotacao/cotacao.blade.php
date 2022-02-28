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
            <h5>Lista das Empresas</h5>
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

            <form action="{{ route('cotacao.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="ui-fluid p-formgrid p-grid">
                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="lastname2">Título</label>
                        @foreach($titulo as $t)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="titulo_id" id="estado" value="{{$t->id}}">
                            <label class="form-check-label" for="estado">
                                {{$t->nome}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Nome do Cliente</label>
                        <input name="nome" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                        <input name="users_id" hidden type="text" value="{{Auth::user()->id}}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        <input name="idacesso" hidden type="text" value="{{Auth::user()->idacesso}}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Endereço</label>
                        <input name="endereco" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Telefone</label>
                        <input name="telefone" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Nuit</label>
                        <input name="nuit" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                        <input name="valortotal" hidden value="0" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                    </div>

                </div>
                <div class="p-field p-col-12 p-md-1">
                    <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                        <span class="ui-button-text ui-c">Adicionar</span></button>
                </div>
            </form>

            <div class="table-responsive-md">
                <table class="table p-field p-col-12 p-md-12 table table-striped" style="margin-top: 2%;">
                    <caption>Lista das Empresas</caption>
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Endereco</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Nuit</th>
                            <th scope="col">Acções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cotacao as $c)
                        <tr>
                            <td>{{$c->nome}}</td>
                            <td>{{$c->endereco}}</td>
                            <td>{{$c->telefone}}</td>
                            <td>{{$c->nuit}}</td>
                            <td role="gridcell" style="display: flex; justify-content: flex-start;">
                                <a href="{{ route('cotacao.edit', $c->id) }}" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only edit-button rounded-button ui-button-success"><span class="ui-button-icon-left ui-icon ui-c pi pi-pencil"></span><span class="ui-button-text ui-c">ui-button</span></a>
                                <form action="{{ route('cotacao.destroy',$c->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-button-warning rounded-button"><span class="ui-button-icon-left ui-icon ui-c pi pi-trash"></span><span class="ui-button-text ui-c">ui-button</span></button>
                                </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- <form action="{{ route('cotacao.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="ui-fluid p-formgrid p-grid">
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
                        <label class="ui-outputlabel ui-widget" for="">Nome da Cotação</label>
                        <select name="cotacao" class="form-control">
                            <option value="">Seleccione da Cotação</option>
                            <option value="Cotação">Cotação</option>
                            <option value="Factura">Factura</option>
                            <option value="Recibo">Recibo</option>
                        </select>
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                    <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                        <span class="ui-button-text ui-c">Adicionar</span></button>
                </div>
                </div>
            </form> -->
        </div>

    </div>

</div>
@endsection