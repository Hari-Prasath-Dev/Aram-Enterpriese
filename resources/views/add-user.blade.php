@extends('layout.layout')
@php
    $title='Create Customer';
    $subTitle = 'Create Customer';
    $script = '<script>
                    // ================== Image Upload Js Start ===========================
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("#imagePreview").css("background-image", "url(" + e.target.result + ")");
                                $("#imagePreview").hide();
                                $("#imagePreview").fadeIn(650);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    $("#imageUpload").change(function() {
                        readURL(this);
                    });
                    
                    // Auto-focus next input logic for Pin
                    function moveToNext(element, nextId) {
                        if (element.value.length >= 1) {
                            if(nextId) {
                               document.getElementById(nextId).focus();
                            }
                        }
                    }
                    // ================== Image Upload Js End ===========================
             </script>';
@endphp

@section('content')

    <div class="card h-full p-0 rounded-xl border-0 overflow-hidden">
        <div class="card-body p-6">
             <div class="flex justify-between items-center mb-6">
                 <h6 class="card-title mb-0 text-lg font-semibold text-neutral-900 dark:text-white">Create Customer</h6>
                <div></div> <!-- Spacer -->
                <a href="{{ route('customerCreation') }}" class="w-8 h-8 flex justify-center items-center bg-danger-50 text-danger-600 rounded-full hover:bg-danger-100 transition-colors">
                    <iconify-icon icon="radix-icons:cross-2" class="text-xl"></iconify-icon>
                </a>
            </div>
            <div class="grid grid-cols-1">
                <div class="col-span-12">
                    <div class="card border border-neutral-200 dark:border-neutral-600">
                        <div class="card-body">

                            <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                    <div class="mb-5">
                                        <label for="name" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Full Name <span class="text-danger-600">*</span></label>
                                        <input type="text" class="form-control rounded-lg" name="name" id="name" placeholder="Enter Full Name" required>
                                    </div>
                                    <div class="mb-5">
                                        <label for="phone" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Phone Number <span class="text-danger-600">*</span></label>
                                        <input type="tel" class="form-control rounded-lg" name="phone" id="phone" placeholder="Enter Phone Number" required>
                                    </div>
                                    <div class="mb-5">
                                        <label for="email" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Email</label>
                                        <input type="email" class="form-control rounded-lg" name="email" id="email" placeholder="Enter Email Address">
                                    </div>
                                    <div class="mb-5">
                                        <label for="location" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Location</label>
                                        <input type="text" class="form-control rounded-lg" name="location" id="location" placeholder="Enter Location">
                                    </div>
                                    <div class="mb-5">
                                        <label for="nominee_name" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Nominee Name <span class="text-danger-600">*</span></label>
                                        <input type="text" class="form-control rounded-lg" name="nominee_name" id="nominee_name" placeholder="Enter Nominee Name" required>
                                    </div>
                                    <div class="mb-5">
                                        <label for="nominee_number" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Nominee Number <span class="text-danger-600">*</span></label>
                                        <input type="tel" class="form-control rounded-lg" name="nominee_number" id="nominee_number" placeholder="Enter Nominee Phone Number" required>
                                    </div>
                                    <div class="mb-5">
                                        <label class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Pin Number <span class="text-danger-600">*</span></label>
                                        <div class="flex gap-2">
                                            <input type="text" maxlength="1" name="pin-1" id="pin-1" onkeyup="moveToNext(this, 'pin-2')" class="w-12 h-12 text-center text-xl border border-neutral-300 rounded-lg bg-white focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white">
                                            <input type="text" maxlength="1" name="pin-2" id="pin-2" onkeyup="moveToNext(this, 'pin-3')" class="w-12 h-12 text-center text-xl border border-neutral-300 rounded-lg bg-white focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white">
                                            <input type="text" maxlength="1" name="pin-3" id="pin-3" onkeyup="moveToNext(this, 'pin-4')" class="w-12 h-12 text-center text-xl border border-neutral-300 rounded-lg bg-white focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white">
                                            <input type="text" maxlength="1" name="pin-4" id="pin-4" class="w-12 h-12 text-center text-xl border border-neutral-300 rounded-lg bg-white focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white">
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <label for="chit_group" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Chit Group <span class="text-danger-600">*</span></label>
                                        <select class="form-control rounded-lg form-select" name="chit_group" id="chit_group">
                                            <option value="">--- Select Chit Group ---</option>
                                            @foreach($chits as $chit)
                                                <option value="{{ $chit->id }}">
                                                    {{ $chit->chit_name }} {{-- or $chit->chit_name --}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center gap-3 mt-6">
                                    <a href="{{ route('customerCreation') }}" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-base px-14 py-[11px] rounded-lg transition-colors hover:bg-danger-50">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary border border-primary-600 text-base px-14 py-3 rounded-lg">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection