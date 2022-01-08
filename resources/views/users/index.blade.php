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

            <div>
                <a href="{{ route('users.create') }}" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                    <span class="ui-button-text ui-c">Adicionar</span>
                </a>
            </div>

            <div class="table-responsive-md">
                <table class="table p-field p-col-12 p-md-12 table table-striped" style="margin-top: 2%;">
                    <caption>Lista de Utilizadores</caption>
                    <thead>
                        <tr>
                            <th scope="col">Number</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Regras</th>
                            <th scope="col" width="280px">Acções</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{$data}}
                        @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                                @endif
                            </td>
                            <td role="gridcell" style="display: flex; justify-content: flex-start;">
                                <a href="{{ route('users.edit',$user->id) }}" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only edit-button rounded-button ui-button-success"><span class="ui-button-icon-left ui-icon ui-c pi pi-pencil"></span><span class="ui-button-text ui-c">ui-button</span></a>
                                <form action="{{ route('categoria.destroy',$user->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-button-warning rounded-button"><span class="ui-button-icon-left ui-icon ui-c pi pi-trash"></span><span class="ui-button-text ui-c">ui-button</span></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $data->render() !!}
            </div>
        </div>

    </div>

</div>
@endsection