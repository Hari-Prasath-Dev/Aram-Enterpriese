@extends('layout.layout')
@php
    $title='Payment View';
    $subTitle = 'Payment Details';
@endphp

@section('content')
    <div class="grid grid-cols-12 gap-6">
        <!-- Payment Details Card -->
        <div class="col-span-12">
            <div class="card border-0 overflow-hidden">
                <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center justify-between">
                    <h6 class="card-title mb-0 text-lg font-semibold text-neutral-900 dark:text-white">Payment Details</h6>
                    <a href="{{ route('paymentCollection') }}" class="text-neutral-500 hover:text-neutral-700 dark:text-neutral-400 dark:hover:text-white">
                        <iconify-icon icon="mingcute:close-line" class="text-2xl"></iconify-icon>
                    </a>
                </div>
                <div class="card-body px-6 py-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Group Name</p>
                            <h6 class="text-base font-semibold text-neutral-900 dark:text-white">Gold Scheme A</h6>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Customer Name</p>
                            <h6 class="text-base font-semibold text-neutral-900 dark:text-white">John Doe</h6>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Phone Number</p>
                            <h6 class="text-base font-semibold text-neutral-900 dark:text-white">9876543210</h6>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Group Status</p>
                            <span class="badge bg-success-100 text-success-600 rounded-full px-3 py-1">Active</span>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Payment Status</p>
                            <span class="badge bg-warning-100 text-warning-600 rounded-full px-3 py-1">Partially Paid</span>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Total Payment</p>
                            <h6 class="text-base font-semibold text-neutral-900 dark:text-white">₹5,000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Partial Payment History Table -->
        <div class="col-span-12 lg:col-span-8">
            <div class="card border-0 overflow-hidden h-full">
                <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6">
                    <h6 class="card-title mb-0 text-lg font-semibold text-neutral-900 dark:text-white">Partial Payment History</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table hover-table w-full text-start whitespace-nowrap">
                            <thead>
                                <tr class="border-b border-neutral-200 dark:border-neutral-600 bg-neutral-50 dark:bg-neutral-800">
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">S.No</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Date</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Paid Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-neutral-200 dark:border-neutral-600">
                                    <td class="px-6 py-3">01</td>
                                    <td class="px-6 py-3">01 Dec 2025</td>
                                    <td class="px-6 py-3">₹500</td>
                                </tr>
                                <tr class="border-b border-neutral-200 dark:border-neutral-600">
                                    <td class="px-6 py-3">02</td>
                                    <td class="px-6 py-3">15 Dec 2025</td>
                                    <td class="px-6 py-3">₹1500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Outstanding Amount Card -->
        <div class="col-span-12 lg:col-span-4">
            <div class="card border-0 overflow-hidden h-full bg-danger-50 dark:bg-danger-900/20 border-danger-200 dark:border-danger-800">
                <div class="card-body p-6 flex flex-col justify-center items-center text-center h-full">
                    <div class="w-16 h-16 rounded-full bg-danger-100 text-danger-600 flex items-center justify-center text-3xl mb-4">
                        <iconify-icon icon="mdi:cash-remove"></iconify-icon>
                    </div>
                    <h5 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">Outstanding Amount</h5>
                    <h3 class="text-3xl font-bold text-danger-600 dark:text-danger-500">₹3,000</h3>
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 mt-2">Total Due Balance</p>
                </div>
            </div>
        </div>
    </div>
@endsection
