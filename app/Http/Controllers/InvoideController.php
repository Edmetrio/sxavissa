<?php

namespace App\Http\Controllers;

use App\Models\Models\Historico;
use App\Models\Models\Itemhistorico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hist = Historico::latest()->with(['users','pagamentos'])
                            ->where('users_id', Auth::user()->id)->first();
        $historico = Itemhistorico::orderBy('id', 'desc')
                                    ->where('historico_id', $hist->id)
                                    ->with(['historicos','artigos'])
                                    ->get();
        /* dd($hist); */
        $total = 0;
        foreach ($historico as $h) {
            $h->subtotal = $h->artigos->preco * $h->quantidade;
            $total += $h->subtotal;
        }
        $historico->total = $total;
        $iva = $total * 0.17;
        $historico->tt = $iva + $total;

        return view('invoide', compact('historico', 'hist'));
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
        //
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
