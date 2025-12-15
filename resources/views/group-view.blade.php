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
                            <h6 class="text-base font-semibold text-neutral-900 dark:text-white">{{ $group->chit_name ?? '-' }}</h6>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Group Value</p>
                            <h6 class="text-base font-semibold text-neutral-900 dark:text-white">₹{{ number_format($group->amount) }}</h6>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Start Date</p>
                            <h6 class="text-base font-semibold text-neutral-900 dark:text-white">{{ \Carbon\Carbon::parse($group->start_date)->format('d M Y') }}</h6>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Type</p>
                            <h6 class="text-base font-semibold text-neutral-900 dark:text-white">{{ $group->type }}</h6>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Status</p>
                            @php
                                $statusLabels = [
                                    0 => 'Upcoming',
                                    1 => 'Active',
                                    2 => 'Closed'
                                ];

                                $statusClasses = [
                                    0 => 'bg-primary-100 text-primary-600',
                                    1 => 'bg-success-100 text-success-600',
                                    2 => 'bg-danger-100 text-danger-600'
                                ];
                            @endphp
                            <span class="badge {{ $statusClasses[$group->status] ?? 'bg-gray-100 text-gray-600' }} rounded-full px-3 py-1">
                                {{ $statusLabels[$group->status] ?? '-' }}
                            </span>
                        </div>

                         <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Total Members</p>
                            <h6 class="text-base font-semibold text-neutral-900 dark:text-white">{{ $group->users->count() }}</h6>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Duration</p>
                            <h6 class="text-base font-semibold text-neutral-900 dark:text-white">{{ $group->duration_months }} Months</h6>
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
                                    @foreach ($group->users as $index => $user)
                                        <tr class="border-b border-neutral-200 dark:border-neutral-600">
                                            <td class="px-6 py-3">{{ $index + 1 }}</td>
                                            <td class="px-6 py-3">
                                                <div class="flex items-center gap-2">
                                                    <!-- Initials badge -->
                                                    <div class="w-8 h-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center font-bold text-xs">
                                                        {{ strtoupper(substr($user->name, 0, 1) . substr(explode(' ', $user->name)[1] ?? '', 0, 1)) }}
                                                    </div>
                                                    <span class="text-neutral-900 dark:text-white font-medium">{{ $user->name }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-3">{{ $user->mobile }}</td>
                                            <td class="px-6 py-3">
                                                <span class="badge {{ $user->status == 1 ? 'bg-success-100 text-success-600' : 'bg-danger-100 text-danger-600' }} rounded-full px-2 py-0.5 text-xs">
                                                    Active
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @if($group->users->isEmpty())
                                    <tr>
                                        <td colspan="4" class="px-6 py-3 text-center text-neutral-500 dark:text-neutral-400">
                                            No members found.
                                        </td>
                                    </tr>
                                @endif
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
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Starting Bid</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Amount</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Dividend</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($group->schemes as $scheme)
                                <tr class="border-b border-neutral-200 dark:border-neutral-600">
                                    <td class="px-6 py-3">Month {{ $scheme->month }}</td>
                                    <td class="px-6 py-3">₹{{ number_format($scheme->starting_bid, 2) }}</td>
                                    <td class="px-6 py-3">₹{{ number_format($scheme->amount_payable, 2) }}</td>
                                    <td class="px-6 py-3">₹{{ number_format($scheme->dividend, 2) }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-3 text-center text-neutral-500 dark:text-neutral-400">
                                        No scheme details available.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
