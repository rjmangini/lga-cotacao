<?php

namespace App\Http\Controllers\Manutencoes;

use App\Http\Controllers\Controller;
use App\Models\Manutencao\Cidade;
use App\Models\Manutencao\Estado;
use Illuminate\Http\Request;

class CidadesController extends Controller
{
    public function index()
    {
        $columns = ['Cód. IBGE', 'Cidade / UF'];

        return view('crud.list', [
            'title' => 'Cidades',
            'columns' => $columns,
            'routeIndex' => route('cidades.index'),
            'routeCreate' => route('cidades.create'),
            'routeList' => route('cidades.list'),
            'routeShow' => route('cidades.show', -9),
            'routeEdit' => route('cidades.edit', -9),
            'routeDestroy' => route('cidades.destroy', -9),
        ]);
    }

    public function list(Request $request)
    {
        $dataColumns = ['id', 'nome'];
        $data = Cidade::getAll($dataColumns, ['nome' => $request['term']]);

        return $data;
    }

    public function select2(Request $request, int $id = null)
    {
        $dataColumns = ['id', 'nome'];
        $data = Cidade::getSelect2($dataColumns, ['nome' => $request['term']]);

        return $data;
    }

    public function create()
    {
        $data = new Cidade();

        return view('crud.cidades.edit', [
            'crud' => 'create',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $data = new Cidade();

        $estado = Estado::find($request['estado_id']);
        $pos = strpos($request['nome'], '/');
        if (!$pos) {
            $pos = strlen($request['nome']);
        }
        $nome = substr($request['nome'], 0, $pos);

        $data->nome = trim(ucwords($nome)) . '/' . $estado->sigla;
        $data->estado_id = $request['estado_id'];
        $data->save();

        return redirect()
            ->route('cidades.index')
            ->with('success', 'Registro criado com sucesso  !');
    }

    public function show(string $id)
    {
        $data = Cidade::find($id);

        return view('crud.cidades.edit', [
            'crud' => 'show',
            'data' => $data,
        ]);
    }

    public function edit(string $id)
    {
        $data = Cidade::find($id);

        return view('crud.cidades.edit', [
            'crud' => 'edit',
            'data' => $data,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $data = Cidade::find($id);

        $estado = Estado::find($request['estado_id']);
        $pos = strpos($request['nome'], '/');
        if (!$pos) {
            $pos = strlen($request['nome']);
        }
        $nome = substr($request['nome'], 0, $pos);

        $data->nome = trim(ucwords($nome)) . '/' . $estado->sigla;
        $data->estado_id = $request['estado_id'];
        $data->save();

        return redirect()
            ->route('cidades.index')
            ->with('success', 'Registro atualizado com sucesso  !');
    }

    public function destroy(string $id)
    {
        //
    }
}
