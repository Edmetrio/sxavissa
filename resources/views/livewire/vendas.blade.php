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
                <h5>Venda</h5>
                @if ($errors->any())
                <div class="alert alert-warning">
                    <strong>Opss!</strong> Algum problema com seu formulário<br><br>

                </div>
                @endif


                <div class="ui-fluid p-formgrid p-grid">
                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Código de Barra</label>
                        <input wire:model="search" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                    </div>
                </div>
                <!-- 
                <form action="{{url('itemtransacao')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(!$artigo->isEmpty())
                    <div class="p-field p-col-12 p-md-6">
                        <ul>
                            @foreach($artigo as $c)
                            <li>
                                <div class="p-field p-col-12 p-md-12" style="text-align: center;">
                                    <input hidden name="transacao_id" value="33148d65-135b-4ad7-a08f-26c1d4af7b47" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required style="width: 150px; text-align: center;" />
                                    <input hidden name="artigo_id" value="{{$c->id}}" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required style="width: 150px; text-align: center;" />

                                    {{$c->nome}}
                                    <input name="quantidade" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required placeholder="1" style="width: 70px; text-align: center;" />
                                    <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                                        <span class="ui-button-text ui-c">Adicionar</span>
                                    </button>
                                </div>
                                <div class="p-field p-col-12 p-md-12" style="text-align: center;">
                                    <img class="img-fluid" src="assets/images/artigo/{{$c->icon}}" style="width: 50px; text-align: center;" />
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @else
                    <div class="alert alert-danger p-field p-col-12 p-md-6" style="text-align: center;">
                        <strong>Opss!</strong> Artigo não encontrado<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </form> -->


                <form action="{{url('itemtransacao')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input hidden name="transacao_id" value="33148d65-135b-4ad7-a08f-26c1d4af7b47" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required style="width: 150px; text-align: center;" />
                    <input hidden name="artigo_id" value="{{ $c->id ?? ''}}" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required style="width: 150px; text-align: center;" />
                    <table class="table p-field p-col-12 p-md-6 table table-striped" style="margin-top: 2%;">
                        <caption>Lista de Pesquisa</caption>
                        <thead>
                            <tr>
                                <th scope="col">Codigo de Barra</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Ícone</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Adicionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($artigo as $c)
                            <tr>
                                <td>{{$c->codigobarra}}</td>
                                <td>{{$c->nome}}</td>
                                <td><img class="img-fluid" src="assets/images/artigo/{{$c->icon}}" style="width: 30px; text-align: center;" /></td>
                                <td>{{$c->preco}}</td>
                                <td><input name="quantidade" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required placeholder="1" style="width: 70px; text-align: center;" /></td>
                                <td role="gridcell" style="display: flex; justify-content: flex-start;">
                                    <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only edit-button rounded-button ui-button-success"><span class="ui-button-icon-left ui-icon ui-c pi pi-check"></span><span class="ui-button-text ui-c">ui-button</span></button>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </form>
                <!-- {{$artigo->links()}}
                <style>
                    nav svg {
                        max-height: 20px;
                    }
                </style> -->

                @if ($message = Session::get('status'))
                <div class="alert alert-success" class="table p-field p-col-12 p-md-6 table-striped" style="text-align: center;">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <table class="table p-field p-col-12 p-md-6 table table-striped" style="margin-top: 2%;">
                    <caption>Lista de Itens Adicionados</caption>
                    <thead>
                        <tr>
                            <th scope="col">Codigo de Barra</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Ícone</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">SubTotal</th>
                            <th scope="col">Apagar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($itens as $c)
                        <tr>
                            <td>{{$c->artigos->codigobarra ?? ''}}</td>
                            <td>{{$c->artigos->nome ?? ''}}</td>
                            <td><img class="img-fluid" src="assets/images/artigo/{{$c->artigos->icon ?? ''}}" style="width: 30px; text-align: center;" /></td>
                            <td>{{$c->artigos->preco ?? ''}}</td>
                            <td>{{$c->quantidade ?? ''}}</td>
                            <td>{{$c->valor_total ?? ''}}</td>
                            <td>
                                <form action="{{ route('itemtransacao.destroy',$c->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-button-warning rounded-button"><span class="ui-button-icon-left ui-icon ui-c pi pi-trash"></span><span class="ui-button-text ui-c">ui-button</span></button>
                                </form>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
                <p class="table p-field p-col-12 p-md-6 table table-striped" style="text-align: right; font-size: 20px;">{{$total}},00MT</p>

            </div>
        </div>

    </div>
</div>