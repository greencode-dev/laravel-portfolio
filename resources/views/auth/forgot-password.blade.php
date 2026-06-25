@extends('layouts.guest')

@section('content')
<div class="card-header">
    <h4 class="card-title mb-0 text-center fw-bold font-display">{{ __('Reset Password') }}</h4>
</div>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>

        <div class="text-center mt-3">
            <a class="small text-decoration-none" href="{{ route('login') }}">{{ __('Back to login') }}</a>
        </div>
    </form>
</div>
@endsection
