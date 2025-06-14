<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato; // Ensure the model is imported
use App\Models\MotivoContato; // Import the MotivoContato model

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
        //SiteContato::create($request->all()); // Create a new contact using mass assignment

        $motivos_contato = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivos_contato' => $motivos_contato]);
    }   

    public function salvar(Request $request){
        // Validate the request data
    $request->validate([
        'nome' => 'required|min:3|max:40',
        'telefone' => 'required|max:15',
        'email' => 'required|email',
        'motivo_contato_id' => 'required',
        'mensagem' => 'required',
    ], [
        'nome.min' => 'O campo nome deve ter pelo menos 3 caracteres.',
        'nome.max' => 'O campo nome não pode ter mais de 40 caracteres.',
        'telefone.max' => 'O campo telefone não pode ter mais de 15 caracteres.',
        'email.email' => 'O campo email deve ser um endereço de email válido.',
        'motivo_contato_id.required' => 'Você deve selecionar um motivo para o contato.',
        'required' => 'O campo :attribute é obrigatório.'
    ]);
        SiteContato::create($request->all());

        return redirect()->route('site.index'); // Redirect to the main page after saving
    }
}
