<?php

namespace App\Http\Controllers\Manutencoes;

use App\Http\Controllers\Controller;
use App\Models\Manutencao\Estado;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $columns = ['ID', 'Nome', 'e-mail', 'Cliente'];

        return view('crud.list', [
            'title' => 'Usuários',
            'columns' => $columns,
            'routeIndex' => route('users.index'),
            'routeCreate' => route('users.create'),
            'routeList' => route('users.list'),
            'routeShow' => route('users.show', -9),
            'routeEdit' => route('users.edit', -9),
            'routeDestroy' => route('users.destroy', -9),
        ]);
    }

    public function list(Request $request)
    {
        $dataColumns = ['id', 'name', 'email', 'cliente.razaosocial'];
        $data = User::getAll($dataColumns, ['name' => $request['term']]);

        return $data;
    }

    public function select2(Request $request, int $id = null)
    {
        $dataColumns = ['id', 'name'];
        $data = User::getSelect2($dataColumns, ['name' => $request['term']]);

        return $data;
    }

    public function create()
    {
        $data = new User();

        return view('crud.users.edit', [
            'crud' => 'create',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $data = new User();

        $data->name = trim(strtoupper($request['name']));
        $data->email = trim($request['email']);
        $data->level = $request['level'];
        $data->cliente_id = $request['cliente_id'];
        if ($request['password']) {
            $data->password = $request['password'];
        }
        $data->save();

        return redirect()
            ->route('users.index')
            ->with('success', 'Registro criado com sucesso  !');
    }

    public function show(string $id)
    {
        $data = User::find($id);

        return view('crud.users.edit', [
            'crud' => 'show',
            'data' => $data,
        ]);
    }

    public function edit(string $id)
    {
        $data = User::find($id);

        return view('crud.users.edit', [
            'crud' => 'edit',
            'data' => $data,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $data = User::find($id);

        $data->name = trim(strtoupper($request['name']));
        $data->email = trim($request['email']);
        $data->level = $request['level'];
        $data->cliente_id = $request['cliente_id'];
        if ($request['password']) {
            $data->password = $request['password'];
        }
        $data->save();

        return redirect()
            ->route('users.index')
            ->with('success', 'Registro atualizado com sucesso  !');
    }

    public function destroy(string $id)
    {
        //
    }
}
