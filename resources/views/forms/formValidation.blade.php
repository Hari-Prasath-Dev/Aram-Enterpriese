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
                    <form class="grid grid-cols-12 gap-4">
                        <div class="md:col-span-6 col-span-12">
                            <label class="form-label">Full Name</label>
                            <div class="icon-field has-validation">
                                <span class="icon">
                                    <iconify-icon icon="f7:person"></iconify-icon>
                                </span>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ request('name') }}" required>
                            </div>
                        </div>
                        <div class="md:col-span-6 col-span-12">
                            <label class="form-label">Location</label>
                            <div class="icon-field has-validation">
                                <span class="icon">
                                    <iconify-icon icon="f7:map"></iconify-icon>
                                </span>
                                <input type="text" name="location" class="form-control" placeholder="Enter Location" value="{{ request('location') }}" required>
                            </div>
                        </div>
                        <div class="md:col-span-6 col-span-12">
                            <label class="form-label">Email</label>
                            <div class="icon-field has-validation">
                                <span class="icon">
                                    <iconify-icon icon="mage:email"></iconify-icon>
                                </span>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ request('email') }}" required>
                            </div>
                        </div>
                        <div class="md:col-span-6 col-span-12">
                            <label class="form-label">Phone</label>
                            <div class="icon-field has-validation">
                                <span class="icon">
                                    <iconify-icon icon="solar:phone-calling-linear"></iconify-icon>
                                </span>
                                <input type="text" name="phone" class="form-control" placeholder="+1 (555) 000-0000" value="{{ request('phone') }}" required>
                            </div>
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
