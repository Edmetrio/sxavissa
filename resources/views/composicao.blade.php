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
            <li><strong><a href="" class="ui-link ui-widget">Painel Principal</a></strong></li>
            <div class="overview-subinfo p-grid">
                <span class="p-col-12">Dados Estatístico das Últimas 24 Horas</span>
            </div>
        </ul>
    </div>
</div>
<div class="layout-content">
    <div class="p-col-12">
        <div class="card">
            <h5>Aumento do Estoque</h5>
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


            <form action="{{ route('composicao.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="ui-fluid p-formgrid p-grid">

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Artigo</label>
                        <select name="artigo_id" class="form-control">
                            <option value="">Seleccione o Artigo</option>
                            @foreach($artigo as $a)
                            <option value="{{$a->id}}">{{ $a->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Matéria-Prima</label>
                        <select name="materia_id" class="form-control">
                            <option value="">Seleccione a Materia-Prima</option>
                            @foreach($materia as $m)
                            <option value="{{$m->id}}">{{ $m->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Unidade</label>
                        <select name="unidade_id" class="form-control">
                            <option value="">Seleccione a Unidade</option>
                            @foreach($unidade as $p)
                            <option value="{{$p->id}}">{{ $p->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Quantidade</label>
                        <input name="quantidade" type="text" value="1" min="1" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                    </div>

                </div>
                <div class="p-field p-col-12 p-md-1">
                    <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                        <span class="ui-button-text ui-c">Adicionar</span></button>
                </div>


            </form>
            <div class="table-responsive-md">
                @if ($message = Session::get('status'))
                <div>
                    <p class="alert alert-success" class="table p-field p-col-12 p-md-6 table-striped" style="text-align: center;">{{ $message }}</p>
                </div>
                @endif
                <table class="table p-field p-col-12 p-md-12 table table-striped" style="margin-top: 2%;">
                    <caption>Lista de Categorias</caption>
                    <thead>
                        <tr>
                            <th scope="col">Artigo</th>
                            <th scope="col">Matéria-Prima</th>
                            <th scope="col">Unidade</th>
                            <th scope="col">Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($composicao as $c)
                    <tr>
                        <td>{{$c->artigos->nome}}</td>
                        <td>{{$c->materias->nome}}</td>
                        <td>{{$c->unidades->nome}}</td>
                        <td>{{$c->quantidade}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection