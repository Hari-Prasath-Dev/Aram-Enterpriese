@extends('layout.layout')
@php
    $title='Chit Creation';
    $subTitle = 'Manage Chits';
    $script = '<script src="' . asset('assets/js/data-table.js') . '"></script>';
@endphp

@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="card border-0 overflow-hidden">
                <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center justify-between">
                    <h6 class="card-title mb-0 text-lg font-semibold text-neutral-900 dark:text-white">Chit List</h6>
                    <a href="{{ route('createChit') }}" class="btn btn-primary text-sm btn-sm px-3 py-2 flex items-center gap-1">
                        <iconify-icon icon="heroicons:plus" class="text-lg"></iconify-icon> Create Chit
                    </a>
                </div>
                
                <!-- Filter Section -->
            <!-- Filter Section -->
<div class="card-body border-b border-neutral-200 dark:border-neutral-600 px-6 py-4">

    <div class="w-full flex items-center gap-6 bg-white dark:bg-neutral-700 border border-neutral-300 dark:border-neutral-600 rounded-xl px-4 py-3">

        <!-- Filter Icon -->
        <div class="text-neutral-700 dark:text-white text-xl">
            <iconify-icon icon="mdi:filter-outline"></iconify-icon>
        </div>

        <!-- Filter By (text only, not input) -->
        <div class="flex items-center text-neutral-800 dark:text-white font-medium">
            Filter By
        </div>

        <!-- Date Filter -->
        <div class="flex items-center gap-2 border-l border-neutral-300 dark:border-neutral-600 pl-6">
            <span class="text-neutral-800 dark:text-white">Date</span>
            <iconify-icon icon="mdi:chevron-down" class="text-neutral-500"></iconify-icon>
        </div>

        <!-- Chit Type -->
        <div class="flex items-center gap-2 border-l border-neutral-300 dark:border-neutral-600 pl-6">
            <span class="text-neutral-800 dark:text-white">Chit Type</span>
            <iconify-icon icon="mdi:chevron-down" class="text-neutral-500"></iconify-icon>
        </div>

        <!-- Chit Status -->
        <div class="flex items-center gap-2 border-l border-neutral-300 dark:border-neutral-600 pl-6">
            <span class="text-neutral-800 dark:text-white">Chit Status</span>
            <iconify-icon icon="mdi:chevron-down" class="text-neutral-500"></iconify-icon>
        </div>

        <!-- Reset Filter -->
        <button type="button" class="ml-auto flex items-center gap-1 text-red-500 font-medium hover:text-red-600">
            <iconify-icon icon="mdi:refresh"></iconify-icon>
            Reset Filter
        </button>

    </div>

</div>


                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table hover-table w-full text-start whitespace-nowrap">
                            <thead>
                                <tr class="border-b border-neutral-200 dark:border-neutral-600 bg-neutral-50 dark:bg-neutral-800">
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">S.No</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Chit Name</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Chit Value</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Date</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Type</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Status</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-neutral-200 dark:border-neutral-600">
                                    <td class="px-6 py-3">01</td>
                                    <td class="px-6 py-3"><span class="text-neutral-900 dark:text-white font-medium">Gold Scheme A</span></td>
                                    <td class="px-6 py-3">$5,000</td>
                                    <td class="px-6 py-3">12 Jan 2025</td>
                                    <td class="px-6 py-3">Fixed</td>
                                    <td class="px-6 py-3"><span class="badge bg-success-100 text-success-600 rounded-full px-3 py-1">Active</span></td>
                                    <td class="px-6 py-3">
                                         <div class="flex items-center gap-2">
                                            <a href="javascript:void(0)" class="w-8 h-8 bg-primary-50 dark:bg-primary-600/10 text-primary-600 dark:text-primary-400 rounded-full inline-flex items-center justify-center">
                                                <iconify-icon icon="lucide:edit"></iconify-icon>
                                            </a>
                                            <a href="javascript:void(0)" class="w-8 h-8 bg-danger-100 dark:bg-danger-600/25 text-danger-600 dark:text-danger-400 rounded-full inline-flex items-center justify-center">
                                                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                 <tr class="border-b border-neutral-200 dark:border-neutral-600">
                                    <td class="px-6 py-3">02</td>
                                    <td class="px-6 py-3"><span class="text-neutral-900 dark:text-white font-medium">Silver Pot B</span></td>
                                    <td class="px-6 py-3">$2,000</td>
                                    <td class="px-6 py-3">15 Feb 2025</td>
                                    <td class="px-6 py-3">Auction</td>
                                    <td class="px-6 py-3"><span class="badge bg-warning-100 text-warning-600 rounded-full px-3 py-1">Pending</span></td>
                                    <td class="px-6 py-3">
                                         <div class="flex items-center gap-2">
                                            <a href="javascript:void(0)" class="w-8 h-8 bg-primary-50 dark:bg-primary-600/10 text-primary-600 dark:text-primary-400 rounded-full inline-flex items-center justify-center">
                                                <iconify-icon icon="lucide:edit"></iconify-icon>
                                            </a>
                                            <a href="javascript:void(0)" class="w-8 h-8 bg-danger-100 dark:bg-danger-600/25 text-danger-600 dark:text-danger-400 rounded-full inline-flex items-center justify-center">
                                                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection