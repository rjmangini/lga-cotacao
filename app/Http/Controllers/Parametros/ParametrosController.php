<?php

namespace App\Http\Controllers\Parametros;

use App\Http\Controllers\Controller;
use App\Models\Parametros\Parametros;
use Illuminate\Http\Request;

class ParametrosController extends Controller
{
    public function index()
    {
        $columns = ['ID', 'Descrição'];

        return view('crud.list', [
            'title' => 'Parametros',
            'columns' => $columns,
            'routeIndex' => route('parametros.index'),
            'routeCreate' => null,
            'routeList' => route('parametros.list'),
            'routeShow' => route('parametros.show', -9),
            'routeEdit' => route('parametros.edit', -9),
            'routeDestroy' => null,
        ]);
    }

    public function list(Request $request)
    {
        $dataColumns = ['id', 'descricao'];
        $data = Parametros::getAll($dataColumns, ['descricao' => $request['term']]);

        return $data;
    }

    public function show(string $id = "1")
    {
        $data = Parametros::find($id);

        return view('crud.parametros.edit', [
            'crud' => 'show',
            'data' => $data,
        ]);
    }

    public function edit(string $id = "1")
    {
        $data = Parametros::find($id);

        return view('crud.parametros.edit', [
            'crud' => 'edit',
            'data' => $data,
        ]);
    }

    public function update(Request $request, string $id = "1")
    {
        $data = Parametros::find($id);

        $data->capatazia_min = $request['capatazia_min'];
        $data->capatazia_val = $request['capatazia_val'];
        $data->taxanf_capital = $request['taxanf_capital'];
        $data->taxanf_interior = $request['taxanf_interior'];
        $data->taxanf_capital2 = $request['taxanf_capital2'];
        $data->taxanf_interior2 = $request['taxanf_interior2'];
        $data->frap_valor = $request['frap_valor'];
        $data->pesomax = $request['pesomax'];
        $data->valornf = $request['valornf'];
        $data->valormax_capital = $request['valormax_capital'];
        $data->valormax_interior = $request['valormax_interior'];
        $data->valormax_aeroporto = $request['valormax_aeroporto'];
        $data->taxa1 = $request['taxa1'];
        $data->email = trim(strtolower($request['email']));
        $data->save();

        return redirect()
            ->route('parametros.edit', 1)
            ->with('success', 'Registro criado com sucesso  !');
    }

}
