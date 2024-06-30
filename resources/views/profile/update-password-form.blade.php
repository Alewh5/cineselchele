<div class="container mt-5">
    <div class="card" style="background-color: #ffffff; color: #000000;">
        <div class="card-header bg-white">
            <h5 class="card-title">{{ __('Update Password') }}</h5>
        </div>
        <div class="card-body">
            <p>{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
            
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                    <input id="current_password" type="password" class="form-control mt-1" wire:model="state.current_password" autocomplete="current-password">
                    <x-input-error for="current_password" class="mt-2" />
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-md-6">
                    <label for="password" class="form-label">{{ __('New Password') }}</label>
                    <input id="password" type="password" class="form-control mt-1" wire:model="state.password" autocomplete="new-password">
                    <x-input-error for="password" class="mt-2" />
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-md-6">
                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" type="password" class="form-control mt-1" wire:model="state.password_confirmation" autocomplete="new-password">
                    <x-input-error for="password_confirmation" class="mt-2" />
                </div>
            </div>
        </div>

        <div class="card-footer bg-white">
            <button type="submit" class="btn btn-primary me-3" wire:loading.attr="disabled">
                {{ __('Save') }}
            </button>
            <span wire:loading wire:target="updatePassword" class="ms-3">{{ __('Saving...') }}</span>
            <x-action-message class="ms-3" on="saved">{{ __('Saved.') }}</x-action-message>
        </div>
    </div>
</div>
