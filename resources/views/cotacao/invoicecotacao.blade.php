@extends('templates.templateInvoice')

@section('content')

<div class="layout-content"><button id="j_idt96" name="j_idt96" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left" onclick="PrimeFaces.expressions.SearchExpressionFacade.resolveComponentsAsSelector('invoice-content').print();return false;" style="margin-bottom: 2rem" type="button"><span class="ui-button-icon-left ui-icon ui-c pi pi-print"></span><span class="ui-button-text ui-c">Print</span></button>
    <script id="j_idt96_s" type="text/javascript">
        $(function() {
            PrimeFaces.cw("CommandButton", "widget_j_idt96", {
                id: "j_idt96",
                behaviors: {
                    click: function(ext, event) {
                        PrimeFaces.expressions.SearchExpressionFacade.resolveComponentsAsSelector('invoice-content').print();
                        return false;
                    }
                }
            });
        });
    </script>

    <div class="p-grid">
        <div class="p-col">
            <div class="card">
                <div id="invoice-content" class="ui-outputpanel ui-widget">
                    <div class="invoice">
                        <div class="invoice-header">
                            <div class="invoice-company"><img id="invoice-logo" src="{{asset('./assets/images/users/'.$user->icon)}}" alt="" class="logo-image" />
                                <div class="company-name">{{$perfil->nome}}</div>
                                <div>Endereço: {{$endereco->nome}}</div>
                                <div>Telefone: +258 {{$telefone->numero}}</div>
                                <div>Nuit: {{$perfil->nuit}}</div>
                            </div>
                            <div>
                                <div class="invoice-title">{{$telefone->cotacao}}</div>
                                <div class="invoice-details">
                                    <div class="invoice-label">DATA</div>
                                    <div class="invoice-value">{{$item->data}}</div>

                                    <div class="invoice-label">{{$telefone->cotacao}} #</div>
                                    <div class="invoice-value">{{$itemcota->id}}</div>


                                    <div class="invoice-label">Funcionário</div>
                                    <div class="invoice-value">{{$user->name}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-to">
                            <div class="bill-to">Dados do Cliente</div>
                            <div class="invoice-details">
                                <div class="invoice-label">Nome do Cliente: </div>
                                <div class="invoice-value">{{$itemcota->nome}}</div>
                                <div class="invoice-label">Endereço: </div>
                                <div class="invoice-value">{{$itemcota->endereco}}</div>
                                <div class="invoice-label">Telefone: </div>
                                <div class="invoice-value">{{$itemcota->telefone}}</div>
                                <div class="invoice-label">Nuit: </div>
                                <div class="invoice-value">{{$itemcota->nuit}}</div>
                            </div>
                        </div>
                        

                        <div class="invoice-items">
                        <div style="font-size: 20px;">{{$itemcota->nome}}</div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Artigo</th>
                                        <th>Ícon</th>
                                        <th>Designação</th>
                                        <th>Quantidade</th>
                                        <th>Preço</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($item as $h)
                                    <tr>
                                        <td>{{$h->artigos->nome}}</td>
                                        <td><img class="img-fluid" src="{{asset('storage')}}/{{$h->artigos->icon}}" style="width: 30px; text-align: center;" /></td>
                                        <td>{{$h->designacao}}</td>
                                        <td>{{$h->quantidade}}</td>
                                        <td>{{ number_format($h->artigos->preco, 2, ',','.')}}</td>
                                        <td>{{ number_format($h->subtotal, 2, ',','.')}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="invoice-summary">
                            <div class="invoice-notes">

                                <div>

                                </div>
                            </div>
                            <div>
                                <div class="invoice-details">
                                    <div class="invoice-label">SUBTOTAL</div>
                                    <div class="invoice-value">{{ number_format($item->total, 2, ',','.')}}MT</div>

                                    <div class="invoice-label">IVA</div>
                                    <div class="invoice-value">{{ number_format($item->iva, 2, ',','.')}}MT</div>

                                    <div class="invoice-label">TOTAL</div>
                                    <div class="invoice-value">{{ number_format($item->ttotal, 2, ',','.')}}MT</div>

                                </div>
                            </div>
                        </div>
                        <div style="text-align: center;">
                            <div class="company-name">Processado por Computador</div>
                            <div class="invoice-label">THANK YOU!!!</div>
                            <div class="invoice-label">Xavissa</div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection