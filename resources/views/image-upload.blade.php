@extends('layout.layout')

@php
    $title='Proof Uploads';
    $subTitle = 'Banking, Documents & Other Proofs';
    
    // Generates the JS for a specific upload field ID
    if (!function_exists('getUploadJs')) {
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
    }
    
    // Define script for all uploads
    $script = '<script>' . 
              getUploadJs('bank_statement') . 
              getUploadJs('check-leaf') . 
              getUploadJs('aadhar_front') . 
              getUploadJs('aadhar_back') . 
              getUploadJs('pan_card') . 
              getUploadJs('cibil_score') . 
              getUploadJs('other_proof') . 
              '</script>';
@endphp

@section('content')

    <form action="{{ route('users.bank-details.store', $id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-6">
        @csrf
                <div class="card h-full p-0 border-0 overflow-hidden">
                    <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex justify-between items-center">
                        <h6 class="text-lg font-semibold mb-0">Proof Details</h6>
                        <a href="{{ route('customerCreation') }}" class="w-8 h-8 flex justify-center items-center bg-danger-50 text-danger-600 rounded-full hover:bg-danger-100 transition-colors">
                            <iconify-icon icon="radix-icons:cross-2" class="text-xl"></iconify-icon>
                        </a>
                    </div>
                    <div class="card-body p-6">
                        
                    <h6 class="text-base text-neutral-600 dark:text-neutral-200 mb-4 border-b pb-2">Banking Details</h6>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                            <!-- 🌟 COLUMN 1 -->
                            <div class="space-y-5">
                                <div>
                                    <label class="form-label font-semibold text-neutral-900 dark:text-white">Bank Name</label>
                                    <input type="text" name="bank_name" value="{{$bankDetail->bank_name ?? null}}" class="form-control rounded-lg" placeholder="Enter Bank Name">
                                </div>

                                <div>
                                    <label class="form-label font-semibold text-neutral-900 dark:text-white">Account Name</label>
                                    <input type="text" name="account_name" value="{{$bankDetail->account_name ?? null}}" class="form-control rounded-lg" placeholder="Enter Account Name">
                                </div>
                            </div>

                            <!-- 🌟 COLUMN 2 -->
                            <div class="space-y-5">
                                <div>
                                    <label class="form-label font-semibold text-neutral-900 dark:text-white">IFSC Code</label>
                                    <input type="text" name="ifsc_code" value="{{$bankDetail->ifsc_code ?? null}}" class="form-control rounded-lg" placeholder="Enter IFSC Code">
                                </div>

                                <div>
                                    <label class="form-label font-semibold text-neutral-900 dark:text-white">Branch</label>
                                    <input type="text" name="branch" name="ifsc_code" value="{{$bankDetail->branch ?? null}}" class="form-control rounded-lg" placeholder="Enter Branch">
                                </div>
                            </div>

                                    <!-- 🌟 COLUMN 3 -->
                            <div class="space-y-5">
                                <div class="text-center">
                                    <label class="form-label font-semibold text-neutral-900 block mb-2">
                                        Statement Upload or Check Leaf Upload
                                    </label>

                                        <div class="w-[220px]">
                                            @include('components.upload-box', [
                                                'id' => 'bank_statement',
                                                'name' => 'bank_statement',
                                                'value' => $bankDetail->bank_statement ?? null
                                            ])
                                        </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- 2. Document Uploads -->
                <h6 class="text-base text-neutral-600 dark:text-neutral-200 mb-4 border-b pb-2">Document Uploads</h6>
                 <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                    <div>
                        <label class="form-label font-semibold text-neutral-900 dark:text-white">Aadhar Number</label>
                        <input type="text" class="form-control rounded-lg" name="aadhar_number" value="{{$bankDetail->aadhar_number ?? null}}" placeholder="Enter Aadhar Number">
                    </div>
                     <div>
                        <label class="form-label font-semibold text-neutral-900 dark:text-white">PAN Number</label>
                        <input type="text" class="form-control rounded-lg" name="pan_number" value="{{$bankDetail->pan_number ?? null}}" placeholder="Enter PAN Number">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
                     <div>
                         <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2 block">Aadhar Front Upload</label>
                         @include('components.upload-box', ['id' => 'aadhar_front','name' =>'aadhar_front','value' => $bankDetail->aadhar_front ?? null])
                    </div>
                     <div>
                         <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2 block">Aadhar Back Upload</label>
                         @include('components.upload-box', ['id' => 'aadhar_back','name' =>'aadhar_back','value' => $bankDetail->aadhar_back ?? null])
                    </div>
                     <div>
                         <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2 block">PAN Upload</label>
                         @include('components.upload-box', ['id' => 'pan_card','name' =>'pan_card','value' => $bankDetail->pan_card ?? null])
                    </div>
                </div>

                <!-- 3. Cibil Score & Other -->
                <h6 class="text-base text-neutral-600 dark:text-neutral-200 mb-4 border-b pb-2">Cibil Score & Other Proof</h6>
                 <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                     <div>
                         <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2 block">Cibil Score Upload</label>
                         @include('components.upload-box', ['id' => 'cibil_score','name' =>'cibil_score','value' => $bankDetail->cibil_score ?? null])
                    </div>
                     <div>
                         <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2 block">Other Proof Upload</label>
                         @include('components.upload-box', ['id' => 'other_proof','name' =>'other_proof','value' => $bankDetail->other_proof ?? null])
                    </div>
                </div>
                
                <div class="flex items-center justify-center gap-3 mt-6">
                    <a href="{{ route('customerCreation') }}" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-base px-14 py-[11px] rounded-lg transition-colors hover:bg-danger-50">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary border border-primary-600 text-base px-14 py-3 rounded-lg">
                        Save Proofs
                    </button>
                </div>

            </div>
        </div>
    </form>
    
@endsection

<script>
    document.addEventListener('change', function (e) {
        if (e.target.type === 'file') {
            const input = e.target;
            const id = input.id.replace('upload-file-', '');

            const previewWrapper = document.getElementById(`uploaded-img-${id}`);
            const previewImg = document.getElementById(`uploaded-img__preview-${id}`);
            const uploadLabel = input.closest('label');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    previewWrapper.classList.remove('hidden');
                    uploadLabel.classList.add('hidden');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    });

    // Remove image
    document.addEventListener('click', function (e) {
        if (e.target.closest('.uploaded-img__remove')) {
            const btn = e.target.closest('.uploaded-img__remove');
            const id = btn.id.replace('uploaded-img__remove-', '');

            document.getElementById(`uploaded-img-${id}`).classList.add('hidden');
            document.getElementById(`uploaded-img__preview-${id}`).src = '';
            document.getElementById(`upload-file-${id}`).value = '';
            document.querySelector(`label[for="upload-file-${id}"]`).classList.remove('hidden');
        }
    });
</script>

<script>
    function removeImage(id) {
        // Hide preview box
        document.getElementById('uploaded-img-' + id).classList.add('hidden');

        // Clear preview image
        document.getElementById('uploaded-img__preview-' + id).src = '';

        // Reset file input
        document.getElementById('upload-file-' + id).value = '';

        // Show upload button again ✅
        document.querySelector(`label[for="upload-file-${id}"]`).classList.remove('hidden');

        // Mark remove flag (for backend)
        document.getElementById('remove-' + id).value = 1;
    }
</script>

<script>
    function previewImage(input, id) {
        const previewBox = document.getElementById('uploaded-img-' + id);
        const previewImg = document.getElementById('uploaded-img__preview-' + id);
        const uploadLabel = document.querySelector(`label[for="upload-file-${id}"]`);

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                previewImg.src = e.target.result;
                previewBox.classList.remove('hidden');
                uploadLabel.classList.add('hidden'); // hide upload button
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


