<div>
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
                <h5>Artigos</h5>
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

                @if ($message = Session::get('status'))
                <div>
                    <p class="alert alert-success" class="table p-field p-col-12 p-md-6 table-striped" style="text-align: center;">{{ $message }}</p>
                </div>
                @endif
                <form action="{{url('materia')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="ui-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Matéria-Prima</label>
                            <input name="nome" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Preço</label>
                            <input name="preco" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Estoque Mínimo</label>
                            <input name="stockminimo" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Quantidade</label>
                            <input name="quantidade" type="numeric" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            <input name="users_id" hidden type="text" value="{{Auth::user()->id}}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            <input name="idacesso" hidden type="text" value="{{Auth::user()->idacesso}}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Armazém</label>
                            <select name="armazem_id" class="form-control">
                                <option value="">Seleccione o Armazém</option>
                                @foreach($armazem as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Unidade</label>
                            <select name="unidade_id" class="form-control">
                                <option value="">Seleccione a Unidade</option>
                                @foreach($unidade as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="p-field p-col-12 p-md-4">
                        <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                            <span class="ui-button-text ui-c">Adicionar</span></button>
                    </div>
                </form>

                <!-- <label class="ui-outputlabel ui-widget" for="">Procurar</label>
                <input wire:model="search" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required placeholder="Procurar..." /> -->
                <div class="table-responsive-md">
                    <table class="table p-field p-col-12 p-md-12 table table-striped" style="margin-top: 2%;">
                        <caption>Lista dos Artigos</caption>
                        <thead>
                            <tr>
                                <th scope="col">Matéria-Prima</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Estoque mínimo</th>
                                <th scope="col">Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($materia as $c)
                            <tr>
                                <td>{{$c->nome}}</td>
                                <td>{{$c->preco}}</td>
                                @foreach($c->stocks as $s)    
                                <td>{{$s->stockminimo}}</td>
                                <td>{{$s->quantidade}}</td>
                                @endforeach
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>
