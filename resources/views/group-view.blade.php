@extends('layout.layout')
@php
    $title='Group View';
    $subTitle = 'Group Details';
@endphp

@section('content')
    <div class="grid grid-cols-12 gap-6">
        <!-- Group Details Card -->
        <div class="col-span-12">
            <div class="card border-0 overflow-hidden">
                <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center justify-between">
                    <h6 class="card-title mb-0 text-lg font-semibold text-neutral-900 dark:text-white">Group Details</h6>
                    <a href="{{ route('groupCreation') }}" class="text-neutral-500 hover:text-neutral-700 dark:text-neutral-400 dark:hover:text-white">
                        <iconify-icon icon="mingcute:close-line" class="text-2xl"></iconify-icon>
                    </a>
                </div>
                <div class="card-body px-6 py-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Group Name</p>
                            <h6 class="text-base font-semibold text-neutral-900 dark:text-white">Gold Scheme A</h6>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Group Value</p>
                            <h6 class="text-base font-semibold text-neutral-900 dark:text-white">₹5,000</h6>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Start Date</p>
                            <h6 class="text-base font-semibold text-neutral-900 dark:text-white">12 Jan 2025</h6>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Type</p>
                            <h6 class="text-base font-semibold text-neutral-900 dark:text-white">Fixed</h6>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Status</p>
                            <span class="badge bg-success-100 text-success-600 rounded-full px-3 py-1">Active</span>
                        </div>
                         <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Total Members</p>
                            <h6 class="text-base font-semibold text-neutral-900 dark:text-white">10</h6>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Duration</p>
                            <h6 class="text-base font-semibold text-neutral-900 dark:text-white">12 Months</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Members Table -->
        <div class="col-span-12 lg:col-span-6">
            <div class="card border-0 overflow-hidden h-full">
                <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6">
                    <h6 class="card-title mb-0 text-lg font-semibold text-neutral-900 dark:text-white">Group Members</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table hover-table w-full text-start whitespace-nowrap">
                            <thead>
                                <tr class="border-b border-neutral-200 dark:border-neutral-600 bg-neutral-50 dark:bg-neutral-800">
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">S.No</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Member Name</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Phone</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-neutral-200 dark:border-neutral-600">
                                    <td class="px-6 py-3">01</td>
                                    <td class="px-6 py-3">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center font-bold text-xs">JD</div>
                                            <span class="text-neutral-900 dark:text-white font-medium">John Doe</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3">9876543210</td>
                                    <td class="px-6 py-3"><span class="badge bg-success-100 text-success-600 rounded-full px-2 py-0.5 text-xs">Active</span></td>
                                </tr>
                                <tr class="border-b border-neutral-200 dark:border-neutral-600">
                                    <td class="px-6 py-3">02</td>
                                    <td class="px-6 py-3">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 rounded-full bg-warning-100 text-warning-600 flex items-center justify-center font-bold text-xs">AB</div>
                                            <span class="text-neutral-900 dark:text-white font-medium">Alice Brown</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3">1234567890</td>
                                    <td class="px-6 py-3"><span class="badge bg-success-100 text-success-600 rounded-full px-2 py-0.5 text-xs">Active</span></td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Schedule/Duration Table -->
        <div class="col-span-12 lg:col-span-6">
            <div class="card border-0 overflow-hidden h-full">
                <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6">
                    <h6 class="card-title mb-0 text-lg font-semibold text-neutral-900 dark:text-white">Scheme Details</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table hover-table w-full text-start whitespace-nowrap">
                            <thead>
                                <tr class="border-b border-neutral-200 dark:border-neutral-600 bg-neutral-50 dark:bg-neutral-800">
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Month</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Due Date</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Amount</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $duration = 12; // Example duration
                                    $startDate = \Carbon\Carbon::parse('2025-01-12');
                                @endphp
                                @for ($i = 1; $i <= $duration; $i++)
                                    @php
                                        $dueDate = $startDate->copy()->addMonths($i - 1);
                                        $status = $i <= 2 ? 'Paid' : ($i == 3 ? 'Pending' : 'Upcoming');
                                        $badgeClass = $i <= 2 ? 'bg-success-100 text-success-600' : ($i == 3 ? 'bg-warning-100 text-warning-600' : 'bg-neutral-100 text-neutral-600');
                                    @endphp
                                    <tr class="border-b border-neutral-200 dark:border-neutral-600">
                                        <td class="px-6 py-3">Month {{ $i }}</td>
                                        <td class="px-6 py-3">{{ $dueDate->format('d M Y') }}</td>
                                        <td class="px-6 py-3">₹500</td>
                                        <td class="px-6 py-3"><span class="badge {{ $badgeClass }} rounded-full px-2 py-0.5 text-xs">{{ $status }}</span></td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
