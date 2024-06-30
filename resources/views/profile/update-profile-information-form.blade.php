<div class="container mt-5">
    <div class="card" style="background-color: #ffffff; color: #000000;">
        <div class="card-header" style="background-color: #ffffff; color: #000000;">
            <h5 class="card-title">{{ __('Profile Information') }}</h5>
        </div>
        <div class="card-body">
            <p>{{ __('Update your account\'s profile information and email address.') }}</p>
            
            <!-- Profile Photo -->
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="row">
                    <div class="col-12 col-md-6">
                        <input type="file" id="photo" class="form-control visually-hidden" 
                               wire:model.live="photo" x-ref="photo" onchange="
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        document.getElementById('photoPreview').src = e.target.result;
                                        document.getElementById('photoPreview').style.display = 'block';
                                    };
                                    reader.readAsDataURL(this.files[0]);
                               "/>
                        <label for="photo" class="form-label">{{ __('Photo') }}</label>

                        <!-- Current Profile Photo -->
                        <div class="mt-2">
                            <img id="photoPreview" src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-circle img-fluid" style="max-width: 150px;">
                        </div>

                        <button type="button" class="btn btn-secondary mt-2 me-2" onclick="document.getElementById('photo').click();">
                            {{ __('Select A New Photo') }}
                        </button>

                        @if ($this->user->profile_photo_path)
                            <button type="button" class="btn btn-secondary mt-2" wire:click="deleteProfilePhoto">
                                {{ __('Remove Photo') }}
                            </button>
                        @endif

                        <x-input-error for="photo" class="mt-2" />
                    </div>
                </div>
            @endif

            <!-- Name -->
            <div class="row mt-3">
                <div class="col-12 col-md-6">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control" wire:model="state.name" required autocomplete="name">
                    <x-input-error for="name" class="mt-2" />
                </div>
            </div>

            <!-- Email -->
            <div class="row mt-3">
                <div class="col-12 col-md-6">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control" wire:model="state.email" required autocomplete="username">
                    <x-input-error for="email" class="mt-2" />

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                        <p class="text-sm mt-2">
                            {{ __('Your email address is unverified.') }}
                            <button type="button" class="btn btn-link text-primary" wire:click.prevent="sendEmailVerification">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if ($this->verificationLinkSent)
                            <p class="mt-2 font-medium text-sm text-success">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    @endif
                </div>
            </div>
        </div>

        <div class="card-footer" style="background-color: #ffffff; color: #000000;">
            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="photo">
                {{ __('Save') }}
            </button>
            <span wire:loading wire:target="photo" class="ms-3">{{ __('Saving...') }}</span>
            <x-action-message class="ms-3" on="saved">{{ __('Saved.') }}</x-action-message>
        </div>
    </div>
</div>
