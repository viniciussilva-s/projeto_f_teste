<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('index') }}">
            <span class="align-middle">Emprezaz</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Página(s)
            </li>

            <li class="sidebar-item  {{ Route::currentRouteName() == 'index' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>



            <li class="sidebar-item  {{ Route::currentRouteName() == 'usuarios.index' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('usuarios.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Usuários</span>
                </a>
            </li>



        </ul>
    </div>
</nav>
