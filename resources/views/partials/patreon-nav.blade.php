<!-- another nav-->
<ul class="d-flex flex-wrap container mt-3">
    <div class="d-flex flex-wrap">
        <a class="list-group-item me-2" href="{{route('contact')}}">CONTACT US</a>
        <a href="" class="list-group-item me-2">DISCORD</a>
        <a href="" class="list-group-item me-2">PAYPAL</a>
        <a href="" class="list-group-item me-2">PATREON</a>
        <a href="" class="list-group-item me-2">GENRE</a>
    </div>
    <div class="ms-auto">
        @guest
            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-dark rounded-pill">Login</a>
            <a href="{{ route('register') }}" class="btn btn-sm btn-outline-dark rounded-pill">Register</a>
        @endguest

        @auth
            @can('dashboard')
                <a href="{{ route('home') }}" class="btn btn-sm btn-dark rounded-pill"> <i class="bi bi-speedometer"></i> Go To
                    Dashboard</a>
            @endcan
        @endauth
    </div>
</ul>
<hr>
