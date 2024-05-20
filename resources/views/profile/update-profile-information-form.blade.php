<x-form-section submit="updateProfileInformation" class="mt-5" style="background-color: #1a202c; color: #cbd5e0;">
    <x-slot name="title" class="bg-dark text-light">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description" class="bg-dark text-light">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form" class="bg-dark text-light">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-12 col-md-6 bg-dark text-light">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="visually-hidden bg-dark text-light"
                            wire:model.live="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" class="bg-dark text-light" />

                <!-- Current Profile Photo -->
                <div class="mt-2 bg-dark text-light" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-circle img-fluid" style="max-width: 150px;">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2 bg-dark text-light" x-show="photoPreview" style="display: none;">
                    <img x-bind:src="photoPreview" alt="Preview" class="rounded-circle img-fluid" style="max-width: 150px;">
                </div>

                <x-secondary-button class="mt-2 me-2 bg-dark" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2 bg-dark" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2 bg-dark text-light" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-12 col-md-6 bg-dark text-light">
            <x-label for="name" value="{{ __('Name') }}" class="bg-dark text-light" />
            <x-input id="name" type="text" class="mt-1 form-control bg-dark text-light" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2 bg-dark text-light" />
        </div>

        <!-- Email -->
        <div class="col-12 col-md-6 bg-dark text-light">
            <x-label for="email" value="{{ __('Email') }}" class="bg-dark text-light" />
            <x-input id="email" type="email" class="mt-1 form-control bg-dark text-light" wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2 bg-dark text-light" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2 bg-dark text-light">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-primary ms-1 bg-dark text-light" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-success bg-dark text-light">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions" class="bg-dark text-light">
        <x-action-message class="me-3 bg-dark text-light" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo" class="bg-dark text-light">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
