<?php

namespace App\Http\Controllers\Manutencoes;

use App\Http\Controllers\Controller;
use App\Models\Manutencao\Estado;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EstadosController extends Controller
{
    public function index()
    {
        $columns = ['Cód. IBGE', 'Descrição', 'Sigla'];

        return view('crud.list', [
            'title' => 'Estados',
            'columns' => $columns,
            'routeIndex' => route('estados.index'),
            'routeCreate' => route('estados.create'),
            'routeList' => route('estados.list'),
            'routeShow' => route('estados.show', -9),
            'routeEdit' => route('estados.edit', -9),
            'routeDestroy' => route('estados.destroy', -9),
        ]);
    }

    public function list(Request $request)
    {
        $dataColumns = ['id', 'nome', 'sigla'];
        $data = Estado::getAll($dataColumns, ['nome' => $request['term']]);

        return $data;
    }

    public function select2(Request $request, int $id = null)
    {
        $dataColumns = ['id', 'nome'];
        $data = Estado::getSelect2($dataColumns, ['nome' => $request['term']]);

        return $data;
    }

    public function create()
    {
        $data = new Estado();

        return view('crud.estados.edit', [
            'crud' => 'create',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $data = new Estado();

        $data->id = $request['id'];
        $data->nome = trim(ucwords($request['nome']));
        $data->sigla = strtoupper($request['sigla']);
        $data->save();

        return redirect()
            ->route('estados.index')
            ->with('success', 'Registro criado com sucesso  !');
    }

    public function show(string $id)
    {
        $data = Estado::find($id);

        return view('crud.estados.edit', [
            'crud' => 'show',
            'data' => $data,
        ]);
    }

    public function edit(string $id)
    {
        $data = Estado::find($id);

        return view('crud.estados.edit', [
            'crud' => 'edit',
            'data' => $data,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $data = Estado::find($id);

        $data->nome = trim(ucwords($request['nome']));
        $data->sigla = strtoupper($request['sigla']);
        $data->save();

        return redirect()
            ->route('estados.index')
            ->with('success', 'Registro criado com sucesso  !');
    }

    public function destroy(string $id)
    {
        try {
            Estado::find($id)->delete();

            return ['success' => true, 'message' => "Registro excluído com sucesso !"];
        } catch (Exception $e) {
            return ['success' => false, 'message' => "Registro não pode ser excluído ! [{$e->getMessage()}]"];
        }
    }

}
