<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PainelAdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $clientes = Clientes::all();

        return view('site.painelAdministrativo', ['clientes' => $clientes]);
    }

    /**
     * Store image in a folder.
     *
     * @param $request
     */
    public function saveImage($response)
    {
        foreach ($response['data'] as $i) {
            $image = file_get_contents($i['avatar']);
            $id = substr($i['avatar'], strrpos($i['avatar'], '/') + 1);
            file_put_contents(public_path('img/' . $id), $image);
        }
    }

    /**
     * Store data in database.
     *
     * @param $request
     */
    public function saveData($response)
    {
        foreach ($response['data'] as $i) {
            $path = substr($i['avatar'], strrpos($i['avatar'], '/') + 1);

            $clientes = new Clientes;
            $clientes->id = $i['id'];
            $clientes->email = $i['email'];
            $clientes->first_name = $i['first_name'];
            $clientes->last_name = $i['last_name'];
            $clientes->avatar = '/img/' . $path;
            $clientes->contaBancaria = 0;
            $clientes->investimentos = 0;
            $clientes->save();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store()
    {
        $count = DB::table('clientes')->count();

        if ($count != 0) return redirect()->back()->with('alert', 'Dados ja importados, precione OK para voltar ao Dashboard');

        //pagina 1
        $response = Http::accept('application/json')->get('https://reqres.in/api/users?page=1');
        $this->saveImage($response);
        $this->saveData($response);

        //pagina 2
        $response = Http::accept('application/json')->get('https://reqres.in/api/users?page=2');
        $this->saveImage($response);
        $this->saveData($response);

        return redirect()->back();
    }
}
