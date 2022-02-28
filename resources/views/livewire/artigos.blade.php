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
                @if ($message = Session::get('status'))
                <div>
                    <p class="alert alert-success" class="table p-field p-col-12 p-md-6 table-striped" style="text-align: center;">{{ $message }}</p>
                </div>
                @endif
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

                @if($createData == false)
                <form wire:submit.prevent="store" enctype="multipart/form-data">
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
                            @error('selectedTipo') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        @if (isset($selectedTipo))
                        <div class="p-field p-col-12 p-md-4">
                            <label class="ui-outputlabel ui-widget" for="">Código de Barra</label>
                            <input wire:model="codigobarra" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('codigobarra') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="p-field p-col-12 p-md-2"><br><br>
                            <button wire:click="random()" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                            <span class="ui-button-text ui-c">Leitura de QBarra</span></button>
                    </div>
                       @elseif(!empty($selectedTipo))

                        @endif

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Categoria</label>
                            <select wire:model="selectedCategoria" class="form-control">
                                <option value="">Seleccione a Categoria</option>
                                @foreach($categoria as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                            @error('selectedCategoria') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        @if (!is_null($selectedCategoria))
                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Subcategoria</label>
                            <select wire:model="subcategoria_id" class="form-control">
                                <option value="">Seleccione a Subcategoria</option>
                                @foreach($subcategoria as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                            @error('subcategoria_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @endif

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome do Artigo</label>
                            <input name="nome" wire:model="nome" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="lastname2">Ícone</label>
                            <input name="icon" wire:model="icon" type="file" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                            @if($icon)
                            <img src="{{$icon->temporaryUrl()}}" style="width: 15%; text-align: center;" alt="" />
                            @endif
                            @error('icon') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Armazém</label>
                            <select wire:model="armazem_id" name="armazem_id" class="form-control">
                                <option value="">Seleccione o Armazém</option>
                                @foreach($armazem as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Unidade</label>
                            <select wire:model="unidade_id" name="unidade_id" class="form-control">
                                <option value="">Seleccione a Unidade</option>
                                @foreach($unidade as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Preço</label>
                            <input name="preco" wire:model="preco" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Estoque Mínimo</label>
                            <input wire:model="stockminimo" name="stockminimo" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Quantidade</label>
                            <input wire:model="quantidade" name="quantidade" type="numeric" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Desconto</label>
                            <input wire:model="desconto" name="desconto" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required value="" />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Garantia</label>
                            <input wire:model="garantia" name="garantia" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required value="" />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Iva</label><br />
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" wire:model="iva" name="iva" class="custom-control-input" id="defaultInline1">
                                <label class="custom-control-label" for="defaultInline1">Incluir Iva</label>
                            </div>
                        </div>
                    </div>
                    <div class="p-field p-col-12 p-md-4">
                        <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                            <span class="ui-button-text ui-c">Adicionar</span></button>
                    </div>
                </form>
                @endif

                @if($updateData == false)
                <form wire:submit.prevent="update" enctype="multipart/form-data">
                    @csrf
                    <div class="ui-fluid p-formgrid p-grid">
                        <!-- <div class="p-field p-col-12 p-md-6" hidden>
                            <label class="ui-outputlabel ui-widget" for="">Nome da Subcategoria</label>
                            <input wire:model="editp_tipo_id" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div> -->

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Código de Barra</label>
                            <input wire:model="editp_codigobarra" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('editp_codigobarra') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Categoria</label>
                            <select wire:model="selectedCategoria" class="form-control">
                                <option value="{{$editp_servico->categorias->id ?? ''}}">{{$editp_servico->categorias->nome ?? 'Seleccione a Categoria'}}</option>
                                @foreach($categoria as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                            @error('selectedCategoria') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Subcategoria</label>
                            <select wire:model="subcategoria_id" class="form-control">
                                <option value="{{$editp_servico->subcategorias->id ?? ''}}">{{$editp_servico->subcategorias->nome ?? 'Seleccione a Subcategoria'}}</option>
                                @foreach($subcategoria as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                            @error('subcategoria_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome do Artigo</label>
                            <input wire:model="editp_nome" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('editp_nome') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="lastname2">Ícone</label>
                            <input name="icon" wire:model="newp_icon" type="file" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                            @if($newp_icon)
                            <img src="{{$newp_icon->temporaryUrl()}}" style="width: 15%; text-align: center;" alt="" />
                            @else
                            <img src="{{asset('storage')}}/{{$oldp_icon}}" style="width: 15%; text-align: center;" alt="" />
                            @endif
                            @error('editp_icon') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Armazém</label>
                            <select wire:model="armazem_id"  class="form-control">
                                <option value="{{$editp_armazem_id}}">{{$editp_armazem_nome ?? 'Seleccione o Armazém'}}</option>
                                @foreach($armazem as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                            @error('armazem_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Unidade</label>
                            <select wire:model="unidade_id" name="unidade_id" class="form-control">
                                <option value="{{$editp_unidade_id ?? ''}}">{{$editp_unidade_nome ?? 'Seleccione a Unidade'}}</option>
                                @foreach($unidade as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                            @error('unidade_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Preço</label>
                            <input wire:model="editp_preco" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('editp_preco') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Estoque Mínimo</label>
                            <input wire:model="editp_stockminimo" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('editp_stockminimo') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Quantidade</label>
                            <input wire:model="editp_quantidade" type="numeric" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Desconto</label>
                            <input wire:model="editp_desconto" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required value="" />
                            @error('editp_desconto') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Garantia</label>
                            <input wire:model="editp_garantia" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required value="" />
                            @error('editp_garantia') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Iva</label><br />
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" wire:model="iva" name="iva" class="custom-control-input" id="defaultInline1">
                                <label class="custom-control-label" for="defaultInline1">Incluir Iva</label>
                            </div>
                        </div>
                    </div>
                    <div class="p-field p-col-12 p-md-4">
                        <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                            <span class="ui-button-text ui-c">Alterar</span></button>
                    </div>
                </form>
                @endif

                @if($createServicoData == false)
                <h5><strong>Adicionar Serviço</strong></h5>
                <form wire:submit.prevent="storeServico" enctype="multipart/form-data">
                    @csrf
                    <div class="ui-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Código de Barra</label>
                            <input wire:model="codigobarra" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('codigobarra') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Categoria</label>
                            <select wire:model="selectedCategoria" class="form-control">
                                <option value="">Seleccione a Categoria</option>
                                @foreach($categoria as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                            @error('selectedCategoria') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        @if (!is_null($selectedCategoria))
                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Subcategoria</label>
                            <select wire:model="subcategoria_id" class="form-control">
                                <option value="">Seleccione a Subcategoria</option>
                                @foreach($subcategoria as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                            @error('subcategoria_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @endif

                        <div class="p-field p-col-12 p-md-6" hidden>
                            <label class="ui-outputlabel ui-widget" for="">Tipo</label>
                            <select wire:model="selectedTipo" class="form-control">
                                <option value="9ed66d9f-614f-4adc-994f-a205099e95a4">Serviço</option>
                            </select>
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome do Artigo</label>
                            <input name="nome" wire:model="nome" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="lastname2">Ícone</label>
                            <input wire:model="icon" type="file" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                            @if($icon)
                            <img src="{{$icon->temporaryUrl()}}" style="width: 15%; text-align: center;" alt="" />
                            @endif
                            @error('icon') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Preço</label>
                            <input name="preco" wire:model="preco" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('preco') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="p-field p-col-12 p-md-1">
                        <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                            <span class="ui-button-text ui-c">Adicionar Servico</span></button>
                    </div>
                </form>
                @endif

                @if($updateServicoData == false)
                <h5><strong>Alterar Serviço</strong></h5>
                <form wire:submit.prevent="updateS" enctype="multipart/form-data">
                    @csrf
                    <div class="ui-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Código de Barra</label>
                            <input wire:model="edits_codigobarra" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('edits_codigobarra') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Categoria</label>
                            <select wire:model="selectedCategoriaS" class="form-control">
                                <option value="{{$edit_servico->categorias->id}}">{{$edit_servico->categorias->nome ?? ''}}</option>
                                @foreach($categoria as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                            @error('selectedCategoriaS') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Subcategoria</label>
                            <select wire:model="subcategoria_id" class="form-control">
                                <option value="{{$edit_servico->subcategorias->id ?? ''}}">{{$edit_servico->subcategorias->nome ?? ''}}</option>
                                @foreach($subcategoria as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                            @error('subcategoria_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6" hidden>
                            <label class="ui-outputlabel ui-widget" for="">Tipo</label>
                            <select wire:model="selectedTipo" class="form-control">
                                <option value="9ed66d9f-614f-4adc-994f-a205099e95a4">Serviço</option>
                            </select>
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome do Artigo</label>
                            <input wire:model="edits_nome" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('edits_nome') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="lastname2">Ícone</label>
                            <input wire:model="news_icon" type="file" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                            @if($news_icon)
                            <img src="{{$news_icon->temporaryUrl()}}" style="width: 15%; text-align: center;" alt="" />
                            @else
                            <img src="{{asset('storage')}}/{{$olds_icon}}" style="width: 15%; text-align: center;" alt="" />
                            @endif
                            @error('edits_icon') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Preço</label>
                            <input name="preco" wire:model="edits_preco" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('edits_preco') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="p-field p-col-12 p-md-1">
                        <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                            <span class="ui-button-text ui-c">Alterar</span></button>
                    </div>
                </form>
                @endif

                @if($createMData == false)
                <h5><strong>Adicionar Matéria-prima</strong></h5>
                <form wire:submit.prevent="storeM" enctype="multipart/form-data">
                    @csrf
                    <div class="ui-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Código de Barra</label>
                            <input wire:model="codigobarra" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('codigobarra') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Categoria</label>
                            <select wire:model="selectedCategoria" class="form-control">
                                <option value="">Seleccione a Categoria</option>
                                @foreach($categoria as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                            @error('selectedCategoria') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        @if (!is_null($selectedCategoria))
                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Subcategoria</label>
                            <select wire:model="subcategoria_id" class="form-control">
                                <option value="">Seleccione a Subcategoria</option>
                                @foreach($subcategoria as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                            @error('subcategoria_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @endif

                        <div class="p-field p-col-12 p-md-6" hidden>
                            <label class="ui-outputlabel ui-widget" for="">Tipo</label>
                            <select wire:model="selectedTipo" class="form-control">
                                <option value="3ce23584-56cc-45ce-853d-84c9965053bf">Materia</option>
                            </select>
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome do Artigo</label>
                            <input name="nome" wire:model="nome" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="lastname2">Ícone</label>
                            <input wire:model="icon" type="file" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                            @if($icon)
                            <img src="{{$icon->temporaryUrl()}}" style="width: 15%; text-align: center;" alt="" />
                            @endif
                            @error('icon') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Preço</label>
                            <input name="preco" wire:model="preco" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('preco') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="p-field p-col-12 p-md-1">
                        <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                            <span class="ui-button-text ui-c">Adicionar Matéria</span></button>
                    </div>
                </form>
                @endif

                @if($updateMData == false)
                <h5><strong>Alterar Matéria-Prima</strong></h5>
                <form wire:submit.prevent="updateM" enctype="multipart/form-data">
                    @csrf
                    <div class="ui-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Código de Barra</label>
                            <input wire:model="edits_codigobarra" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('edits_codigobarra') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Categoria</label>
                            <select wire:model="selectedCategoria" class="form-control">
                                <option value="{{$editm_servico->categorias->id ?? ''}}">{{$editm_servico->categorias->nome ?? ''}}</option>
                                @foreach($categoria as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                            @error('selectedCategoria') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Subcategoria</label>
                            <select wire:model="subcategoria_id" class="form-control">
                                <option value="{{$editm_servico->subcategorias->id ?? ''}}">{{$editm_servico->subcategorias->nome ?? ''}}</option>
                                @foreach($subcategoria as $c)
                                <option value="{{$c->id}}">{{$c->nome}}</option>
                                @endforeach
                            </select>
                            @error('subcategoria_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6" hidden>
                            <label class="ui-outputlabel ui-widget" for="">Tipo</label>
                            <select wire:model="selectedTipo" class="form-control">
                                <option value="9ed66d9f-614f-4adc-994f-a205099e95a4">Serviço</option>
                            </select>
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome do Artigo</label>
                            <input wire:model="edits_nome" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('edits_nome') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="lastname2">Ícone</label>
                            <input wire:model="new_icon" type="file" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " />
                            @if($new_icon)
                            <img src="{{$new_icon->temporaryUrl()}}" style="width: 15%; text-align: center;" alt="" />
                            @else
                            <img src="{{asset('storage')}}/{{$old_icon}}" style="width: 15%; text-align: center;" alt="" />
                            @endif
                            @error('edits_icon') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Preço</label>
                            <input name="preco" wire:model="edits_preco" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            @error('edits_preco') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="p-field p-col-12 p-md-1">
                        <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                            <span class="ui-button-text ui-c">Alterar</span></button>
                    </div>
                </form>
                @endif

                @if($selectData == true)
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
                                <th scope="col">Criação</th>
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
                                <td><img class="img-fluid" src="{{asset('storage')}}/{{$c->icon}}" style="width: 30px; text-align: center;" /></td>
                                <td>{{ number_format($c->preco, 2, ',','.')}}MT</td>
                                <td>{{$c->created_at->diffForhumans()}}</td>
                                <td role="gridcell" style="display: flex; justify-content: flex-start;">
                                    <button wire:click="editS('{{$c->id}}')" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only edit-button rounded-button ui-button-success"><span class="ui-button-icon-left ui-icon ui-c pi pi-pencil"></span><span class="ui-button-text ui-c">ui-button</span></button>
                                    <button wire:click="deleteS('{{ $c->id }}')" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-button-warning rounded-button"><span class="ui-button-icon-left ui-icon ui-c pi pi-trash"></span><span class="ui-button-text ui-c">ui-button</span></button>

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
                @endif
            </div>

        </div>

    </div>
</div>