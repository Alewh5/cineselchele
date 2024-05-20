<x-guest-layout>
    <div class="bg-dark min-vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="background-color: #0d1117; color: #fff;">
                        <div class="card-header">{{ __('Registrar') }}</div>

                        <div class="card-body" style="background-color: #161b22;">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label" style="color: #fff;">{{ __('Nombre') }}</label>
                                    <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" style="background-color: #0d1117; border-color: #343a40; color: #fff;" />
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label" style="color: #fff;">{{ __('Email') }}</label>
                                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" style="background-color: #0d1117; border-color: #343a40; color: #fff;" />
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label" style="color: #fff;">{{ __('Contraseña') }}</label>
                                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" style="background-color: #0d1117; border-color: #343a40; color: #fff;" />
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label" style="color: #fff;">{{ __('Confirmar Contraseña') }}</label>
                                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" style="background-color: #0d1117; border-color: #343a40; color: #fff;" />
                                </div>

                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="terms" id="terms" required />
                                        <label class="form-check-label" for="terms" style="color: #fff;">
                                            {!! __('Acepto los términos de servicio y la política de privacidad.', [
                                                'terms_of_service' => '<a href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </label>
                                    </div>
                                @endif

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('login') }}" class="me-3" style="color: #fff;">{{ __('Already registered?') }}</a>
                                    <button type="submit" class="btn btn-primary" style="background-color: #0d1117; border-color: #0d1117;">{{ __('Register') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
