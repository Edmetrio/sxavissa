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
                                <div class="invoice-company"><img id="invoice-logo" src="{{asset('./assets/images/logo.png')}}" alt="" class="logo-image" />
                                    <div class="company-name">SyDevelop - Xavissa</div>
                                    <div>Av. Julius Nyerere, nº. 1200</div>
                                    <div>Telefone: +258 000 0000</div>
                                    <div>Maputo, Moçambique</div>
                                </div>
                                <div>
                                    <div class="invoice-title">Recibo</div>
                                    <div class="invoice-details">
                                        <div class="invoice-label">DATA</div>
                                        <div class="invoice-value">{{$hist->created_at->format('d-m-y')}}</div>

                                        <div class="invoice-label">RECIBO #</div>
                                        <div class="invoice-value">{{$hist->id}}</div>

                                        <div class="invoice-label">Funcionário</div>
                                        <div class="invoice-value">{{$hist->users->id}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-to">
                                <div class="bill-to">Funcionário</div>
                                <div class="invoice-to-info">
                                    <div>{{$hist->users->name}}</div>
                                    <div>Maputo, Moçambique </div>
                                </div>
                            </div>
                            <div class="invoice-items">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Descrição</th>
                                            <th>Quantidade</th>
                                            <th>Preço</th>
                                            <th>SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($historico as $h)
                                        <tr>
                                            <td>{{$h->artigos->nome}}</td>
                                            <td>{{$h->quantidade}}</td>
                                            <td>{{ number_format($h->artigos->preco, 2, ',','.')}}MT</td>
                                            <td>{{$h->subtotal}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="invoice-summary">
                                <div class="invoice-notes">
                                    <b>Pagamento Via:</b>
                                    <div>
                                        {{$hist->pagamentos->nome}}
                                    </div>
                                </div>
                                <div>
                                    <div class="invoice-details">
                                        <div class="invoice-label">SUBTOTAL</div>
                                        <div class="invoice-value">{{ number_format($historico->total, 2, ',','.')}}MT</div>

                                        <div class="invoice-label">IVA</div>
                                        <div class="invoice-value">17%</div>

                                        <div class="invoice-label">TOTAL</div>
                                        <div class="invoice-value">{{ number_format($historico->tt, 2, ',','.')}}MT</div>
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