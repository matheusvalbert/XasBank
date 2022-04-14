<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvestimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $clientes = Clientes::all();

        return view('site.investimentos', ['clientes' => $clientes]);
    }

    /**
     * Function investir.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function investir($request)
    {
        $value = DB::table('clientes')->where('email', $request->email)->get();
        if($value[0]->contaBancaria >= $request->valor) {
            DB::table('clientes')->where('email', $request->email)->decrement('contaBancaria', $request->valor);
            DB::table('clientes')->where('email', $request->email)->increment('investimentos', $request->valor);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Function resgatar.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function resgatar($request)
    {
        $value = DB::table('clientes')->where('email', $request->email)->get();
        if($value[0]->investimentos >= $request->valor)
        {
            DB::table('clientes')->where('email', $request->email)->decrement('investimentos', $request->valor);
            DB::table('clientes')->where('email', $request->email)->increment('contaBancaria', $request->valor);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $valido = true;

        //verifica se existe um email selecionado e se o valor e maior que 0
        if($request->email == 'Selecione o email' || $request->valor <= 0) return redirect()->back()->with('alert', 'Entrada inválida!\nSeleciona um email e um valor.');

        //verifica se e um investir ou resgatar e redireciona para a funcao especifica
        if($request->tipo == 'investir')
        {
            $valido = $this->investir($request);
        }
        else
        {
            $valido = $this->resgatar($request);
        }

        //verifica se o valor exigido e valido
        if($valido == false) return redirect()->back()->with('alert', 'Operação inválida, valor requisitado insuficiente!');
        else return redirect()->back();
    }
}
