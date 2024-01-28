<?php

namespace App\Http\Controllers\Parametros;

use App\Http\Controllers\Controller;
use App\Models\Parametros\Localidade;
use Illuminate\Http\Request;

class LocalidadesController extends Controller
{
    public function index()
    {
        $columns = ['ID', 'UF', 'Cidade', 'CEP Inicial', 'CEP Final', 'Raio'];

        return view('crud.list', [
            'title' => 'Localidades',
            'columns' => $columns,
            'routeIndex' => route('localidades.index'),
            'routeCreate' => route('localidades.create'),
            'routeList' => route('localidades.list'),
            'routeShow' => route('localidades.show', -9),
            'routeEdit' => route('localidades.edit', -9),
            'routeDestroy' => route('localidades.destroy', -9),
        ]);
    }

    public function list(Request $request)
    {
        $dataColumns = ['id', 'uf', 'descricao', 'cep1', 'cep2', 'tabela'];
        $data = Localidade::getAll($dataColumns, ['descricao' => $request['term']]);

        return $data;
    }

    public function select2(Request $request, int $id = null)
    {
        $dataColumns = ['id', 'nome'];
        $data = Localidade::getSelect2($dataColumns, ['descricao' => $request['term']]);

        return $data;
    }

    public function create()
    {
        $data = new Localidade();

        return view('crud.localidades.edit', [
            'crud' => 'create',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $data = new Localidade();

        $data->uf = trim(strtoupper($request['uf']));
        $data->descricao = trim(strtoupper($request['descricao']));
        $data->cep1 = $request['cep1'];
        $data->cep2 = $request['cep2'];
        $data->roteirizacao = $request['roteirizacao'];
        $data->unidade = trim(strtoupper($request['unidade']));
        $data->tarifa = trim($request['tarifa']);
        $data->tabela = trim(strtoupper($request['tabela']));
        $data->grupo = trim($request['grupo']);
        $data->frap = trim(strtoupper($request['frap']));
        $data->prazo = trim(strtoupper($request['prazo']));
        $data->save();

        return redirect()
            ->route('localidades.index')
            ->with('success', 'Registro criado com sucesso  !');
    }

    public function show(string $id)
    {
        $data = Localidade::find($id);

        return view('crud.localidades.edit', [
            'crud' => 'show',
            'data' => $data,
        ]);
    }

    public function edit(string $id)
    {
        $data = Localidade::find($id);

        return view('crud.localidades.edit', [
            'crud' => 'edit',
            'data' => $data,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $data = Localidade::find($id);

        $data->uf = trim(strtoupper($request['uf']));
        $data->descricao = trim(strtoupper($request['descricao']));
        $data->cep1 = $request['cep1'];
        $data->cep2 = $request['cep2'];
        $data->roteirizacao = $request['roteirizacao'];
        $data->unidade = trim(strtoupper($request['unidade']));
        $data->tarifa = trim($request['tarifa']);
        $data->tabela = trim(strtoupper($request['tabela']));
        $data->grupo = trim($request['grupo']);
        $data->frap = trim(strtoupper($request['frap']));
        $data->prazo = trim(strtoupper($request['prazo']));
        $data->save();

        return redirect()
            ->route('localidades.index')
            ->with('success', 'Registro criado com sucesso  !');
    }

    public function destroy(string $id)
    {
        try {
            Localidade::find($id)->delete();

            return ['success' => true, 'message' => "Registro excluído com sucesso !"];
        } catch (Exception $e) {
            return ['success' => false, 'message' => "Registro não pode ser excluído ! [{$e->getMessage()}]"];
        }
    }
}
