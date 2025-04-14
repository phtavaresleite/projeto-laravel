<h3>fornecedor</h3>

@if (count($fornecedor) > 0 && count($fornecedor) < 10)
    <h3>tem fornecedor</h3>
@elseif (count($fornecedor) > 10)
    <h3>tem muitos fornecedor</h3>
@else
    <h3>Ainda nao exitem fornecedores</h3>
@endif

@isset($fornecedor)
    @foreach ($fornecedor as $f)
        Fornecedor: {{ $f['nome'] }} <br>
        @switch($f['status'])
            @case('S')
                Status: Ativo
                @break
        
            @default
                Status: Inativo
        @endswitch
        <br>
        CNPJ: {{ $f['cnpj'] ?? 'Não informado' }}
        <hr>
    @endforeach
@endisset
