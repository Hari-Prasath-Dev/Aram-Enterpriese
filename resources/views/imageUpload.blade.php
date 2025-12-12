@extends('layout.layout')

@php
    $title='KYC Upload';
    $subTitle = 'KYC & Banking Details';
    
    // Generates the JS for a specific upload field ID
    function getUploadJs($id) {
        return "
        const fileInput_$id = document.getElementById('upload-file-$id');
        const imagePreview_$id = document.getElementById('uploaded-img__preview-$id');
        const uploadedImgContainer_$id = document.getElementById('uploaded-img-$id');
        const removeButton_$id = document.getElementById('uploaded-img__remove-$id');

        if(fileInput_$id) {
            fileInput_$id.addEventListener('change', (e) => {
                if (e.target.files.length) {
                    const src = URL.createObjectURL(e.target.files[0]);
                    imagePreview_$id.src = src;
                    uploadedImgContainer_$id.classList.remove('hidden');
                }
            });
            removeButton_$id.addEventListener('click', () => {
                imagePreview_$id.src = '';
                uploadedImgContainer_$id.classList.add('hidden');
                fileInput_$id.value = '';
            });
        }";
    }
    
    $script = '<script>' . 
              getUploadJs('aadhar-front') . 
              getUploadJs('aadhar-back') . 
              getUploadJs('pan-card') . 
              getUploadJs('bank-statement') . 
              '
                // Modal Logic
                function openModal(imageSrc) {
                    const modal = document.getElementById("image-view-modal");
                    const modalImg = document.getElementById("modal-image-preview");
                    // Use placeholder if no source provided
                    modalImg.src = imageSrc || "assets/images/user.png"; 
                    modal.classList.remove("hidden");
                }

                function closeModal() {
                    const modal = document.getElementById("image-view-modal");
                    modal.classList.add("hidden");
                }
              ' .
              '</script>';
@endphp

@section('content')

    <form action="#" class="grid grid-cols-1 gap-6">
        
        <!-- Banking Details Card -->
        <div class="card h-full p-0 border-0 overflow-hidden">
            <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex justify-between items-center">
                <h6 class="text-lg font-semibold mb-0">Banking Details</h6>
                <a href="{{ route('customerCreation') }}" class="w-8 h-8 flex justify-center items-center bg-danger-50 text-danger-600 rounded-full hover:bg-danger-100 transition-colors">
                    <iconify-icon icon="radix-icons:cross-2" class="text-xl"></iconify-icon>
                </a>
            </div>
            <div class="card-body p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="bank-acc-no" class="form-label font-semibold text-neutral-900 dark:text-white">Bank Account Number</label>
                        <input type="text" class="form-control rounded-lg" id="bank-acc-no" placeholder="Enter Account Number">
                    </div>
                    <div>
                        <label for="ifsc-code" class="form-label font-semibold text-neutral-900 dark:text-white">IFSC Code</label>
                        <input type="text" class="form-control rounded-lg" id="ifsc-code" placeholder="Enter IFSC Code">
                    </div>
                    <div>
                        <label for="pan-desc-no" class="form-label font-semibold text-neutral-900 dark:text-white">PAN Number</label>
                        <input type="text" class="form-control rounded-lg" id="pan-desc-no" placeholder="Enter PAN Number">
                    </div>
                </div>
            </div>
        </div>

        <!-- Document Uploads Card -->
        <div class="card h-full p-0 border-0 overflow-hidden">
             <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6">
                <h6 class="text-lg font-semibold mb-0">Document Uploads</h6>
            </div>
            <div class="card-body p-6">
                <!-- Two Column Grid for KYC flow -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Row 1: Aadhar Front & Back -->
                    <!-- Aadhar Front -->
                    <div>
                        <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2 block">Aadhar Card Front</label>
                        <div class="upload-image-wrapper flex items-center gap-3">
                            <div id="uploaded-img-aadhar-front" class="uploaded-img hidden relative h-[120px] w-[120px] border input-form-light rounded-lg overflow-hidden border-dashed bg-neutral-50 dark:bg-neutral-600">
                                <button type="button" id="uploaded-img__remove-aadhar-front" class="uploaded-img__remove absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-2 flex">
                                    <iconify-icon icon="radix-icons:cross-2" class="text-xl text-danger-600"></iconify-icon>
                                </button>
                                <img id="uploaded-img__preview-aadhar-front" class="w-full h-full object-fit-cover" src="" alt="image">
                            </div>

                            <label class="upload-file h-[120px] w-[120px] border input-form-light rounded-lg overflow-hidden border-dashed bg-neutral-50 dark:bg-neutral-600 hover:bg-neutral-200 flex items-center flex-col justify-center gap-1" for="upload-file-aadhar-front">
                                <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                <span class="font-semibold text-secondary-light">Upload</span>
                                <input id="upload-file-aadhar-front" type="file" hidden>
                            </label>
                        </div>
                    </div>

                    <!-- Aadhar Back -->
                    <div>
                         <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2 block">Aadhar Card Back</label>
                        <div class="upload-image-wrapper flex items-center gap-3">
                            <div id="uploaded-img-aadhar-back" class="uploaded-img hidden relative h-[120px] w-[120px] border input-form-light rounded-lg overflow-hidden border-dashed bg-neutral-50 dark:bg-neutral-600">
                                <button type="button" id="uploaded-img__remove-aadhar-back" class="uploaded-img__remove absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-2 flex">
                                    <iconify-icon icon="radix-icons:cross-2" class="text-xl text-danger-600"></iconify-icon>
                                </button>
                                <img id="uploaded-img__preview-aadhar-back" class="w-full h-full object-fit-cover" src="" alt="image">
                            </div>

                            <label class="upload-file h-[120px] w-[120px] border input-form-light rounded-lg overflow-hidden border-dashed bg-neutral-50 dark:bg-neutral-600 hover:bg-neutral-200 flex items-center flex-col justify-center gap-1" for="upload-file-aadhar-back">
                                <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                <span class="font-semibold text-secondary-light">Upload</span>
                                <input id="upload-file-aadhar-back" type="file" hidden>
                            </label>
                        </div>
                    </div>

                    <!-- Row 2: PAN & Bank Statement -->
                    <!-- PAN Card -->
                    <div>
                         <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2 block">PAN Card</label>
                        <div class="upload-image-wrapper flex items-center gap-3">
                            <div id="uploaded-img-pan-card" class="uploaded-img hidden relative h-[120px] w-[120px] border input-form-light rounded-lg overflow-hidden border-dashed bg-neutral-50 dark:bg-neutral-600">
                                <button type="button" id="uploaded-img__remove-pan-card" class="uploaded-img__remove absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-2 flex">
                                    <iconify-icon icon="radix-icons:cross-2" class="text-xl text-danger-600"></iconify-icon>
                                </button>
                                <img id="uploaded-img__preview-pan-card" class="w-full h-full object-fit-cover" src="" alt="image">
                            </div>

                            <label class="upload-file h-[120px] w-[120px] border input-form-light rounded-lg overflow-hidden border-dashed bg-neutral-50 dark:bg-neutral-600 hover:bg-neutral-200 flex items-center flex-col justify-center gap-1" for="upload-file-pan-card">
                                <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                <span class="font-semibold text-secondary-light">Upload</span>
                                <input id="upload-file-pan-card" type="file" hidden>
                            </label>
                        </div>
                    </div>

                    <!-- Bank Statement -->
                    <div>
                         <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2 block">Bank Statement</label>
                        <div class="upload-image-wrapper flex items-center gap-3">
                            <div id="uploaded-img-bank-statement" class="uploaded-img hidden relative h-[120px] w-[120px] border input-form-light rounded-lg overflow-hidden border-dashed bg-neutral-50 dark:bg-neutral-600">
                                <button type="button" id="uploaded-img__remove-bank-statement" class="uploaded-img__remove absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-2 flex">
                                    <iconify-icon icon="radix-icons:cross-2" class="text-xl text-danger-600"></iconify-icon>
                                </button>
                                <img id="uploaded-img__preview-bank-statement" class="w-full h-full object-fit-cover" src="" alt="image">
                            </div>

                            <label class="upload-file h-[120px] w-[120px] border input-form-light rounded-lg overflow-hidden border-dashed bg-neutral-50 dark:bg-neutral-600 hover:bg-neutral-200 flex items-center flex-col justify-center gap-1" for="upload-file-bank-statement">
                                <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                <span class="font-semibold text-secondary-light">Upload</span>
                                <input id="upload-file-bank-statement" type="file" hidden>
                            </label>
                        </div>
                    </div>

                </div>

                 <!-- Submit Button -->
                 <div class="col-span-12 flex justify-end mt-6">
                    <button type="submit" class="btn btn-primary px-6 py-2.5 text-base">Submit Documents</button>
                </div>

            </div>
        </div>

    </form>


    <!-- Uploaded Details Table (Preview) -->
    <div class="card h-full p-0 border-0 overflow-hidden mt-6">
        <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6">
            <h6 class="text-lg font-semibold mb-0">Uploaded Documents Summary</h6>
        </div>
        <div class="card-body p-0">
             <div class="table-responsive">
                <table class="table hover-table w-full text-start whitespace-nowrap">
                    <thead>
                        <tr class="border-b border-neutral-200 dark:border-neutral-600">
                            <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Document Type</th>
                            <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Status</th>
                            <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         <tr class="border-b border-neutral-200 dark:border-neutral-600">
                            <td class="px-6 py-3">Aadhar Card Front</td>
                            <td class="px-6 py-3"><span class="badge bg-warning-100 text-warning-600">Pending</span></td>
                            <td class="px-6 py-3">
                                <a href="javascript:void(0)" onclick="openModal()" class="text-primary-600 hover:text-primary-700 text-lg">
                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                        <tr class="border-b border-neutral-200 dark:border-neutral-600">
                            <td class="px-6 py-3">Aadhar Card Back</td>
                            <td class="px-6 py-3"><span class="badge bg-warning-100 text-warning-600">Pending</span></td>
                            <td class="px-6 py-3">
                                <a href="javascript:void(0)" onclick="openModal()" class="text-primary-600 hover:text-primary-700 text-lg">
                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                         <tr class="border-b border-neutral-200 dark:border-neutral-600">
                            <td class="px-6 py-3">PAN Card</td>
                           <td class="px-6 py-3"><span class="badge bg-danger-100 text-danger-600">Not Uploaded</span></td>
                            <td class="px-6 py-3">
                                 <a href="javascript:void(0)" onclick="openModal()" class="text-primary-600 hover:text-primary-700 text-lg">
                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                         <tr>
                            <td class="px-6 py-3">Bank Statement</td>
                             <td class="px-6 py-3"><span class="badge bg-danger-100 text-danger-600">Not Uploaded</span></td>
                            <td class="px-6 py-3">
                                 <a href="javascript:void(0)" onclick="openModal()" class="text-primary-600 hover:text-primary-700 text-lg">
                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Image View Modal -->
    <div id="image-view-modal" class="fixed inset-0 z-50 hidden overflow-y-auto overflow-x-hidden flex justify-center items-center bg-transparent backdrop-blur-sm">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Document Preview
                    </h3>
                    <button type="button" onclick="closeModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 md:p-5 space-y-4 flex justify-center">
                   <img id="modal-image-preview" src="" alt="Document Preview" class="max-w-full h-auto rounded-lg" style="max-height: 500px;">
                </div>
            </div>
        </div>
    </div>

@endsection