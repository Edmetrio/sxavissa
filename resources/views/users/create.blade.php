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
            <h5>Utilizadores</h5>

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Upss!</strong> Existe um campo com problema<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
        
            <div class="ui-fluid p-formgrid p-grid">
                <div class="p-field p-col-12 p-md-6">
                    <label class="ui-outputlabel ui-widget" for="">Nome</label>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>

                <div class="p-field p-col-12 p-md-6">
                    <label class="ui-outputlabel ui-widget" for="">E-mail</label>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>

                <div class="p-field p-col-12 p-md-6">
                    <label class="ui-outputlabel ui-widget" for="">Palavra-Passe</label>
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>

                <div class="p-field p-col-12 p-md-6">
                    <label class="ui-outputlabel ui-widget" for="">Confirmar Palavra-Passe</label>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>

                <div class="p-field p-col-12 p-md-6">
                    <label class="ui-outputlabel ui-widget" for="">Regras</label>
                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                </div>
                <div class="p-field p-col-12 p-md-6">
                </div>
                <div class="p-field p-col-12 p-md-1">
                    <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                        <span class="ui-button-text ui-c">Adicionar</span>
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>

</div>
@endsection