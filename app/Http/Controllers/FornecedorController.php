<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index', ['titulo' => 'Listagem de Fornecedores']);
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->get();
        return view('app.fornecedor.listar', ['titulo' => 'Listagem de Fornecedores', 'fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request)
    {
        if ($request->input('_token') != '') {
            // Processar os dados do formulário
            $regra = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $fedback = [
                'required' => 'O campo :attribute é obrigatório.',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
                'uf.min' => 'O campo uf deve ter no mínimo 2 caracteres.',
                'uf.max' => 'O campo uf deve ter no máximo 2 caracteres.',
                'email.email' => 'O campo email deve ser um endereço de email válido.'
            ];

            $request->validate($regra, $fedback);

            // Se a validação passar, você pode salvar os dados no banco de dados ou realizar outras ações
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
            echo "Fornecedor adicionado com sucesso!";

        }
        return view('app.fornecedor.adicionar', ['titulo' => 'Adicionar Fornecedor']);
    }
}
