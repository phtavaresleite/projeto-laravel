<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato; // Ensure the model is imported

class ContatoController extends Controller
{
    public function contato(Request $request){

        //dd($request); // Debugging line to check request data
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // //print_r($contato->getAttributes()); // Debugging line to check attributes
        // $contato->save(); // Save the contact information to the database

        // Alternatively, you can use the create method
        SiteContato::create($request->all()); // Create a new contact using mass assignment

        return view('site.contato', ['titulo' => 'Contato']);
    }   
}
