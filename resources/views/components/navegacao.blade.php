<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('dashboard.index')}}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('venda.index')}}">
                    <span data-feather="file"></span>
                    Venda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('produto.index')}}">
                    <span data-feather="shopping-cart"></span>
                    Produto
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('cliente.index')}}">
                    <span data-feather="users"></span>
                    Clientes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('usuario.index')}}">
                    <span data-feather="users"></span>
                    Usuários
                </a>
            </li>
        </ul>
    </div>
</nav>