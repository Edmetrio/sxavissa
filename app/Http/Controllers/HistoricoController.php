<?php

namespace App\Http\Controllers;

use App\Models\Models\Historico;
use App\Models\Models\Itemhistorico;
use App\Models\Models\Itemtransacao;
use App\Models\Models\Transacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoricoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* return $request->all(); */

        if (isset($request->gerar)) {

            $user = Auth::user()->id;
            $transacao = Transacao::latest()->where('users_id', $user)->first();
            $item = Itemtransacao::where('transacao_id', $request->transacao_id)->get();
            $historico = Historico::create([
                'users_id' => $user,
                'pagamento_id' => $request->pagamento_id,
                'valortotal' => $request->valortotal
            ]);
            foreach ($item as $itens) {
                Itemhistorico::create([
                    'historico_id' => $historico->id,
                    'artigo_id' => $itens->artigo_id,
                    'quantidade' => $itens->quantidade,
                ]);
            }
            $$transacao = Transacao::latest()->where('users_id', $user)->delete();
            $item = Itemtransacao::where('transacao_id', $request->transacao_id)->delete();

            $hist = Historico::latest()->with(['users', 'pagamentos'])
                ->where('users_id', Auth::user()->id)->first();
            $historico = Itemhistorico::orderBy('id', 'desc')
                ->where('historico_id', $hist->id)
                ->with(['historicos', 'artigos'])
                ->get();

            $total = 0;
            foreach ($historico as $h) {
                $h->subtotal = $h->artigos->preco * $h->quantidade;
                $total += $h->subtotal;
            }
            $historico->total = $total;
            $iva = $total * 0.17;
            $historico->tt = $iva + $total;


            return view('invoide', compact('historico', 'hist'));
        } else {
            $user = Auth::user()->id;
            $transacao = Transacao::latest()->where('users_id', $user)->first();
            $item = Itemtransacao::where('transacao_id', $request->transacao_id)->get();
            $historico = Historico::create([
                'users_id' => $user,
                'pagamento_id' => $request->pagamento_id,
                'valortotal' => $request->valortotal
            ]);
            foreach ($item as $itens) {
                Itemhistorico::create([
                    'historico_id' => $historico->id,
                    'artigo_id' => $itens->artigo_id,
                    'quantidade' => $itens->quantidade,
                ]);
            }
            $$transacao = Transacao::latest()->where('users_id', $user)->delete();
            $item = Itemtransacao::where('transacao_id', $request->transacao_id)->delete();
            $request->session()->flash('status', 'Venda Finalizada!');
            return redirect('vendas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
