<nav class="navbar navbar-expand-lg bg-primary py-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('page.index') }}">MangaDex</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- search box -->
            <form class="d-flex ms-auto" role="search" method="GET" action="{{ route('page.index') }}">
                <div class="input-group">
                    <input name="search" class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-dark" type="submit"> <i class="bi bi-search"></i> </button>
                </div>
            </form>

            <!--profile and logout -->
            @auth
                <div class="btn btn-outline-dark dropdown ms-lg-3 mt-3 mt-lg-0">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @endauth
        </div>




    </div>
</nav>
