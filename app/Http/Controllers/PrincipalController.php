<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class PrincipalController extends Controller
{
    public function principal(){

        $motivos_contato = MotivoContato::all();

        return view('site.principal', ['titulo' => 'Home', 'motivos_contato' => $motivos_contato]);
    }
}
