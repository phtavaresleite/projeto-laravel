@extends ('app.layouts.basico')
@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class = "titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">
            <li><a href="{{route ('app.fornecedor.adicionar')}}">Novo</a></li>
            <li><a href="{{route ('app.fornecedor')}}">Consultar</a></li>
        </div>

        <div class="informacao-pagina">
            <div style = 'width: 30%; margin-left: auto; margin-right: auto;'>
                <form action="{{route('app.fornecedor.adicionar')}}" method="post">
                    @csrf
                    <input type="text" class="borda-preta" name = "nome" placeholder="Nome" value="{{ old('nome') }}">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text" class="borda-preta" name = "site" placeholder="Site" value="{{ old('site') }}">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <input type="text" class="borda-preta" name = "uf" placeholder="UF" value="{{ old('uf') }}">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                    <input type="text" class="borda-preta" name = "email" placeholder="E-mail" value="{{ old('email') }}">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                    
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div> 
@endsection