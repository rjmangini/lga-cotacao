<?php

namespace App\Http\Controllers\Parametros;

use App\Http\Controllers\Controller;
use App\Models\Parametros\Tabela;
use Illuminate\Http\Request;

class TabelasController extends Controller
{

    public function index()
    {
        $columns = ['ID', 'Tabela', 'Região', 'Raio', 'Peso', 'Capital', 'Interior', 'Redespacho'];

        return view('crud.list', [
            'title' => 'Tabelas',
            'columns' => $columns,
            'routeIndex' => route('tabelas.index'),
            'routeCreate' => route('tabelas.create'),
            'routeList' => route('tabelas.list'),
            'routeShow' => route('tabelas.show', -9),
            'routeEdit' => route('tabelas.edit', -9),
            'routeDestroy' => route('tabelas.destroy', -9),
        ]);
    }

    public function list(Request $request)
    {
        $dataColumns = ['id', 'tabela', 'regiao.descricao', 'regiao.raio', 'peso.descricao', 'capital', 'interior', 'redespacho'];
        $data = Tabela::getAll($dataColumns, ['descricao' => $request['term']]);

        return $data;
    }

    public function select2(Request $request, int $id = null)
    {
        $dataColumns = ['id', 'nome'];
        $data = Tabela::getSelect2($dataColumns, ['descricao' => $request['term']]);

        return $data;
    }

    public function create()
    {
        $data = new Tabela();

        return view('crud.tabelas.edit', [
            'crud' => 'create',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $data = new Tabela();

        $data->tabela = $request['tabela'];
        $data->regiao_id = $request['regiao_id'];
        $data->peso_id = $request['peso_id'];
        $data->capital = $request['capital'];
        $data->interior = $request['interior'];
        $data->redespacho = $request['redespacho'];
        $data->save();

        return redirect()
            ->route('tabelas.index')
            ->with('success', 'Registro criado com sucesso  !');
    }

    public function show(string $id)
    {
        $data = Tabela::find($id);

        return view('crud.tabelas.edit', [
            'crud' => 'show',
            'data' => $data,
        ]);
    }

    public function edit(string $id)
    {
        $data = Tabela::find($id);

        return view('crud.tabelas.edit', [
            'crud' => 'edit',
            'data' => $data,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $data = Tabela::find($id);

        $data->tabela = $request['tabela'];
        $data->regiao_id = $request['regiao_id'];
        $data->peso_id = $request['peso_id'];
        $data->capital = $request['capital'];
        $data->interior = $request['interior'];
        $data->redespacho = $request['redespacho'];
        $data->save();

        return redirect()
            ->route('tabelas.index')
            ->with('success', 'Registro criado com sucesso  !');
    }

    public function destroy(string $id)
    {
        try {
            Tabela::find($id)->delete();

            return ['success' => true, 'message' => "Registro excluído com sucesso !"];
        } catch (Exception $e) {
            return ['success' => false, 'message' => "Registro não pode ser excluído ! [{$e->getMessage()}]"];
        }
    }

}
