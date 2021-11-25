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
    <div class="p-grid">
        <div class="p-col-12">
            <div class="card">
                <h4>Meu Perfil</h4>
                <h5>Perfil</h5>
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
                <div id="form:j_idt97" class="ui-chronoline ui-widget customized-chronoline ui-chronoline-alternate ui-chronoline-vertical">
                    <div class="ui-chronoline-event">
                        <div class="ui-chronoline-event-opposite">&nbsp;</div>
                        <div class="ui-chronoline-event-separator">
                            <span class="custom-marker p-shadow-2" style="background-color: #9C27B0"><i class="pi pi-id-card"></i></span>
                            <div class="ui-chronoline-event-connector"></div>
                        </div>
                        <div class="ui-chronoline-event-content">
                            <div id="form:j_idt98" class="ui-card ui-widget ui-widget-content ui-corner-all">
                                <div class="ui-card-body">
                                    <div class="ui-card-title">
                                        Perfil
                                    </div>
                                    <div class="ui-card-subtitle">
                                        {{ Auth::user()->name }}
                                    </div>
                                    @foreach($perfil->perfils as $p)
                                    <div class="ui-card-content"><img src="{{asset('./assets/images/users/'.$p->icon)}}" class="p-shadow-2" alt="Avatar" width="100" />
                                        <p>Nome da Empresa: {{$p->nome}}<br />
                                            Nuit: {{$p->nuit}}<br />
                                            <a href="{{ route('perfil.edit',$p->id)}}" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-button-warning rounded-button"><span class="ui-button-icon-left ui-icon ui-c pi pi-pencil"></span><span class="ui-button-text ui-c">ui-button</span></a>
                                        <!-- <form action="{{ route('perfil.destroy',$p->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-button-warning rounded-button"><span class="ui-button-icon-left ui-icon ui-c pi pi-trash"></span><span class="ui-button-text ui-c">ui-button</span></button>
                                        </form> -->
                                    </div>
                                    @endforeach
                                    <div>
                                        <a href="{{url('perfil/create')}}" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                                            <span class="ui-button-text ui-c">Adicionar</span></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui-chronoline-event">
                        <div class="ui-chronoline-event-opposite">&nbsp;</div>
                        <div class="ui-chronoline-event-separator">
                            <span class="custom-marker p-shadow-2" style="background-color: #673AB7"><i class="pi pi-directions"></i></span>
                            <div class="ui-chronoline-event-connector"></div>
                        </div>
                        <div class="ui-chronoline-event-content">
                            <div id="form:j_idt98" class="ui-card ui-widget ui-widget-content ui-corner-all">
                                <div class="ui-card-body">
                                    <div class="ui-card-title">
                                        Endereço:
                                    </div>
                                    <div class="ui-card-content">
                                        @foreach($perfil->enderecos as $e)
                                        <p>{{$e->nome}}</p>
                                        <a href="{{ route('endereco.edit',$e->id)}}" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-button-warning rounded-button"><span class="ui-button-icon-left ui-icon ui-c pi pi-pencil"></span><span class="ui-button-text ui-c">ui-button</span></a>
                                        <hr />
                                        @endforeach
                                    </div>
                                    <div>
                                        <a href="{{ route('endereco.create') }}" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                                            <span class="ui-button-text ui-c">Adicionar</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui-chronoline-event">
                        <div class="ui-chronoline-event-opposite">&nbsp;</div>
                        <div class="ui-chronoline-event-separator">
                            <span class="custom-marker p-shadow-2" style="background-color: #FF9800"><i class="pi pi-phone"></i></span>
                            <div class="ui-chronoline-event-connector"></div>
                        </div>
                        <div class="ui-chronoline-event-content">
                            <div id="form:j_idt98" class="ui-card ui-widget ui-widget-content ui-corner-all">
                                <div class="ui-card-body">
                                    <div class="ui-card-title">
                                        Telefone:
                                    </div>
                                    Números dos Telefones:
                                    <div class="ui-card-content">
                                        @foreach($perfil->telefones as $t)
                                        {{$t->numero}}
                                        <a href="{{ route('telefone.edit',$t->id)}}" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-button-warning rounded-button"><span class="ui-button-icon-left ui-icon ui-c pi pi-pencil"></span><span class="ui-button-text ui-c">ui-button</span></a>
                                        <br>
                                        <hr>
                                        @endforeach
                                    </div>
                                    <div>
                                        <a href="{{ route('telefone.create') }}" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                                            <span class="ui-button-text ui-c">Adicionar</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui-chronoline-event">
                        <div class="ui-chronoline-event-opposite">&nbsp;</div>
                        <div class="ui-chronoline-event-separator">
                            <span class="custom-marker p-shadow-2" style="background-color: #607D8B"><i class="pi pi-map-marker"></i></span>
                        </div>
                        <div class="ui-chronoline-event-content">
                            <div id="form:j_idt98" class="ui-card ui-widget ui-widget-content ui-corner-all">
                                <div class="ui-card-body">
                                    <div class="ui-card-title">
                                        Armazém:
                                    </div>
                                    <div class="ui-card-content">
                                        @foreach($perfil->armazems as $a)
                                        <p><strong>Nome: </strong>{{$a->nome}}</p>
                                        <p><strong>Endereço: </strong>{{$a->local}}</p>
                                        <p><strong>Número:</strong>{{$a->numero}} </p>
                                        <a href="{{url("armazem/$a->id/edit")}}" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-button-warning rounded-button"><span class="ui-button-icon-left ui-icon ui-c pi pi-pencil"></span><span class="ui-button-text ui-c">ui-button</span></a>
                                        <hr />
                                        @endforeach
                                    </div>
                                    <div>
                                        <a href="{{ route('armazem.create') }}" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                                            <span class="ui-button-text ui-c">Adicionar</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div><input type="hidden" name="javax.faces.ViewState" id="j_id1:javax.faces.ViewState:2" value="8626949082928866349:8311845988205506031" autocomplete="off" />
</div>
@endsection