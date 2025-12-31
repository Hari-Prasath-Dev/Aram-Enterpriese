@extends('layout.layout')

@php
    $title = 'Group View';
    $subTitle = 'Group Details';
@endphp

@section('content')
<div class="grid grid-cols-1 gap-6">

    <div class="card h-full p-0 border-0 overflow-hidden">

        <!-- Header -->
        <div class="card-header border-b border-neutral-200 dark:border-neutral-600 
            bg-white dark:bg-neutral-700 py-4 px-6 flex items-center justify-between">
            <h6 class="text-lg font-semibold mb-0">Group Details</h6>
            <a href="{{ route('groupCreation') }}" 
               class="text-neutral-500 hover:text-neutral-700 dark:text-neutral-400 dark:hover:text-white">
                <iconify-icon icon="mingcute:close-line" class="text-2xl"></iconify-icon>
            </a>
        </div>

        <!-- Body -->
        <div class="card-body p-6 space-y-10">

            <!-- Group Information -->
            <div>
                <h6 class="text-lg font-semibold mb-4">Basic Information</h6>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="form-label text-neutral-600 dark:text-neutral-300">Group Name</label>
                        <p class="font-semibold text-neutral-900 dark:text-white">{{ $group->name }}</p>
                    </div>

                    <div>
                        <label class="form-label text-neutral-600 dark:text-neutral-300">Group Value</label>
                        <p class="font-semibold text-neutral-900 dark:text-white">{{ $group->value }}</p>
                    </div>

                    <div>
                        <label class="form-label text-neutral-600 dark:text-neutral-300">Start Date</label>
                        <p class="font-semibold text-neutral-900 dark:text-white">{{ $group->start_date }}</p>
                    </div>

                    <div>
                        <label class="form-label text-neutral-600 dark:text-neutral-300">Type</label>
                        <p class="font-semibold text-neutral-900 dark:text-white">{{ ucfirst($group->type) }}</p>
                    </div>

                    <div>
                        <label class="form-label text-neutral-600 dark:text-neutral-300">Duration</label>
                        <p class="font-semibold text-neutral-900 dark:text-white">{{ $group->duration }} Months</p>
                    </div>

                    <div>
                        <label class="form-label text-neutral-600 dark:text-neutral-300">Status</label>
                        <p class="font-semibold text-neutral-900 dark:text-white">{{ $group->status }}</p>
                    </div>

                </div>
            </div>

            <!-- Scheme Table -->
            <div>
                <h6 class="text-lg font-semibold mb-4">Scheme Details</h6>

                <div class="table-responsive border border-neutral-200 dark:border-neutral-600 rounded-lg">
                    <table class="table w-full text-start whitespace-nowrap">
                        <thead class="bg-neutral-50 dark:bg-neutral-800">
                            <tr>
                                <th class="px-6 py-3 text-start">Month</th>
                                <th class="px-6 py-3 text-start">Starting Bid</th>
                                <th class="px-6 py-3 text-start">Amount Payable</th>
                                <th class="px-6 py-3 text-start">Dividend</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($group->scheme_rows as $row)
                                <tr class="border-b border-neutral-200 dark:border-neutral-600">
                                    <td class="px-6 py-3">{{ $row->month }}</td>
                                    <td class="px-6 py-3">{{ $row->starting_bid }}</td>
                                    <td class="px-6 py-3">{{ $row->payable }}</td>
                                    <td class="px-6 py-3">{{ $row->dividend }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

            <!-- Members List -->
            <div>
                <h6 class="text-lg font-semibold mb-4">Group Members</h6>

                <div class="table-responsive border border-neutral-200 dark:border-neutral-600 rounded-lg">
                    <table class="table w-full text-start whitespace-nowrap">
                        <thead class="bg-neutral-50 dark:bg-neutral-800">
                            <tr>
                                <th class="px-6 py-3">#</th>
                                <th class="px-6 py-3">Member Name</th>
                                <th class="px-6 py-3">Phone</th>
                                <th class="px-6 py-3">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($group->members as $index => $member)
                                <tr class="border-b border-neutral-200 dark:border-neutral-600">
                                    <td class="px-6 py-3">{{ $index + 1 }}</td>
                                    <td class="px-6 py-3">{{ $member->name }}</td>
                                    <td class="px-6 py-3">{{ $member->phone }}</td>
                                    <td class="px-6 py-3">{{ $member->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if (count($group->members) == 0)
                    <p class="text-neutral-500 mt-3">No members added yet.</p>
                @endif
            </div>

        </div>
    </div>

</div>
@endsection
