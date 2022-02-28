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

            <form action="{{ route('itemcotacao.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="ui-fluid p-formgrid p-grid">

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Nome do Artigo</label>
                        <select name="artigo_id" class="form-control">
                            <option value="{{$item->artigos->id ?? ''}}">{{$item->artigos->nome ?? 'Seleccione o Artigo'}}</option>
                            @foreach($artigo as $c)
                            <option value="{{$c->id ?? ''}}">{{$c->nome ?? ''}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Nome da Empresa</label>
                        <select name="cotacao_id" class="form-control">
                            <option value="{{$item->cotacaos->id}} ?? ''">{{$item->cotacaos->nome ?? 'Seleccione a Empresa'}}</option>
                            @foreach($cotacao as $c)
                            <option value="{{$c->id ?? ''}}">{{$c->nome ?? ''}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Designação</label>
                        <input name="designacao" value="{{$item->designacao}}" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                        <input name="users_id" hidden type="text" value="{{Auth::user()->id}}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        <input name="idacesso" hidden type="text" value="{{Auth::user()->idacesso}}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="lastname2">Quantidade</label>
                        <input name="quantidade" value="{{$item->quantidade}}" type="number" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
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