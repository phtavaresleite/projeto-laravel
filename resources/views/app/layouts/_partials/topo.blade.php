<div class="topo">

    <div class="logo">
        <a href="{{ route('site.index') }}"><img src="{{ asset('img/logo.png') }}"></a>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('app.cliente') }}">Cliente</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Fornecedor</a></li>
            <li><a href="{{ route('app.produto') }}">Produto</a></li>
            <li><a href="{{ route('app.sair') }}">Logout</a></li>
        </ul>
    </div>
</div>