@extends('layout.layout')
@php
    $title='Create New Group';
    $subTitle = 'Create New Group';
    $script = '<script>
        document.addEventListener("DOMContentLoaded", function() {
            const durationSelect = document.getElementById("duration");
            const schemeTableContainer = document.getElementById("scheme-table-container");
            const schemeTableBody = document.getElementById("scheme-table-body");

            durationSelect.addEventListener("change", function() {
                const duration = parseInt(this.value);
                schemeTableBody.innerHTML = ""; // Clear existing rows

                if (duration) {
                    schemeTableContainer.classList.remove("hidden");
                    
                    for (let i = 1; i <= duration; i++) {
                        const row = `
                            <tr class="border-b border-neutral-200 dark:border-neutral-600">
                                <td class="px-6 py-3 text-neutral-900 dark:text-white">${i}</td>
                                <td class="px-6 py-3">
                                    <input type="number" class="form-control rounded-lg w-full" placeholder="Bid Amount" name="starting_bid[]">
                                </td>
                                <td class="px-6 py-3">
                                    <input type="number" class="form-control rounded-lg w-full" placeholder="Payable" name="amount_payable[]">
                                </td>
                                <td class="px-6 py-3">
                                    <input type="number" class="form-control rounded-lg w-full" placeholder="Dividend" name="dividend[]">
                                </td>
                            </tr>
                        `;
                        schemeTableBody.insertAdjacentHTML("beforeend", row);
                    }
                } else {
                    schemeTableContainer.classList.add("hidden");
                }
            });
        });
    </script>';
@endphp

@section('content')
    <div class="grid grid-cols-1 gap-6">
        <div class="card h-full p-0 border-0 overflow-hidden">
            <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center justify-between">
                <h6 class="text-lg font-semibold mb-0">Create New Group</h6>
                <a href="{{ route('groupCreation') }}" class="text-neutral-500 hover:text-neutral-700 dark:text-neutral-400 dark:hover:text-white">
                    <iconify-icon icon="mingcute:close-line" class="text-2xl"></iconify-icon>
                </a>
            </div>
            <div class="card-body p-6">
                <form action="{{ route('groups.store') }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Group Name</label>
                            <input type="text" class="form-control rounded-lg" placeholder="Enter name" name="chit_name">
                        </div>

                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Group Value</label>
                            <input type="number" class="form-control rounded-lg" placeholder="Enter value" name="amount">
                        </div>

                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Start Date</label>
                            <input type="date" class="form-control rounded-lg" name="start_date">
                        </div>

                       <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Type</label>
                            <select class="form-control rounded-lg form-select" name="type">
                                <option vale="">Select Type</option>
                                <option vale="Fixed">Fixed</option>
                                <option value="Auction">Auction</option>
                            </select>
                        </div>

                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Duration (Months)</label>
                            <select class="form-control rounded-lg form-select" id="duration" name="duration_months">
                                <option value="">Select Duration</option>
                                <option value="10">10 Months</option>
                                <option value="20">20 Months</option>
                                <option value="40">40 Months</option>
                            </select>
                        </div>

                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Status</label>
                            <select class="form-control rounded-lg form-select" name="status">
                                <option>Select Status</option>
                                <option value="0">Upcoming</option>
                                <option value="1">Active</option>
                                <option value="2">Closed</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Auction Held on</label>
                            <input type="date" class="form-control rounded-lg" name="auction_held_on">
                        </div>
                    </div>

                    <!-- Dynamic Scheme Table -->
                    <div id="scheme-table-container" class="mt-8 hidden">
                        <h6 class="text-lg font-semibold mb-4 text-neutral-900 dark:text-white">Scheme Details</h6>
                        <div class="table-responsive border border-neutral-200 dark:border-neutral-600 rounded-lg">
                            <table class="table w-full text-start whitespace-nowrap">
                                <thead class="bg-neutral-50 dark:bg-neutral-800">
                                    <tr>
                                        <th class="px-6 py-3 text-start font-semibold text-neutral-900 dark:text-white">Month</th>
                                        <th class="px-6 py-3 text-start font-semibold text-neutral-900 dark:text-white">Starting Bid</th>
                                        <th class="px-6 py-3 text-start font-semibold text-neutral-900 dark:text-white">Amount Payable</th>
                                        <th class="px-6 py-3 text-start font-semibold text-neutral-900 dark:text-white">Dividend</th>
                                    </tr>
                                </thead>
                                <tbody id="scheme-table-body">
                                    <!-- Rows will be generated via JS -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="btn btn-primary px-6 py-2.5">Create Group</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
