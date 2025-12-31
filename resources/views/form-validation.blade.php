@extends('layout.layout')
@php
    $title='Edit Customer';
    $subTitle = 'Edit Customer Details';
    $script = '<script>
                        (() => {
                            "use strict"

                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            const forms = document.querySelectorAll(".needs-validation")

                            // Loop over them and prevent submission
                            Array.from(forms).forEach(form => {
                                form.addEventListener("submit", event => {
                                    if (!form.checkValidity()) {
                                        event.preventDefault()
                                        event.stopPropagation()
                                    }

                                    form.classList.add("was-validated")
                                }, false)
                            })
                        })()
            </script>';
@endphp

@section('content')

    <div class="grid grid-cols-12 gap-5">
        <div class="col-span-12">
            <div class="card border-0">
                <div class="card-header flex justify-between items-center">
                    <h5 class="text-lg font-semibold mb-0">Edit Customer</h5>
                    <a href="{{ route('customerCreation') }}" class="w-8 h-8 flex justify-center items-center bg-danger-50 text-danger-600 rounded-full hover:bg-danger-100 transition-colors">
                        <iconify-icon icon="radix-icons:cross-2" class="text-xl"></iconify-icon>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" class="grid grid-cols-12 gap-4" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="md:col-span-4 col-span-4">
                            <label class="form-label">Full Name</label>
                            <div class="icon-field has-validation">
                                <span class="icon">
                                    <iconify-icon icon="f7:person"></iconify-icon>
                                </span>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name', $user->name) }}" readonly>
                            </div>
                        </div>

                        <div class="md:col-span-4 col-span-4">
                            <label for="phone" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Phone Number <span class="text-danger-600">*</span></label>
                            <input type="tel" class="form-control rounded-lg" name="phone" id="phone" value="{{ old('phone', $user->mobile) }}" placeholder="Enter Phone Number" readonly>
                        </div>

                        <div class="md:col-span-4 col-span-4">
                            <label class="form-label">Email</label>
                            <div class="icon-field has-validation">
                                <span class="icon">
                                    <iconify-icon icon="mage:email"></iconify-icon>
                                </span>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email', $user->email) }}" required>
                            </div>
                        </div>

                        <div class="md:col-span-4 col-span-4">
                            <label class="form-label">Location</label>
                            <div class="icon-field has-validation">
                                <span class="icon">
                                    <iconify-icon icon="f7:map"></iconify-icon>
                                </span>
                                <input type="text" name="location" class="form-control" placeholder="Enter Location" value="{{ old('location', $user->location) }}" required>
                            </div>
                        </div>

                        <div class="md:col-span-4 col-span-4">
                            <label for="nominee_name" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Nominee Name <span class="text-danger-600">*</span></label>
                            <input type="text" class="form-control rounded-lg" name="nominee_name" id="nominee_name" value="{{ old('nominee_name', $user->nominee_name) }}" placeholder="Enter Nominee Name" required>
                        </div>

                        <div class="md:col-span-4 col-span-4">
                            <label for="nominee_number" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Nominee Number <span class="text-danger-600">*</span></label>
                            <input type="tel" class="form-control rounded-lg" name="nominee_number" id="nominee_number" placeholder="Enter Nominee Phone Number" value="{{ old('nominee_number', $user->nominee_number) }}" required>
                        </div>

                        @php
                            $pinValue = old('pin', (string) ($user->pin_number ?? ''));
                            $pin = str_pad($pinValue, 4, '0', STR_PAD_RIGHT);
                        @endphp


                        <div class="md:col-span-4 col-span-4">
                            <label class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                Pin Number <span class="text-danger-600">*</span>
                            </label>

                            <div class="flex gap-2">
                                <input type="text" maxlength="1" name="pin[]" value="{{ $pin[0] ?? '' }}"
                                    onkeyup="moveToNext(this, 'pin-2')" id="pin-1"
                                    class="w-12 h-12 text-center text-xl border rounded-lg">

                                <input type="text" maxlength="1" name="pin[]" value="{{ $pin[1] ?? '' }}"
                                    onkeyup="moveToNext(this, 'pin-3')" id="pin-2"
                                    class="w-12 h-12 text-center text-xl border rounded-lg">

                                <input type="text" maxlength="1" name="pin[]" value="{{ $pin[2] ?? '' }}"
                                    onkeyup="moveToNext(this, 'pin-4')" id="pin-3"
                                    class="w-12 h-12 text-center text-xl border rounded-lg">

                                <input type="text" maxlength="1" name="pin[]" value="{{ $pin[3] ?? '' }}"
                                    id="pin-4"
                                    class="w-12 h-12 text-center text-xl border rounded-lg">
                            </div>
                        </div>

                        <div class="md:col-span-4 col-span-4">
                            <label for="chit_group" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Chit Group <span class="text-danger-600">*</span></label>
                            <select class="form-control rounded-lg form-select" name="chit_group" id="chit_group">
                                <option value="">--- Select Chit Group ---</option>
                               @foreach($chits as $chit)
                                    <option value="{{ $chit->id }}"
                                        {{ old('chit_id', $user->chit_id) == $chit->id ? 'selected' : '' }}>
                                        {{ $chit->chit_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                       
                        <div class="col-span-12">
                            <button class="btn btn-primary-600" type="submit">Update Customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
