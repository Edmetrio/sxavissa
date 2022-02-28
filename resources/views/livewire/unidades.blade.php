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
                <form>
                    @csrf
                    <div class="ui-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Unidade</label>
                            <input name="nome" type="text" wire:model="nome" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            <span class="text-danger">
                                @error('nome')
                                {{$message}}
                                @enderror
                            </span>
                            <input name="users_id" hidden type="text" wire:model="users_id" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            <input name="idacesso" hidden type="text" wire:model="idacesso" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div>

                    </div>
                    <div class="p-field p-col-12 p-md-1">
                        <button type="submit" wire:click.prevent="store()" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                            <span class="ui-button-text ui-c">Adicionar</span></button>
                    </div>
                </form>
                @endif

                @if($updateData == true)
                <form>
                    @csrf
                    <div class="ui-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-6">
                            <label class="ui-outputlabel ui-widget" for="">Nome da Unidade</label>

                            <input name="nome" type="text" wire:model="edit_nome" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            <span class="text-danger">
                                @error('edit_nome')
                                {{$message}}
                                @enderror
                            </span>
                            <input name="users_id" hidden type="text" wire:model="users_id" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                            <input name="idacesso" hidden type="text" wire:model="idacesso" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        </div>

                    </div>
                    <div class="p-field p-col-12 p-md-1">
                        <button type="submit" wire:click.prevent="update()" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                            <span class="ui-button-text ui-c">Alterar</span></button>
                    </div>
                </form>
                @endif

                @if($selectData == true)
                <table class="table p-field p-col-12 p-md-12 table table-striped" style="margin-top: 2%;">
                    <caption>Lista dos Artigos ( {{count($total_Unidade)}} )</caption>
                    <thead>
                        <tr>
                            <th scope="col">Unidade</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Data de criação</th>
                            <th scope="col">Acções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($unidades as $unidade)
                        <tr>
                            <td>{{ $unidade->nome }}</td>
                            <td>{{ $unidade->estado }}</td>
                            <td>{{ $unidade->created_at->diffForhumans() }}</td>
                            <td>
                                <button wire:click="edit('{{$unidade->id}}')" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only edit-button rounded-button ui-button-success"><span class="ui-button-icon-left ui-icon ui-c pi pi-pencil"></span><span class="ui-button-text ui-c">ui-button</span></button>
                                <button wire:click="delete('{{ $unidade->id }}')" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-button-warning rounded-button"><span class="ui-button-icon-left ui-icon ui-c pi pi-trash"></span><span class="ui-button-text ui-c">ui-button</span></button>
                            </td>
                        </tr>
                        @empty
                            <h1>Dados não encontrados</h1>
                        @endforelse
                    </tbody>
                </table>
                
                @endif
            </div>

        </div>

    </div>
</div>