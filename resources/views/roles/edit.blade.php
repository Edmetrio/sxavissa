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
            <h5>Regras</h5>

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

            {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
            <div class="ui-fluid p-formgrid p-grid">
                <div class="p-field p-col-12 p-md-6">
                    <label class="ui-outputlabel ui-widget" for="">Nome</label>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>

                <div class="p-field p-col-12 p-md-6">
                </div>
                <div class="p-field p-col-12 p-md-6">
                    <label class="ui-outputlabel ui-widget" for="">Permissões</label>
                    <br />
                    @foreach($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                    {{ $value->name }}</label>
                    <br />
                    @endforeach
                </div>
                <div class="p-field p-col-12 p-md-6">
                </div>
                <div class="p-field p-col-12 p-md-1">
                    <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                        <span class="ui-button-text ui-c">Alterar</span>
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>

</div>
@endsection