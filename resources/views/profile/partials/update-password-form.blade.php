<section>
    <header>
        <h2 class="text-secondary">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-muted">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-2">
            <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
            <input class="form-control" type="password" name="current_password" id="current_password" autocomplete="current-password">
            @error('current_password')
            <span class="invalid-feedback mt-2" role="alert">
                <strong>{{ $errors->updatePassword->get('current_password') }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="password" class="form-label">{{ __('New Password') }}</label>
            <input class="form-control" type="password" name="password" id="password" autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback mt-2" role="alert">
                <strong>{{ $errors->updatePassword->get('password')}}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-2">

            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password">
            @error('password_confirmation')
            <span class="invalid-feedback mt-2" role="alert">
                <strong>{{ $errors->updatePassword->get('password_confirmation')}}</strong>
            </span>
            @enderror
        </div>

        <div class="d-flex justify-content-end align-items-center gap-4">
            @if (session('status') === 'password-updated')
            <div class="alert alert-success alert-dismissible fade show py-2 px-3 mb-0" role="alert">
                <i class="bi bi-check-circle-fill me-1"></i> {{ __('Saved.') }}
                <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <button type="submit" class="btn btn-primary btn-lg shadow-sm"><i class="bi bi-check-lg me-1"></i> {{ __('Save') }}</button>
        </div>
    </form>
</section>
