@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __("Pannello di controllo") }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __("Pannello di controllo") }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p class="mb-3">{{ __("Bentornato, :name!", ["name" => Auth::user()->name]) }}</p>
                    <p class="text-secondary small">{{ __("Verrai reindirizzato alla homepage tra pochi secondi...") }}</p>

                    <a href="{{ url('/') }}" class="btn btn-primary">
                        <i class="fa-solid fa-house me-1"></i> {{ __("Vai alla homepage") }}
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
