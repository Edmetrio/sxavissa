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

                @if(isset($artigo))
                <div class="ui-fluid p-formgrid p-grid">
                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Código de Barra</label>
                        <input wire:model="search" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                    </div>
                </div>

                <form action="{{url('itemtransacao')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input hidden name="transacao_id" value="{{$transacao->id}}" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required style="width: 150px; text-align: center;" />
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
                            <input hidden name="artigo_id" value="{{ $c->id ?? ''}}" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required style="width: 150px; text-align: center;" />

                            <tr>
                                <td>{{$c->codigobarra}}</td>
                                <td>{{$c->nome}}</td>
                                <td><img class="img-fluid" src="assets/images/artigo/{{$c->icon}}" style="width: 30px; text-align: center;" /></td>
                                <td>{{$c->preco}}</td>
                                <td><input name="quantidade" type="number" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required placeholder="1" style="width: 70px; text-align: center;" /></td>
                                <td role="gridcell" style="display: flex; justify-content: flex-start;">
                                    <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only edit-button rounded-button ui-button-success"><span class="ui-button-icon-left ui-icon ui-c pi pi-check"></span><span class="ui-button-text ui-c">ui-button</span></button>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </form>
                @else

                @endif

                @if ($message = Session::get('status'))
                <div>
                    <p class="alert alert-success" class="table p-field p-col-12 p-md-6 table-striped" style="text-align: center;">{{ $message }}</p>
                </div>
                @endif

                @if(isset($artigo))
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
                            <td>{{number_format($c->artigos->preco, 2, ',','.') ?? ''}}</td>
                            <td>{{$c->quantidade ?? ''}}</td>
                            <td>{{number_format($c->valor_total, 2, ',','.') ?? ''}}</td>
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
                <div class="table p-field p-col-12 p-md-6 table table-striped" style="text-align: right;">
                    <p>
                        <hr>
                        <strong style="font-size: 15px; font-weight: bold; color: cadetblue; margin-right: 100px;">SubTotal</strong> {{ number_format($total, 2, ',','.')}}MT<br>
                        <strong style="font-size: 15px; font-weight: bold; color: cadetblue; margin-right: 100px;">IVA 17% </strong>{{ number_format($itens->iva, 2, ',','.')}}MT<br>
                        <strong style="font-size: 15px; font-weight: bold; color: cadetblue; margin-right: 100px;">Total </strong>{{ number_format($itens->total, 2, ',','.')}}MT
                        <input hidden name="valortotal" value="{{$itens->total}}" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required style="width: 150px; text-align: center;" />
                        <input hidden name="transacao_id" value="{{$transacao->id}}" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required style="width: 150px; text-align: center;" />
                        <hr>

                    </p>
                </div>
                @else
                @endif

                @if(!isset($transacao->users_id) && !isset($transacao->valortotal))
                <form action="{{ route('transacao.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-field p-col-12 p-md-2">
                        <hr>
                        <label class="ui-outputlabel ui-widget" for="">Olá, <strong style="text-align: right; font-size: 20px; font-weight: bold; color: cadetblue;">{{ Auth::user()->name }}</strong></label>
                        <hr>
                        <input type="text" name="users_id" hidden value="{{ Auth::user()->id  }}" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required />
                        <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                            <span class="ui-button-text ui-c">Iniciar</span></button>
                    </div>
                </form>
                @elseif(!isset($transacao->users_id) && $itens->valortotal->isEmpty())
                @csrf
                <form action="{{url('historico')}}" method="POST" enctype="multipart/form-data">
                    <div class="p-field p-col-12 p-md-4">
                        <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                            <span class="ui-button-text ui-c">Finalizar</span></button>
                    </div>
                </form>
                @else
                <form action="{{ route('historico.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input hidden name="valortotal" value="{{$total}}" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required style="width: 150px; text-align: center;" />
                    <input hidden name="transacao_id" value="{{$transacao->id}}" type="text" class="ui-inputfield ui-inputtext ui-widget ui-state-default ui-corner-all " required style="width: 150px; text-align: center;" />
                    <div class="p-field p-col-12 p-md-6">
                        <label class="ui-outputlabel ui-widget" for="">Tipo de Pagamento</label>
                        <select name="pagamento_id" class="form-control">
                            <option value="">Seleccione o tipo de Pagamento</option>
                            @foreach($pagamento as $c)
                            <option value="{{$c->id}}">{{$c->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="p-field p-col-12 p-md-4">
                        <button type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only p-mr-2 p-mb-2">
                            <span class="ui-button-text ui-c">Finalizar</span></button>
                    </div>
                </form>
                <h3 class="m-0" style="font-weight: bold; color: cadetblue;">{{$transacao->created_at->format('d-m-y')}}</h3>
                @endif
            </div>
        </div>

    </div>
</div>