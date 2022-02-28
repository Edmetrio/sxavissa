<?php

namespace App\Http\Controllers;

use App\Models\Models\Artigo;
use App\Models\Models\Cotacao;
use App\Models\Models\Endereco;
use App\Models\Models\Itemcohistorico;
use App\Models\Models\Itemcotacao;
use App\Models\Models\Perfil;
use App\Models\Models\Telefone;
use App\Models\Models\Titulo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemcotacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotacao = Cotacao::where('idacesso', Auth::user()->idacesso)->orderBy('created_at', 'desc')->get();
        $artigo = Artigo::where('idacesso', Auth::user()->idacesso)->orderBy('created_at', 'desc')->get();
        $item = Itemcotacao::with('cotacaos', 'artigos')->orderBy('created_at', 'desc')->get();
        $total = 0;
        foreach ($item as $i) {
            $i->subtotal = $i->quantidade * $i->artigos->preco;
            $total += $i->subtotal;
            $cotacaoo = $i->cotacaos->id;
        }
        $item->total = $total;
        $item->cotacao_id = $cotacaoo;
        /* dd($item); */
        return view('cotacao.item', compact('cotacao', 'artigo', 'item'));
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

        if (isset($request->valortotal)) {
            $item = Itemcotacao::where('cotacao_id', $request->cotacao_id)
                ->with('cotacaos', 'artigos')
                ->orderBy('created_at', 'desc')->get();
            /* dd($item); */
            $total = 0;
            foreach ($item as $i) {
                Itemcohistorico::create([
                    'cotacao_id' => $i->cotacao_id,
                    'artigo_id' => $i->artigo_id,
                    'designacao' => $i->designacao,
                    'quantidade' => $i->quantidade
                ]);
                $i->subtotal = $i->quantidade * $i->artigos->preco;
                $total += $i->subtotal;
            }
            $item->total = $total;
            $iva = $total * 0.17;
            $item->iva = $iva;
            $item->ttotal = $iva + $total;
            $data = Carbon::now()->format('Y-m-d');
            $item->data = $data;
            /* dd($item); */
            $user = User::with('cotacaos')->first();
            $perfil = Perfil::where('idacesso', Auth::user()->idacesso)->first();
            $titulo = Titulo::with('cotacaos')->get();
            $endereco = Endereco::where('idacesso', Auth::user()->idacesso)->first();
            $telefone = Telefone::where('idacesso', Auth::user()->idacesso)->first();
            $telefone->cotacao = $request->cotacao;
            $itemcota = Cotacao::where('idacesso', Auth::user()->idacesso)
                ->where('id', $request->cotacao_id)
                ->first();
            Itemcotacao::where(['cotacao_id' => $request->cotacao_id])->delete();
            /* $cotacao = Cotacao::where(['id' => $request->cotacao_id])
                                ->update(['valortotal' => $total, 'estado' => 'Gerado']); */
            return view('cotacao.invoicecotacao', compact('item', 'user', 'titulo', 'itemcota', 'perfil', 'endereco', 'telefone'));
        } else {
            $request->validate([
                'artigo_id' => 'required',
                'cotacao_id' => 'required',
                'quantidade' => 'required|numeric',
                'designacao' => 'required',
            ]);
            Itemcotacao::create($request->all());
            return redirect()->route('itemcotacao.index')
                ->with('status', 'Item adicionado');
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
        $item = Itemcotacao::find($id)->with('artigos','cotacaos')->first();
        /* dd($item); */
        $cotacao = Cotacao::where('idacesso', Auth::user()->idacesso)->orderBy('created_at', 'desc')->get();
        $artigo = Artigo::where('idacesso', Auth::user()->idacesso)->orderBy('created_at', 'desc')->get();
        return view('cotacao.editItemCotacao', compact('item','cotacao','artigo'));
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
        $request->validate([
            'artigo_id' => 'required',
            'cotacao_id' => 'required',
            'quantidade' => 'required|numeric',
            'designacao' => 'required',
        ]);
        Itemcotacao::find($id)->update($request->all());
            return redirect()->route('itemcotacao.index')
                ->with('status', 'Item Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Itemcotacao::find($id)->delete();
        return redirect()->route('itemcotacao.index')
            ->with('status', 'Empresa Apagada com sucesso');
    }
}
