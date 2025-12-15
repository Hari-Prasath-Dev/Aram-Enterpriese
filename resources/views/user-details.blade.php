@extends('layout.layout')

@php
    $title='View Customer';
    $subTitle = 'Customer Details';
@endphp

@section('content')

<div class="space-y-6">
    <!-- Header / Back Button -->
    <div class="flex justify-between items-center">
        <h6 class="text-xl font-bold text-neutral-900 dark:text-white">Customer Profile</h6>
        <a href="{{ route('customerCreation') }}" class="flex items-center gap-2 bg-primary-600 hover:bg-primary-700 text-white px-5 py-2.5 rounded-lg transition-colors font-medium">
            <iconify-icon icon="solar:arrow-left-outline" class="text-xl"></iconify-icon>
            Back to List
        </a>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6">
        
        <!-- Left Column: Profile Card -->
        <div class="xl:col-span-4">
            <div class="card h-full border-0 shadow-lg rounded-2xl overflow-hidden relative">
                <!-- Background Pattern -->
                <div class="absolute top-0 w-full h-32 bg-gradient-to-r from-[#ffe8cc] to-[#ff8c3b]"></div>
                
                <div class="card-body p-6 relative z-10  text-center">
                    <div class="inline-block relative">
                         <img src="{{ asset('assets/images/user.png') }}" class="w-32 h-32 rounded-full object-cover border-4 border-white dark:border-neutral-700 shadow-md mb-3" alt="Profile">
                    </div>
                    
                    <h3 class="text-xl font-bold text-neutral-900 dark:text-white mb-1">Darlene Robertson</h3>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-4">Customer ID: #CUST-001</p>
                    
                    <div class="flex justify-center gap-2 mb-6">
                        <span class="bg-orange-50 text-[#ff8c3b] border border-[#ff8c3b] px-3 py-1 rounded-full text-xs font-semibold">Chit Group A</span>
                        <span class="bg-green-50 text-green-600 border border-green-200 px-3 py-1 rounded-full text-xs font-semibold">Active</span>
                    </div>

                    <div class="border-t border-neutral-200 dark:border-neutral-600 pt-6 text-start space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-neutral-100 dark:bg-neutral-600 flex justify-center items-center text-[#ff8c3b]">
                                <iconify-icon icon="solar:phone-calling-bold-duotone" class="text-xl"></iconify-icon>
                            </div>
                            <div>
                                <p class="text-xs text-neutral-500 mb-0">Phone</p>
                                <p class="text-sm font-semibold text-neutral-900 dark:text-white">(252) 555-0126</p>
                            </div>
                        </div>
                         <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-neutral-100 dark:bg-neutral-600 flex justify-center items-center text-[#ff8c3b]">
                                <iconify-icon icon="solar:letter-bold-duotone" class="text-xl"></iconify-icon>
                            </div>
                            <div>
                                <p class="text-xs text-neutral-500 mb-0">Email</p>
                                <p class="text-sm font-semibold text-neutral-900 dark:text-white">darlene@example.com</p>
                            </div>
                        </div>
                         <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-neutral-100 dark:bg-neutral-600 flex justify-center items-center text-[#ff8c3b]">
                                <iconify-icon icon="solar:map-point-bold-duotone" class="text-xl"></iconify-icon>
                            </div>
                            <div>
                                <p class="text-xs text-neutral-500 mb-0">Location</p>
                                <p class="text-sm font-semibold text-neutral-900 dark:text-white">Bangalore, India</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Details & Proofs -->
        <div class="xl:col-span-8 flex flex-col gap-8">
            
            <!-- Nominee & Personal Extended -->
            <div class="card border-0 shadow-sm rounded-2xl">
                <div class="card-header bg-transparent border-b border-neutral-200 dark:border-neutral-600 py-4 px-6">
                    <h6 class="text-lg font-semibold mb-0 flex items-center gap-2">
                        <iconify-icon icon="solar:users-group-two-rounded-bold-duotone" class="text-[#ff8c3b] text-xl"></iconify-icon>
                        Nominee Details
                    </h6>
                </div>
                <div class="card-body p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="p-4 rounded-xl bg-neutral-50 dark:bg-neutral-700/50 border border-neutral-100 dark:border-neutral-600">
                             <p class="text-xs text-neutral-500 mb-1">Nominee Name</p>
                             <h6 class="text-base font-semibold text-neutral-900 dark:text-white mb-0">Esther Howard</h6>
                        </div>
                         <div class="p-4 rounded-xl bg-neutral-50 dark:bg-neutral-700/50 border border-neutral-100 dark:border-neutral-600">
                             <p class="text-xs text-neutral-500 mb-1">Nominee Phone</p>
                             <h6 class="text-base font-semibold text-neutral-900 dark:text-white mb-0">(303) 555-0105</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banking Details -->
             <div class="card border-0 shadow-sm rounded-2xl">
                <div class="card-header bg-transparent border-b border-neutral-200 dark:border-neutral-600 py-4 px-6">
                    <h6 class="text-lg font-semibold mb-0 flex items-center gap-2">
                        <iconify-icon icon="solar:card-bold-duotone" class="text-[#ff8c3b] text-xl"></iconify-icon>
                        Banking Information
                    </h6>
                </div>
                <div class="card-body p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-8">
                        <div>
                            <p class="text-sm text-neutral-500 mb-1">Bank Name</p>
                            <p class="text-base font-medium text-neutral-900 dark:text-white">HDFC Bank</p>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 mb-1">Account Holder</p>
                            <p class="text-base font-medium text-neutral-900 dark:text-white">Darlene Robertson</p>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 mb-1">IFSC Code</p>
                            <p class="text-base font-medium text-neutral-900 dark:text-white font-mono">HDFC0001234</p>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 mb-1">Branch</p>
                            <p class="text-base font-medium text-neutral-900 dark:text-white">Koramangala, Bangalore</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Documents -->
            <div class="card border-0 shadow-sm rounded-2xl">
                 <div class="card-header bg-transparent border-b border-neutral-200 dark:border-neutral-600 py-4 px-6">
                    <h6 class="text-lg font-semibold mb-0 flex items-center gap-2">
                        <iconify-icon icon="solar:folder-with-files-bold-duotone" class="text-[#ff8c3b] text-xl"></iconify-icon>
                        Documents & Proofs
                    </h6>
                </div>
                <div class="card-body p-6">
                    <div class="flex gap-4 overflow-x-auto pb-2">
                        <!-- Card 1 -->
                        <div class="min-w-[120px] p-3 border border-neutral-200 rounded-xl text-center hover:border-[#ff8c3b] transition-colors cursor-pointer group bg-neutral-50 dark:bg-neutral-700/30">
                            <div class="w-10 h-10 mx-auto bg-white dark:bg-neutral-600 rounded-full flex items-center justify-center shadow-sm mb-3 group-hover:scale-110 transition-transform text-[#ff8c3b]">
                                <iconify-icon icon="solar:file-check-bold-duotone" class="text-xl"></iconify-icon>
                            </div>
                            <p class="text-xs font-semibold text-neutral-900 dark:text-white mb-1">Aadhar Front</p>
                            <span class="text-[10px] text-success-600 bg-success-50 px-2 py-0.5 rounded-full">Verified</span>
                        </div>

                         <!-- Card 2 -->
                        <div class="min-w-[120px] p-3 border border-neutral-200 rounded-xl text-center hover:border-[#ff8c3b] transition-colors cursor-pointer group bg-neutral-50 dark:bg-neutral-700/30">
                            <div class="w-10 h-10 mx-auto bg-white dark:bg-neutral-600 rounded-full flex items-center justify-center shadow-sm mb-3 group-hover:scale-110 transition-transform text-[#ff8c3b]">
                                <iconify-icon icon="solar:file-check-bold-duotone" class="text-xl"></iconify-icon>
                            </div>
                            <p class="text-xs font-semibold text-neutral-900 dark:text-white mb-1">Aadhar Back</p>
                            <span class="text-[10px] text-success-600 bg-success-50 px-2 py-0.5 rounded-full">Verified</span>
                        </div>

                         <!-- Card 3 -->
                        <div class="min-w-[120px] p-3 border border-neutral-200 rounded-xl text-center hover:border-[#ff8c3b] transition-colors cursor-pointer group bg-neutral-50 dark:bg-neutral-700/30">
                            <div class="w-10 h-10 mx-auto bg-white dark:bg-neutral-600 rounded-full flex items-center justify-center shadow-sm mb-3 group-hover:scale-110 transition-transform text-[#ff8c3b]">
                                <iconify-icon icon="solar:card-reciept-bold-duotone" class="text-xl"></iconify-icon>
                            </div>
                            <p class="text-xs font-semibold text-neutral-900 dark:text-white mb-1">PAN Card</p>
                            <span class="text-[10px] text-neutral-500 bg-neutral-100 px-2 py-0.5 rounded-full">Review</span>
                        </div>

                         <!-- Card 4 -->
                        <div class="min-w-[120px] p-3 border border-neutral-200 rounded-xl text-center hover:border-[#ff8c3b] transition-colors cursor-pointer group bg-neutral-50 dark:bg-neutral-700/30">
                            <div class="w-10 h-10 mx-auto bg-white dark:bg-neutral-600 rounded-full flex items-center justify-center shadow-sm mb-3 group-hover:scale-110 transition-transform text-[#ff8c3b]">
                                <iconify-icon icon="solar:bill-list-bold-duotone" class="text-xl"></iconify-icon>
                            </div>
                            <p class="text-xs font-semibold text-neutral-900 dark:text-white mb-1">Bank Statement</p>
                             <span class="text-[10px] text-success-600 bg-success-50 px-2 py-0.5 rounded-full">Verified</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
    
@endsection
