<form action="{{ $action ?? route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @isset($method)
        @method($method)
    @endisset

    <div class="row g-4">
        <div class="col-md-7">
            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label fw-medium">{{ __("Title") }} <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $project->title ?? '') }}"
                    placeholder="{{ __("Enter the project title") }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Category --}}
            <div class="mb-3">
                <label for="type_id" class="form-label fw-medium">{{ __("Category") }}</label>
                <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror">
                    <option value="">{{ __("-- Select a category --") }}</option>
                    @foreach ($types as $type)
                        @php
                            $typeColor = $type->color ?? '#6366f1';
                        @endphp
                        <option value="{{ $type->id }}" {{ old('type_id', $project->type_id ?? '') == $type->id ? 'selected' : '' }} style="color: {{ $typeColor }};">● {{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Technologies --}}
            <div class="mb-3">
                <label class="form-label fw-medium">{{ __("Technologies") }}</label>
                @error('technologies')
                    <div class="text-danger small mb-2">{{ $message }}</div>
                @enderror
                <div class="row row-cols-2 row-cols-sm-3 g-2">
                    @forelse ($technologies as $technology)
                        <div class="col">
                            <div class="form-check">
                                <input type="checkbox" name="technologies[]" id="technology_{{ $technology->id }}"
                                    value="{{ $technology->id }}"
                                    class="form-check-input @error('technologies') is-invalid @enderror"
                                    {{ in_array($technology->id, old('technologies', $technologyIds ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label d-flex align-items-center gap-1" for="technology_{{ $technology->id }}">
                                    <span style="width:0.5rem;height:0.5rem;border-radius:50%;background:{{ $technology->color ?? '#6366f1' }};display:inline-block;"></span>
                                    {{ $technology->name }}
                                </label>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-secondary small mb-0">{{ __("No technologies available.") }}</p>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Description --}}
            <div class="mb-3 mb-md-0">
                <label for="description" class="form-label fw-medium">{{ __("Description") }}</label>
                <textarea name="description" id="description" rows="5"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="{{ __("Enter a project description (optional)") }}">{{ old('description', $project->description ?? '') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-5">
            {{-- Upload area --}}
            <div class="upload-area @isset($project->image) has-image @endisset" id="upload-area">
                <input type="file" name="image" id="image" hidden
                    accept="image/jpeg,image/png,image/gif,image/webp">
                <div class="upload-placeholder" id="upload-placeholder">
                    <i class="bi bi-cloud-arrow-up"></i>
                    <p class="fw-medium mb-1">{{ __("Select File") }}</p>
                    <p class="small text-secondary mb-0">{{ __("or drag and drop") }}</p>
                </div>
                <div class="upload-preview" id="upload-preview"
                    @empty($project->image) style="display:none" @endempty>
                    <img src="{{ $project->image_url ?? '' }}" id="preview-img" alt="">
                </div>
            </div>
            @error('image')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror

            {{-- Image description --}}
            <div class="mt-3">
                <label for="image_description" class="form-label fw-medium">{{ __("Image Description") }}</label>
                <input type="text" name="image_description" id="image_description"
                    class="form-control @error('image_description') is-invalid @enderror"
                    value="{{ old('image_description', $project->image_description ?? '') }}"
                    placeholder="{{ __("Image description (alt text)") }}">
                @error('image_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Remove image --}}
            @isset($project->image)
                <div class="form-check mt-2">
                    <input type="checkbox" name="remove_image" id="remove_image" value="1"
                        class="form-check-input @error('remove_image') is-invalid @enderror">
                    <label class="form-check-label text-danger" for="remove_image">{{ __("Remove Image") }}</label>
                </div>
            @endisset
        </div>
    </div>

    <hr class="my-4">

    <div class="d-flex justify-content-end gap-2 align-items-center">
        <a href="{{ $cancelRoute ?? route('admin.projects.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-x-lg me-1"></i> {{ __("Cancel") }}
        </a>
        <button type="submit" class="btn btn-primary shadow-sm">
            <i class="bi {{ $submitIcon ?? 'bi-check-lg' }} me-1"></i> {{ $submitLabel ?? __("Save") }}
        </button>
    </div>
</form>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var select = document.getElementById('type_id');
    if (select) {
        function syncColor() {
            var opt = select.options[select.selectedIndex];
            select.style.color = opt ? opt.style.color : '';
        }
        syncColor();
        select.addEventListener('change', syncColor);
    }

    var uploadArea = document.getElementById('upload-area');
    var fileInput = document.getElementById('image');
    if (!uploadArea || !fileInput) return;

    uploadArea.addEventListener('click', function () {
        fileInput.click();
    });

    uploadArea.addEventListener('dragover', function (e) {
        e.preventDefault();
        uploadArea.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', function () {
        uploadArea.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', function (e) {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
        if (e.dataTransfer.files.length) {
            fileInput.files = e.dataTransfer.files;
            handleFile(e.dataTransfer.files[0]);
        }
    });

    fileInput.addEventListener('change', function () {
        if (this.files.length) {
            handleFile(this.files[0]);
        }
    });

    function handleFile(file) {
        if (!file.type.startsWith('image/')) return;
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('upload-placeholder').style.display = 'none';
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('upload-preview').style.display = 'block';
            uploadArea.classList.add('has-image');
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endpush
