@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p class="mb-3">{{ __("Welcome back, :name!", ["name" => Auth::user()->name]) }}</p>
                    <p class="text-secondary small">{{ __("You will be redirected to the homepage in a few seconds...") }}</p>

                    <a href="{{ url('/') }}" class="btn btn-primary">
                        <i class="bi bi-house me-1"></i> {{ __("Go to Homepage") }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('login_redirect'))
    @push('scripts')
    <script>
        (function() {
            var seconds = 5;
            setTimeout(function() {
                window.location.href = "{{ url('/') }}";
            }, seconds * 1000);
        })();
    </script>
    @endpush
@endif
@endsection
