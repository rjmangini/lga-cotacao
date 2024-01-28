<?php

namespace App\Http\Controllers\Parametros;

use App\Http\Controllers\Controller;
use App\Models\Parametros\Regiao;
use Exception;
use Illuminate\Http\Request;

class RegioesController extends Controller
{
    public function index()
    {
        $columns = ['ID', 'Descrição', 'Raio'];

        return view('crud.list', [
            'title' => 'Regiões',
            'columns' => $columns,
            'routeIndex' => route('regioes.index'),
            'routeCreate' => route('regioes.create'),
            'routeList' => route('regioes.list'),
            'routeShow' => route('regioes.show', -9),
            'routeEdit' => route('regioes.edit', -9),
            'routeDestroy' => route('regioes.destroy', -9),
        ]);
    }

    public function list(Request $request)
    {
        $dataColumns = ['id', 'descricao', 'raio'];
        $data = Regiao::getAll($dataColumns, ['descricao' => $request['term']]);

        return $data;
    }

    public function select2(Request $request, int $id = null)
    {
        $dataColumns = ['id', 'descricao'];
        $data = Regiao::getSelect2($dataColumns, ['descricao' => $request['term']]);

        return $data;
    }

    public function create()
    {
        $data = new Regiao();

        return view('crud.regioes.edit', [
            'crud' => 'create',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $data = new Regiao();

        $data->id = $request['id'];
        $data->descricao = trim(strtoupper($request['descricao']));
        $data->raio = trim(strtoupper($request['raio']));
        $data->save();

        return redirect()
            ->route('regioes.index')
            ->with('success', 'Registro criado com sucesso  !');
    }

    public function show(string $id)
    {
        $data = Regiao::find($id);

        return view('crud.regioes.edit', [
            'crud' => 'show',
            'data' => $data,
        ]);
    }

    public function edit(string $id)
    {
        $data = Regiao::find($id);

        return view('crud.regioes.edit', [
            'crud' => 'edit',
            'data' => $data,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $data = Regiao::find($id);

        $data->descricao = trim(strtoupper($request['descricao']));
        $data->raio = trim(strtoupper($request['raio']));
        $data->save();

        return redirect()
            ->route('regioes.index')
            ->with('success', 'Registro criado com sucesso  !');
    }

    public function destroy(string $id)
    {
        try {
            Regiao::find($id)->delete();

            return ['success' => true, 'message' => "Registro excluído com sucesso !"];
        } catch (Exception $e) {
            return ['success' => false, 'message' => "Registro não pode ser excluído ! [{$e->getMessage()}]"];
        }
    }
}
