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


                <form action="{{url('artigo')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="ui-fluid p-formgrid p-grid">
                    <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Tipo</label>
                            <select wire:model="selectedTipo" name="tipo_id" class="form-control">
                                <option value="">Seleccione o Tipo</option>
                                @foreach($tipo as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        @if (isset($selectedTipo))
                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Código de Barra</label>
                            <input name="codigobarra" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div>
                        @elseif(!empty($selectedTipo))
                        Aqui
                        @endif

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Categoria</label>
                            <select name="categoria_id" wire:model="selectedCategoria" class="form-control">
                                <option value="">Seleccione a Categoria</option>
                                @foreach($categoria as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        @if (!is_null($selectedCategoria))
                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Subcategoria</label>
                            <select name="subcategoria_id" class="form-control">
                                @foreach($subcategoria as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome do Artigo</label>
                            <input name="nome" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="lastname2">Ícone</label>
                            <input name="icon" type="file" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
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
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Desconto</label>
                            <input name="desconto" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required value="" />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Garantia</label>
                            <input name="garantia" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required value="" />
                            <input name="users_id" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required hidden value="{{Auth::user()->id}}" />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Iva</label><br />
                            <div class="custom-control custom-checkbox custom-control-inline" >
                            <input type="checkbox" name="iva" class="custom-control-input" id="defaultInline1">
                            <label class="custom-control-label" for="defaultInline1">Incluir Iva</label>
                        </div>
                        </div>
                    </div>
                    <div class="p-field p-col-12 p-md-4">
                        <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                            <span class="ui-button-text ui-c">Adicionar</span></button>

                        <a href="" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                            <span class="ui-button-text ui-c">Leitura de QBarra</span>
                        </a>
                    </div>
                </form>

                <label class="ui-outputlabel ui-widget" for="">Procurar</label>
                <input wire:model="search" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required placeholder="Procurar..." />
                <div class="table-responsive-md">
                    <table class="table p-field p-col-12 p-md-12 table table-striped" style="margin-top: 2%;">
                        <caption>Lista dos Artigos</caption>
                        <thead>
                            <tr>
                                <th scope="col">Codigo de Barra</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">SubCategoria</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Ícone</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Iva</th>
                                <th scope="col">Acções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($artigo as $c)
                            <tr>
                                <td>{{$c->codigobarra}}</td>
                                <td>{{$c->nome}}</td>
                                <td>{{$c->categorias->nome}}</td>
                                <td>{{$c->subcategorias->nome}}</td>
                                <td>{{$c->tipos->nome}}</td>
                                <td><img class="img-fluid" src="assets/images/artigo/{{$c->icon}}" style="width: 30px; text-align: center;" /></td>
                                <td>{{ number_format($c->preco, 2, ',','.')}}MT</td>
                                <td>{{$c->iva}}</td>
                                <td role="gridcell" style="display: flex; justify-content: flex-start;">
                                    <a href="{{url("artigo/$c->id/edit")}}" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only edit-button rounded-button ui-button-success"><span class="ui-button-icon-left ui-icon ui-c pi pi-pencil"></span><span class="ui-button-text ui-c">ui-button</span></a>
                                    <form action="{{ route('subcategoria.destroy',$c->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-button-warning rounded-button"><span class="ui-button-icon-left ui-icon ui-c pi pi-trash"></span><span class="ui-button-text ui-c">ui-button</span></button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$artigo->links()}}
                <style>
                    .w-5 {
                        display: none;
                        margin-left: 20%;
                    }
                </style>
            </div>

        </div>

    </div>
</div>