<?php

namespace App\Http\Controllers\Parametros;

use App\Http\Controllers\Controller;
use App\Models\Parametros\Unidade;
use Exception;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UnidadesController extends Controller
{
    public function index()
    {
        $columns = ['ID', 'Unidade', 'Cidade', 'UF', 'Tipo'];

        return view('crud.list', [
            'title' => 'Unidades',
            'columns' => $columns,
            'routeIndex' => route('unidades.index'),
            'routeCreate' => route('unidades.create'),
            'routeList' => route('unidades.list'),
            'routeShow' => route('unidades.show', -9),
            'routeEdit' => route('unidades.edit', -9),
            'routeDestroy' => route('unidades.destroy', -9),
        ]);
    }

    public function list(Request $request)
    {
        $dataColumns = ['id', 'unidade', 'cidade', 'uf', 'tipo'];
        $data = Unidade::getAll($dataColumns, ['cidade' => $request['term']]);

        return $data;
    }

    public function select2(Request $request, int $id = null)
    {
        $dataColumns = ['id', 'cidade'];
        $data = Unidade::getSelect2($dataColumns, ['cidade' => $request['term']]);

        return $data;
    }

    public function create()
    {
        $data = new Unidade();

        return view('crud.unidades.edit', [
            'crud' => 'create',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $data = new Unidade();

        $data->unidade = trim(strtoupper($request['unidade']));
        $data->cidade = trim(strtoupper($request['cidade']));
        $data->uf = trim(strtoupper($request['uf']));
        $data->tipo = $request['tipo'];
        $data->cep = trim(strtoupper($request['cep']));

        return redirect()
            ->route('unidades.index')
            ->with('success', 'Registro criado com sucesso  !');
    }

    public function show(string $id)
    {
        $data = Unidade::find($id);

        return view('crud.unidades.edit', [
            'crud' => 'show',
            'data' => $data,
        ]);
    }

    public function edit(string $id)
    {
        $data = Unidade::find($id);

        return view('crud.unidades.edit', [
            'crud' => 'edit',
            'data' => $data,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $data = Unidade::find($id);

        $data->unidade = trim(strtoupper($request['unidade']));
        $data->cidade = trim(strtoupper($request['cidade']));
        $data->uf = trim(strtoupper($request['uf']));
        $data->tipo = $request['tipo'];
        $data->cep = trim(strtoupper($request['cep']));
        $data->save();

        return redirect()
            ->route('unidades.index')
            ->with('success', 'Registro criado com sucesso  !');
    }

    public function destroy(string $id)
    {
        try {
            Unidade::find($id)->delete();

            return ['success' => true, 'message' => "Registro excluído com sucesso !"];
        } catch (Exception $e) {
            return ['success' => false, 'message' => "Registro não pode ser excluído ! [{$e->getMessage()}]"];
        }
    }
}
