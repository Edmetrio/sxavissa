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
            <h5>Pefil</h5>
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

            @if(isset($perfil))
            <form method="POST" enctype="multipart/form-data" action="{{url("perfil/$perfil->id")}}">
                @method('PUT')
                @else
            <form method="POST" enctype="multipart/form-data" action="{{ route('perfil.store') }}">
                @endif
                @csrf
                <div class="ui-fluid p-formgrid p-grid">
                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Nome</label>
                        <input name="nome" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required value="{{$perfil->nome ?? ''}}" />
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Nuit</label>
                        <input name="nuit" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required value="{{$perfil->nuit ?? ''}}" />
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="lastname2">Ícone</label>
                        <input name="icon" type="file" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                    </div>

                    <div class="p-field p-col-12 p-md-6" hidden>
                        <label class="ui-outputlabel ui-widget" for="">Utilizador</label>
                        <input name="users_id" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required value="{{ Auth::user()->id }}" />
                    </div>

                    @if(isset($perfil))
                    <div class="p-field p-col-12 p-md-6" style="text-align: center;">
                        <span><img src="{{asset('./assets/images/users/'.$perfil->icon)}}" style="width: 15%;" /></span>
                    </div>
                    @else
                    @endif

                </div>
                <div>
                    <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                        <span class="ui-button-text ui-c">@if(isset($perfil)) Alterar @else Adicionar @endif</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

</div>
@endsection