<?php

namespace App\Http\Controllers\Cadastros;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Destinatario;
use Exception;
use Illuminate\Http\Request;

class DestinatariosController extends Controller
{

    public function index()
    {
        $columns = ['ID', 'Razão Social', 'e-mail', 'Fone', 'Cidade'];

        return view('crud.list', [
            'title' => 'Destinatários',
            'columns' => $columns,
            'routeIndex' => route('destinatarios.index'),
            'routeCreate' => route('destinatarios.create'),
            'routeList' => route('destinatarios.list'),
            'routeShow' => route('destinatarios.show', -9),
            'routeEdit' => route('destinatarios.edit', -9),
            'routeDestroy' => route('destinatarios.destroy', -9),
        ]);
    }

    public function list()
    {
        // return dd('data');
        $dataColumns = ['id', 'razaosocial', 'email', 'fone', 'cidade.nome'];
        $data = Destinatario::getAll($dataColumns);

        return $data;
    }

    public function create()
    {
        $data = new Destinatario();

        return view('crud.destinatarios.edit', [
            'crud' => 'create',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $data = new Destinatario();
        $data->cnpj = strtoupper($request['cnpj']);
        $data->iestadual = strtoupper($request['iestadual'] ?? 'ISENTO');
        $data->cliente_id = $request['cliente_id'];
        $data->razaosocial = strtoupper($request['razaosocial']);
        $data->endereco = strtoupper($request['endereco']);
        $data->numero = strtoupper($request['numero']);
        $data->bairro = strtoupper($request['bairro']);
        $data->complemento = strtoupper($request['complemento']);
        $data->cidade_id = $request['cidade_id'];
        $data->cep = strtoupper($request['cep']);
        $data->fone = strtoupper($request['fone1']);
        $data->email = $request['email'];
        $data->save();

        return redirect()
            ->route('destinatarios.index')
            ->with('success', 'Registro criado com sucesso  !');
    }

    public function show(string $id)
    {
        $data = Destinatario::find($id);

        return view('crud.destinatarios.edit', [
            'crud' => 'show',
            'data' => $data,
        ]);
    }

    public function edit(string $id)
    {
        $data = Destinatario::find($id);

        return view('crud.destinatarios.edit', [
            'crud' => 'edit',
            'data' => $data,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $data = Destinatario::find($id);
        $data->cnpj = strtoupper($request['cnpj']);
        $data->iestadual = strtoupper($request['iestadual'] ?? 'ISENTO');
        $data->cliente_id = $request['cliente_id'];
        $data->razaosocial = strtoupper($request['razaosocial']);
        $data->endereco = strtoupper($request['endereco']);
        $data->numero = strtoupper($request['numero']);
        $data->bairro = strtoupper($request['bairro']);
        $data->complemento = strtoupper($request['complemento']);
        $data->cidade_id = $request['cidade_id'];
        $data->cep = strtoupper($request['cep']);
        $data->fone = strtoupper($request['fone1']);
        $data->email = $request['email'];
        $data->save();

        return redirect()
            ->route('destinatarios.index')
            ->with('success', 'Registro alterado com sucesso  !');
    }

    public function destroy(string $id)
    {
        try {
            Destinatario::find($id)->delete();

            return ['success' => true, 'message' => "Registro excluído com sucesso !"];
        } catch (Exception $e) {
            return ['success' => false, 'message' => "Registro não pode ser excluído ! [{$e->getMessage()}]"];
        }
    }
}
