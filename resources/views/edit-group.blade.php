@extends('layout.layout')
@php
    $title='Edit Group';
    $subTitle = 'Edit Group';
    $script = '<script>
        document.addEventListener("DOMContentLoaded", function() {
            const durationSelect = document.getElementById("duration");
            const schemeTableContainer = document.getElementById("scheme-table-container");
            const schemeTableBody = document.getElementById("scheme-table-body");

            function generateTable(duration) {
                 schemeTableBody.innerHTML = ""; // Clear existing rows
                 if (duration) {
                    schemeTableContainer.classList.remove("hidden");
                    for (let i = 1; i <= duration; i++) {
                        const row = `
                            <tr class="border-b border-neutral-200 dark:border-neutral-600">
                                <td class="px-6 py-3 text-neutral-900 dark:text-white">${i}</td>
                                <td class="px-6 py-3">
                                    <input type="number" class="form-control rounded-lg w-full" value="${5000 + (i*100)}" placeholder="Bid Amount">
                                </td>
                                <td class="px-6 py-3">
                                    <input type="number" class="form-control rounded-lg w-full" value="${4500}" placeholder="Payable">
                                </td>
                                <td class="px-6 py-3">
                                    <input type="number" class="form-control rounded-lg w-full" value="${500}" placeholder="Dividend">
                                </td>
                            </tr>
                        `;
                        schemeTableBody.insertAdjacentHTML("beforeend", row);
                    }
                } else {
                    schemeTableContainer.classList.add("hidden");
                }
            }

            // Initial generation on load
            const initialDuration = parseInt(durationSelect.value);
            if(initialDuration) {
                generateTable(initialDuration);
            }

            durationSelect.addEventListener("change", function() {
                const duration = parseInt(this.value);
                generateTable(duration);
            });
        });
    </script>';
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
                <form action="{{ route('groupCreation') }}"> 
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Group Name</label>
                            <input type="text" class="form-control rounded-lg" value="Gold Scheme A" placeholder="Enter name">
                        </div>
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Group Value</label>
                            <input type="number" class="form-control rounded-lg" value="5000" placeholder="Enter value">
                        </div>
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Start Date</label>
                            <input type="date" class="form-control rounded-lg" value="2025-01-12">
                        </div>
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Type</label>
                            <select class="form-control rounded-lg form-select">
                                <option>Select Type</option>
                                <option selected>Fixed</option>
                                <option>Auction</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Duration (Months)</label>
                            <select class="form-control rounded-lg form-select" id="duration">
                                <option value="">Select Duration</option>
                                <option value="10" selected>10 Months</option>
                                <option value="20">20 Months</option>
                                <option value="40">40 Months</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Status</label>
                            <select class="form-control rounded-lg form-select">
                                <option>Select Status</option>
                                <option>Upcoming</option>
                                <option selected>Active</option>
                                <option>Closed</option>
                            </select>
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
                        <button type="submit" class="btn btn-primary px-6 py-2.5">Update Group</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
