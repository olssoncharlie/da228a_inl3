<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('/') }}">Start</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('herbs*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('herbs.index') }}">Kryddor</a>
            </li>
            <li class="nav-item {{ Request::is('reviews*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('reviews.index') }}">Recensioner</a>
            </li>
            <li class="nav-item {{ Request::is('stores*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('stores.index') }}">Butiker</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Logga in</a>
            </li>
        </ul>
    </div>
</nav>