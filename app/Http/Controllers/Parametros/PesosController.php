<?php

namespace App\Http\Controllers\Parametros;

use App\Http\Controllers\Controller;
use App\Models\Parametros\Localidade;
use App\Models\Parametros\Peso;
use Exception;
use Illuminate\Http\Request;

class PesosController extends Controller
{
    public function index()
    {
        $columns = ['ID', 'Descrição', 'Peso KG'];

        return view('crud.list', [
            'title' => 'Pesos',
            'columns' => $columns,
            'routeIndex' => route('pesos.index'),
            'routeCreate' => route('pesos.create'),
            'routeList' => route('pesos.list'),
            'routeShow' => route('pesos.show', -9),
            'routeEdit' => route('pesos.edit', -9),
            'routeDestroy' => route('pesos.destroy', -9),
        ]);
    }

    public function list(Request $request)
    {
        $dataColumns = ['id', 'descricao', 'peso'];
        $data = Peso::getAll($dataColumns, ['descricao' => $request['term']]);

        return $data;
    }

    public function select2(Request $request, int $id = null)
    {
        $dataColumns = ['id', 'descricao'];
        $data = Peso::getSelect2($dataColumns, ['descricao' => $request['term']]);

        return $data;
    }

    public function create()
    {
        $data = new Peso();

        return view('crud.pesos.edit', [
            'crud' => 'create',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $data = new Peso();

        $data->id = $request['id'];
        $data->descricao = trim(strtoupper($request['descricao']));
        $data->peso = $request['peso'];
        $data->save();

        return redirect()
            ->route('pesos.index')
            ->with('success', 'Registro criado com sucesso  !');
    }

    public function show(string $id)
    {
        $data = Peso::find($id);

        return view('crud.pesos.edit', [
            'crud' => 'show',
            'data' => $data,
        ]);
    }

    public function edit(string $id)
    {
        $data = Peso::find($id);

        return view('crud.pesos.edit', [
            'crud' => 'edit',
            'data' => $data,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $data = Peso::find($id);

        $data->descricao = trim(strtoupper($request['descricao']));
        $data->peso = $request['peso'];
        $data->save();

        return redirect()
            ->route('pesos.index')
            ->with('success', 'Registro criado com sucesso  !');
    }

    public function destroy(string $id)
    {
        try {
            Peso::find($id)->delete();

            return ['success' => true, 'message' => "Registro excluído com sucesso !"];
        } catch (Exception $e) {
            return ['success' => false, 'message' => "Registro não pode ser excluído ! [{$e->getMessage()}]"];
        }
    }
}
