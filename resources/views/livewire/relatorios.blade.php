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

            <table class="table p-field p-col-12 p-md-12 table table-striped" style="margin-top: 2%;">
                <caption>Lista dos Artigos</caption>
                <thead>
                    <tr>
                        <th scope="col">Utilizador</th>
                        <th scope="col">Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($relatorio as $r)
                    <tr>
                        <td>{{$r->users->name}}</td>
                    </tr>
                    @foreach($r->itemhistoricos as $i)
                    <tr>
                        <td>{{$i->artigo_id}}</td>
                        <td>{{$i->quantidade}}</td>
                    </tr>
                    @endforeach
                    <td></td>
                    <td style="text-align: right; font-size: 15px; font-weight: bold; color: cadetblue;">SubTotal: {{$r->valortotal}}MT</td>
                    @endforeach
                </tbody>
                <td></td>
                <td style="text-align: right; font-size: 20px; font-weight: bold; color: cadetblue;">Total: {{$relatorio->valor_total}}.00MT</td>
            </table>
        </div>

    </div>

</div>