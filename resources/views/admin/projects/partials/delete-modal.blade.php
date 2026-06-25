<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title fw-bold font-display" id="deleteModalLabel">
                    <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                    {{ __("Delete Project") }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">
                    {{ __("Are you sure you want to delete the project") }}
                    <span id="delete-project-name" class="fw-semibold"></span> ?
                </p>
                <p class="text-danger small mt-3 mb-0">
                    <i class="bi bi-info-circle me-1"></i> {{ __("This action cannot be undone.") }}
                </p>
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __("Cancel") }}</button>
                <form id="delete-form" action="" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash me-1"></i> {{ __("Delete") }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('deleteModal');
    if (modal) {
        modal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            document.getElementById('delete-project-name').textContent = button.getAttribute('data-project-name');
            document.getElementById('delete-form').setAttribute('action', button.getAttribute('data-action'));
        });
    }
});
</script>
@endpush
