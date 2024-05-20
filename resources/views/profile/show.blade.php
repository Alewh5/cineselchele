<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="container-fluid bg-dark text-white">
        <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="mb-4">
                    @livewire('profile.update-profile-information-form')
                </div>

                <hr class="bg-light">

            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mb-4">
                    @livewire('profile.update-password-form')
                </div>

                <hr class="bg-light">
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mb-4">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <hr class="bg-light">
            @endif

            <div class="mb-4">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <hr class="bg-light">
                <div class="mb-4">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
