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
            <h5>Categoria</h5>
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

            <form method="POST" enctype="multipart/form-data" action="{{url("categoria/$categoria->id")}}">
                @method('PUT')
                @csrf
                <div class="ui-fluid p-formgrid p-grid">
                    <div class="p-field p-col-12 p-md-6">

                        <label class="ui-outputlabel ui-widget" for="">Nome da Categoria</label>
                        <input name="nome" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all" value="{{$categoria->nome}}" />
                        <input type="text" hidden name="users_id"  value="{{ Auth::user()->id  }}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="lastname2">Ícone</label>
                        <input name="icon" type="file" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                    </div>

                    <div class="p-field p-col-12 p-md-6" style="text-align: center;">
                        <span><img src="{{asset('./assets/images/categoria/'.$categoria->icon)}}" style="width: 15%;" /></span>
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="lastname2">Estado</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado" id="estado1" value="on" @if($categoria->estado === 'on') checked @else  @endif>
                            <label class="form-check-label" for="estado1">
                                Ligado
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado" id="estado2" value="off" @if($categoria->estado === 'off') checked @else  @endif>
                            <label class="form-check-label" for="estado2">
                                Desligado
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                        <span class="ui-button-text ui-c">@if(isset($categoria)) Alterar @else Adicionar @endif</span></button>
                </div>
            </form>
        </div>

    </div>

</div>
@endsection