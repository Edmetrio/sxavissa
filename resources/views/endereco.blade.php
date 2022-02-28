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
            <h5>Endereço</h5>
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

            @if(isset($endereco))
            <form method="POST" enctype="multipart/form-data" action="{{url("endereco/$endereco->id")}}">
            @method('PUT')
            @else
            <form method="POST" enctype="multipart/form-data" action="{{ route('endereco.store') }}">
            @endif
                @csrf
                <div class="ui-fluid p-formgrid p-grid">
                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Nome</label>
                        <input name="nome" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required value="{{ $endereco->nome ?? ''}}" />
                    </div>

                    <div class="p-field p-col-12 p-md-6" hidden>
                        <label class="ui-outputlabel ui-widget" for="lastname2">Users_id</label>
                        <input name="users_id" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" value="{{ Auth::user()->id }}" />
                        <input name="idacesso"  type="text" value="{{Auth::user()->idacesso}}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                    </div>

                </div>
                <div>
                    <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                        <span class="ui-button-text ui-c">@if(isset($endereco)) Alterar @else Adicionar @endif</span></button>
                </div>
            </form>

        </div>

    </div>

</div>
@endsection