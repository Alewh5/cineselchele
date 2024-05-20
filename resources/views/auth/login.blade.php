<x-guest-layout>
    <div class="bg-dark min-vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="background-color: #0d1117; color: #fff;">
                        <div class="card-header">{{ __('Login') }}</div>

                        <div class="card-body" style="background-color: #161b22;">
                            <form method="POST" action="{{ route('login') }}" class="p-4">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" style="background-color: #0d1117; border-color: #343a40; color: #fff;" />
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" style="background-color: #0d1117; border-color: #343a40; color: #fff;" />
                                </div>

                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                    <label class="form-check-label" for="remember_me">{{ __('Recuerdame') }}</label>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
                                </div>
                            </form>

                            <div class="p-4">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-decoration-none">{{ __('Olvidaste tu contraseña?') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
