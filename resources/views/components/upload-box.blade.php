<div class="upload-image-wrapper flex items-center gap-3">
    <div id="uploaded-img-{{ $id }}" class="uploaded-img hidden relative h-[120px] w-[120px] border input-form-light rounded-lg overflow-hidden border-dashed bg-neutral-50 dark:bg-neutral-600">
        <button type="button" id="uploaded-img__remove-{{ $id }}" class="uploaded-img__remove absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-2 flex">
            <iconify-icon icon="radix-icons:cross-2" class="text-xl text-danger-600"></iconify-icon>
        </button>
        <img id="uploaded-img__preview-{{ $id }}" class="w-full h-full object-fit-cover" src="" alt="image">
    </div>

    <label class="upload-file h-[120px] w-[120px] border input-form-light rounded-lg overflow-hidden border-dashed bg-neutral-50 dark:bg-neutral-600 hover:bg-neutral-200 flex items-center flex-col justify-center gap-1" for="upload-file-{{ $id }}" style="
    width: 100%;
">
        <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
        <span class="font-semibold text-secondary-light">Upload</span>
        <input id="upload-file-{{ $id }}" type="file" hidden>
    </label>
</div>
