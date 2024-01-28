<?php

namespace App\Http\Controllers\Cadastros;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Cliente;
use Exception;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    public function index()
    {
        $columns = ['ID', 'Razão Social', 'e-mail', 'Fone', 'Cidade'];

        return view('crud.list', [
            'title' => 'Clientes',
            'columns' => $columns,
            'routeIndex' => route('clientes.index'),
            'routeCreate' => route('clientes.create'),
            'routeList' => route('clientes.list'),
            'routeShow' => route('clientes.show', -9),
            'routeEdit' => route('clientes.edit', -9),
            'routeDestroy' => route('clientes.destroy', -9),
        ]);
    }

    public function list()
    {
        $dataColumns = ['id', 'razaosocial', 'email', 'fone1', 'cidade.nome'];
        $data = Cliente::getAll($dataColumns);

        return $data;
    }

    public function select2(Request $request, int $id = null)
    {
        $dataColumns = ['id', 'razaosocial'];
        $data = Cliente::getSelect2($dataColumns, ['razaosocial' => $request['term']]);

        return $data;
    }

    public function create()
    {
        $data = new Cliente();

        return view('crud.clientes.edit', [
            'crud' => 'create',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $data = new Cliente();
        $data->cnpj = $request['cnpj'];
        $data->iestadual = strtoupper($request['iestadual'] ?? 'ISENTO');
        $data->razaosocial = strtoupper($request['razaosocial']);
        $data->endereco = strtoupper($request['endereco']);
        $data->numero = strtoupper($request['numero']);
        $data->bairro = strtoupper($request['bairro']);
        $data->complemento = strtoupper($request['complemento']);
        $data->cidade_id = $request['cidade_id'];
        $data->cep = $request['cep'];
        $data->fone1 = strtoupper($request['fone1']);
        $data->fone2 = strtoupper($request['fone2']);
        $data->contato = strtoupper($request['contato']);
        $data->email = $request['email'];
        $data->tabela0 = $request['tabela0'];
        $data->tabela1 = $request['tabela1'];
        $data->inativo = $request['inativo'] ?? 0;
        $data->save();

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Registro criado com sucesso  !');
    }

    public function show(string $id)
    {
        $data = Cliente::find($id);

        return view('crud.clientes.edit', [
            'crud' => 'show',
            'data' => $data,
        ]);
    }

    public function edit(string $id)
    {
        $data = Cliente::find($id);

        return view('crud.clientes.edit', [
            'crud' => 'edit',
            'data' => $data,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $data = Cliente::find($id);
        $data->cnpj = $request['cnpj'];
        $data->iestadual = strtoupper($request['iestadual'] ?? 'ISENTO');
        $data->razaosocial = strtoupper($request['razaosocial']);
        $data->endereco = strtoupper($request['endereco']);
        $data->numero = strtoupper($request['numero']);
        $data->bairro = strtoupper($request['bairro']);
        $data->complemento = strtoupper($request['complemento']);
        $data->cidade_id = $request['cidade_id'];
        $data->cep = $request['cep'];
        $data->fone1 = strtoupper($request['fone1']);
        $data->fone2 = strtoupper($request['fone2']);
        $data->contato = strtoupper($request['contato']);
        $data->email = $request['email'];
        $data->tabela0 = $request['tabela0'];
        $data->tabela1 = $request['tabela1'];
        $data->inativo = $request['inativo'] ?? 0;
        $data->save();

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Registro atualizado com sucesso  !');
    }

    public function destroy(string $id)
    {
        try {
            Cliente::find($id)->delete();

            return ['success' => true, 'message' => "Registro excluído com sucesso !"];
        } catch (Exception $e) {
            return ['success' => false, 'message' => "Registro não pode ser excluído ! [{$e->getMessage()}]"];
        }
    }
}
