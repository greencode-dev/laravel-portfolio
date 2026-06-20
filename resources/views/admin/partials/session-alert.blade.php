@if (session('success') || session('message') || session('status'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
        <i class="fa-solid fa-check-circle me-1"></i>
        {{ session('success') ?? session('message') ?? session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
