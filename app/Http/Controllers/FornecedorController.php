<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedor = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '11.111.111/1111-11',
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
            ]
        ];
        return view ("app.fornecedor.index", compact('fornecedor'));
    }
}
