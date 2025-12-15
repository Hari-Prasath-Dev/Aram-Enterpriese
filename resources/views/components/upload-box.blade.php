@php
    $filePath = $value ?? null;
@endphp

    <div class="upload-image-wrapper flex items-center gap-3">

        <!-- Preview Box -->
        <div id="uploaded-img-{{ $id }}"
        class="uploaded-img {{ $filePath ? '' : 'hidden' }} relative h-[120px] w-[120px] border rounded-lg overflow-hidden bg-neutral-50">

        <button type="button"
                class="uploaded-img__remove absolute top-0 end-0 mt-1 me-1 bg-white rounded"
                onclick="removeImage('{{ $id }}')">
            ❌
        </button>

        @if($filePath)
            <a href="{{ asset($filePath) }}" target="_blank" class="block">
                <img src="{{ asset($filePath) }}"
                    id="uploaded-img__preview-{{ $id }}"
                    class="w-full h-full object-cover cursor-pointer">
            </a>
        @else
            <img id="uploaded-img__preview-{{ $id }}"
                class="w-full h-full object-cover">
        @endif

    </div>

    <!-- Upload Button -->
    <label for="upload-file-{{ $id }}"
           class="upload-file h-[120px] w-full border rounded-lg flex flex-col items-center justify-center cursor-pointer">
        📷
        <span>Upload</span>
        <input id="upload-file-{{ $id }}"
               type="file"
               name="{{ $name ?? $id }}"
               hidden
               onchange="previewImage(this, '{{ $id }}')">
    </label>

    <!-- Hidden remove input -->
    <input type="hidden" name="remove_{{ $id }}" id="remove-{{ $id }}" value="0">
</div>
