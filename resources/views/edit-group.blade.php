@extends('layout.layout')
@php
    $title='Edit Group';
    $subTitle = 'Edit Group';
    $script = '<script>
    document.addEventListener("DOMContentLoaded", function () {
        const durationSelect = document.getElementById("duration");
        const schemeTableContainer = document.getElementById("scheme-table-container");
        const schemeTableBody = document.getElementById("scheme-table-body");

        function generateRemainingRows(duration) {
            const existingCount = schemeTableBody.children.length;

            schemeTableContainer.classList.remove("hidden");

            for (let i = existingCount + 1; i <= duration; i++) {
                const row = `
                    <tr class="border-b border-neutral-200 dark:border-neutral-600">
                        <td class="px-6 py-3 text-neutral-900 dark:text-white">${i}</td>
                        <td class="px-6 py-3">
                            <input type="number" name="schemes[${i}][starting_bid]"
                                class="form-control rounded-lg w-full">
                        </td>
                        <td class="px-6 py-3">
                            <input type="number" name="schemes[${i}][amount_payable]"
                                class="form-control rounded-lg w-full">
                        </td>
                        <td class="px-6 py-3">
                            <input type="number" name="schemes[${i}][dividend]"
                                class="form-control rounded-lg w-full">
                        </td>
                    </tr>`;
                schemeTableBody.insertAdjacentHTML("beforeend", row);
            }
        }

        // Initial load (Edit page)
        const initialDuration = parseInt(durationSelect.value);
        if (initialDuration > schemeTableBody.children.length) {
            generateRemainingRows(initialDuration);
        }

        // On duration change
        durationSelect.addEventListener("change", function () {
            const newDuration = parseInt(this.value);

            if (newDuration < schemeTableBody.children.length) {
                alert("Reducing duration will not remove existing scheme data.");
                return;
            }

            generateRemainingRows(newDuration);
        });
    });
    </script>
    ';
@endphp

@section('content')
    <div class="grid grid-cols-1 gap-6">
        <div class="card h-full p-0 border-0 overflow-hidden">
            <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center justify-between">
                <h6 class="text-lg font-semibold mb-0">Edit Group</h6>
                <a href="{{ route('groupCreation') }}" class="text-neutral-500 hover:text-neutral-700 dark:text-neutral-400 dark:hover:text-white">
                    <iconify-icon icon="mingcute:close-line" class="text-2xl"></iconify-icon>
                </a>
            </div>
            <div class="card-body p-6">
                <form action="{{ route('groups.update', $group->id) }}" method="post" enctype="multipart/form-data"> 
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Group Name</label>
                            <input type="text" class="form-control rounded-lg" name="chit_name" value="{{ $group->chit_name }}" placeholder="Enter name">
                        </div>
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Group Value</label>
                            <input type="number" class="form-control rounded-lg" name="amount" value="{{ $group->amount }}" placeholder="Enter value">
                        </div>
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Start Date</label>
                            <input type="date" class="form-control rounded-lg" name="start_date" value="{{ $group->start_date }}">
                        </div>
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Type</label>
                            <select class="form-control rounded-lg form-select" name="type">
                               <option value="">--- Select Type ---</option>
                                <option value="Fixed" {{ $group->type=='Fixed'?'selected':'' }}>Fixed</option>
                                <option value="Auction" {{ $group->type=='Auction'?'selected':'' }}>Auction</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Duration (Months)</label>
                            <select class="form-control rounded-lg form-select" id="duration" name="duration_months">
                                <option value="">--- Select Duration ---</option>
                                <option value="10" {{ $group->duration_months==10?'selected':'' }}>10 Months</option>
                                <option value="20" {{ $group->duration_months==20?'selected':'' }}>20 Months</option>
                                <option value="40" {{ $group->duration_months==40?'selected':'' }}>40 Months</option>

                            </select>
                        </div>
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Status</label>
                            <select class="form-control rounded-lg form-select" name="status">
                                <option value="">--- Select Status ---</option>
                                <option value="0" {{ $group->status==0 ?'selected':'' }}>Upcoming</option>
                                <option value="1" {{ $group->status==1 ?'selected':'' }}>Active</option>
                                <option value="2" {{ $group->status==2 ?'selected':'' }}>Closed</option>
                            </select>
                        </div>

                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Auction Held on</label>
                            <input type="date" class="form-control rounded-lg" name="auction_held_on" value="{{ $group->auction_held_on }}">
                        </div>

                    </div>

                    <!-- Dynamic Scheme Table -->
                    <div id="scheme-table-container" class="mt-8 {{ $group->schemes->count() ? '' : 'hidden' }}">
                        <h6 class="text-lg font-semibold mb-4 text-neutral-900 dark:text-white">
                            Scheme Details
                        </h6>

                        <div class="table-responsive border border-neutral-200 dark:border-neutral-600 rounded-lg">
                            <table class="table w-full text-start whitespace-nowrap">
                                <thead class="bg-neutral-50 dark:bg-neutral-800">
                                    <tr>
                                        <th class="px-6 py-3 font-semibold text-neutral-900 dark:text-white">Month</th>
                                        <th class="px-6 py-3 font-semibold text-neutral-900 dark:text-white">Starting Bid</th>
                                        <th class="px-6 py-3 font-semibold text-neutral-900 dark:text-white">Amount Payable</th>
                                        <th class="px-6 py-3 font-semibold text-neutral-900 dark:text-white">Dividend</th>
                                    </tr>
                                </thead>

                                <tbody id="scheme-table-body">
                                    @foreach($group->schemes as $index => $scheme)
                                        <tr class="border-b border-neutral-200 dark:border-neutral-600">
                                            <td class="px-6 py-3 text-neutral-900 dark:text-white">
                                                {{ $index + 1 }}
                                                <input type="hidden" name="schemes[{{ $index + 1 }}][month]" value="{{ $index + 1 }}">
                                            </td>

                                            <td class="px-6 py-3">
                                                <input type="number" class="form-control rounded-lg w-full"
                                                    name="schemes[{{ $index + 1 }}][starting_bid]"
                                                    value="{{ $scheme->starting_bid }}">
                                            </td>

                                            <td class="px-6 py-3">
                                                <input type="number" class="form-control rounded-lg w-full"
                                                    name="schemes[{{ $index + 1 }}][amount_payable]"
                                                    value="{{ $scheme->amount_payable }}">
                                            </td>

                                            <td class="px-6 py-3">
                                                <input type="number" class="form-control rounded-lg w-full"
                                                    name="schemes[{{ $index + 1 }}][dividend]"
                                                    value="{{ $scheme->dividend }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>


                    <div class="flex justify-end mt-6">
                        <button type="submit" class="btn btn-primary px-6 py-2.5">Update Group</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
