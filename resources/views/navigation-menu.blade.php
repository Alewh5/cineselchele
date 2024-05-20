<nav x-data="{ open: false }" class="navbar navbar-expand-lg navbar-light bg-dark">
    <!-- Primary Navigation Menu -->
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <x-application-mark class="block h-9 w-auto" />
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </li>
            </ul>
            <hr>

            <ul class="navbar-nav">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="teamsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->currentTeam->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="teamsDropdown">
                            <li><a class="dropdown-item" href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">{{ __('Team Settings') }}</a></li>
                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <li><a class="dropdown-item" href="{{ route('teams.create') }}">{{ __('Create New Team') }}</a></li>
                            @endcan
                            <li><hr class="dropdown-divider"></li>
                            @foreach (Auth::user()->allTeams() as $team)
                                <li><a class="dropdown-item" href="{{ route('teams.switch', $team->id) }}">{{ $team->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endif

                <!-- Settings Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        @else
                            {{ Auth::user()->name }}
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.show') }}">{{ __('Profile') }}</a></li>
                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <li><a class="dropdown-item" href="{{ route('api-tokens.index') }}">{{ __('API Tokens') }}</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
