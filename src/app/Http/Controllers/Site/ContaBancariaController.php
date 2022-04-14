<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContaBancariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $clientes = Clientes::all();

        return view('site.contaBancaria', ['clientes' => $clientes]);
    }

    /**
     * Function Deposito.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function deposito($request)
    {
        DB::table('clientes')->where('email', $request->email)->increment('contaBancaria', $request->valor);
    }

    /**
     * Function Saque.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function saque($request)
    {
        $value = DB::table('clientes')->where('email', $request->email)->get();
        if ($value[0]->contaBancaria >= $request->valor) {
            DB::table('clientes')->where('email', $request->email)->decrement('contaBancaria', $request->valor);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $valido = true;

        //verifica se existe um email selecionado e se o valor e maior que 0
        if ($request->email == 'Selecione o email' || $request->valor <= 0) return redirect()->back()->with('alert', 'Entrada inválida!\nSeleciona um email e um valor.');

        //verifica se e um deposito ou um saque e redireciona para a funcao especifica
        if ($request->tipo == 'deposito') {
            $this->deposito($request);
        } else {
            $valido = $this->saque($request);
        }

        //verifica se o valor de saque e valido e retorna (deposito sempre verdade)
        if ($valido == false) return redirect()->back()->with('alert', 'Operação inválida, valor requisitado insuficiente!');
        else return redirect()->back();
    }
}
