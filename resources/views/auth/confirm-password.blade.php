@extends('layouts.guest')

@section('content')
<div class="card-header">
    <h4 class="card-title mb-0 text-center fw-bold font-display">{{ __('Confirm Password') }}</h4>
</div>
<div class="card-body">
    <p class="text-muted mb-3">{{ __('Please confirm your password before continuing.') }}</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                {{ __('Confirm Password') }}
            </button>
        </div>

        @if (Route::has('password.request'))
            <div class="text-center">
                <a class="text-decoration-none small" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            </div>
        @endif
    </form>
</div>
@endsection
