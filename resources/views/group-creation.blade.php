@extends('layout.layout')
@php
    $title='Group Creation';
    $subTitle = 'Manage Groups';
    $script = '<script src="' . asset('assets/js/data-table.js') . '"></script>
    <script>
        let currentLimit = 0;
        let selectedCount = 0;

        function openAddMemberModal(limit) {
            currentLimit = limit;
            selectedCount = 0;
            document.getElementById("modal-limit-display").textContent = currentLimit;
            
            // Reset checkboxes
            const checkboxes = document.querySelectorAll(".member-checkbox");
            checkboxes.forEach(cb => {
                cb.checked = false;
                cb.disabled = false;
            });
            updateSelectionCounter();

            document.getElementById("add-member-modal").classList.remove("hidden");
        }

        function closeAddMemberModal() {
            document.getElementById("add-member-modal").classList.add("hidden");
        }
        
        function handleCheckboxChange(checkbox) {
            const checkboxes = document.querySelectorAll(".member-checkbox");
            const checkedBoxes = document.querySelectorAll(".member-checkbox:checked");
            selectedCount = checkedBoxes.length;

            if (selectedCount >= currentLimit) {
                checkboxes.forEach(cb => {
                    if (!cb.checked) cb.disabled = true;
                });
            } else {
                checkboxes.forEach(cb => {
                    cb.disabled = false;
                });
            }
            updateSelectionCounter();
        }

        function updateSelectionCounter() {
            document.getElementById("selection-count").textContent = selectedCount;
        }

        let deleteGroupId = null;

        function openDeleteModal(id) {
            deleteGroupId = id;
            document.getElementById("delete-modal").classList.remove("hidden");
        }

        function closeDeleteModal() {
            deleteGroupId = null;
            document.getElementById("delete-modal").classList.add("hidden");
        }

        function confirmDelete() {
            if (deleteGroupId) {
                // Perform delete action here
                console.log("Deleting group " + deleteGroupId);
                closeDeleteModal();
            }
        }
    </script>';
@endphp

@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="card border-0 overflow-hidden">
                <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center justify-between">
                    <h6 class="card-title mb-0 text-lg font-semibold text-neutral-900 dark:text-white">Group List</h6>
                    <a href="{{ route('createGroup') }}" class="btn btn-primary text-sm btn-sm px-3 py-2 flex items-center gap-1">
                        <iconify-icon icon="heroicons:plus" class="text-lg"></iconify-icon> Create Group
                    </a>
                </div>
                
                <!-- Filter Section -->
                <div class="card-body border-b border-neutral-200 dark:border-neutral-600 px-6 py-4">
                    <div class="w-full flex items-center gap-6 bg-white dark:bg-neutral-700 border border-neutral-300 dark:border-neutral-600 rounded-xl px-4 py-3">
                        <!-- Filter Icon -->
                      
                        <!-- Date Filter -->
                        <div class="flex items-center gap-2 border-l border-neutral-300 dark:border-neutral-600 pl-6">
                            <span class="text-neutral-800 dark:text-white">Date</span>
                            <input type="date" class="form-control rounded-lg border-neutral-300 dark:bg-neutral-700 dark:border-neutral-600 px-3 py-1 text-sm bg-transparent">
                        </div>
                        <!-- Group Type -->
                        <div class="flex items-center gap-2 border-l border-neutral-300 dark:border-neutral-600 pl-6 h-full">
                            <span class="text-neutral-800 dark:text-white whitespace-nowrap"style="width: 165px;">Group Type</span>
                            <select class="form-select border-0 bg-transparent text-neutral-500 focus:shadow-none ps-0 py-0 cursor-pointer min-w-[80px]">
                                <option>All</option>
                                <option>Fixed</option>
                                <option>Auction</option>
                            </select>
                        </div>
                        <!-- Group Status -->
                        <div class="flex items-center gap-2 border-l border-neutral-300 dark:border-neutral-600 pl-6 h-full">
                            <span class="text-neutral-800 dark:text-white whitespace-nowrap" style="width: 170px;">Group Status</span>
                             <select class="form-select border-0 bg-transparent text-neutral-500 focus:shadow-none ps-0 py-0 cursor-pointer min-w-[80px]">
                                <option>All</option>
                                <option>Upcoming</option>
                                <option>Active</option>
                                <option>Closed</option>
                            </select>
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
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Group Name</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Group Value</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Date</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Type</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Status</th>
                                    <th class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Members</th>
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
                                    <td class="px-6 py-3"><span class="text-neutral-900 dark:text-white">1/10</span></td>
                                    <td class="px-6 py-3">
                                         <div class="flex items-center gap-2">
                                            <a href="{{ route('viewGroup', ['id' => $group->id ?? 1]) }}" class="w-8 h-8 bg-success-50 dark:bg-success-600/10 text-success-600 dark:text-success-400 rounded-full inline-flex items-center justify-center" title="View Group"><iconify-icon icon="mdi:eye"></iconify-icon></a>
                                            <a href="{{ route('editGroup', ['id' => $group->id ?? 1]) }}" class="w-8 h-8 bg-primary-50 dark:bg-primary-600/10 text-primary-600 dark:text-primary-400 rounded-full inline-flex items-center justify-center" title="Edit Group"><iconify-icon icon="lucide:edit"></iconify-icon></a>
                                            <button type="button" onclick="openAddMemberModal(10)" class="w-8 h-8 bg-info-100 dark:bg-info-600/25 text-info-600 dark:text-info-400 rounded-full inline-flex items-center justify-center" title="Add Person"><iconify-icon icon="mdi:account-plus"></iconify-icon></button>
                                            <button type="button" onclick="openDeleteModal({{ $group->id ?? 1 }})" class="w-8 h-8 bg-danger-100 dark:bg-danger-600/25 text-danger-600 dark:text-danger-400 rounded-full inline-flex items-center justify-center">
                                                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                            </button>
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
                                    <td class="px-6 py-3"><span class="text-neutral-900 dark:text-white">5/20</span></td>
                                    <td class="px-6 py-3">
                                         <div class="flex items-center gap-2">
                                            <a href="{{ route('viewGroup', ['id' => $group->id ?? 2]) }}" class="w-8 h-8 bg-success-50 dark:bg-success-600/10 text-success-600 dark:text-success-400 rounded-full inline-flex items-center justify-center" title="View Group"><iconify-icon icon="mdi:eye"></iconify-icon></a>
                                            <a href="javascript:void(0)" class="w-8 h-8 bg-primary-50 dark:bg-primary-600/10 text-primary-600 dark:text-primary-400 rounded-full inline-flex items-center justify-center">
                                                <iconify-icon icon="lucide:edit"></iconify-icon>
                                            </a>
                                            <button type="button" onclick="openAddMemberModal(20)" class="w-8 h-8 bg-info-100 dark:bg-info-600/25 text-info-600 dark:text-info-400 rounded-full inline-flex items-center justify-center" title="Add Person">
                                                <iconify-icon icon="mdi:account-plus"></iconify-icon>
                                            </button>
                                            <button type="button" onclick="openDeleteModal({{ $group->id ?? 2 }})" class="w-8 h-8 bg-danger-100 dark:bg-danger-600/25 text-danger-600 dark:text-danger-400 rounded-full inline-flex items-center justify-center">
                                                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                            </button>
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

    <!-- Add Member Modal -->
    <div id="add-member-modal" class="fixed inset-0 z-50 hidden flex justify-center items-center bg-black/30 backdrop-blur-sm">
        <div class="relative p-4 w-full max-w-lg bg-white rounded-lg shadow dark:bg-neutral-700" style="width:50%;">
            <!-- Header -->
            <div class="flex items-center justify-between p-4 border-b border-neutral-200 dark:border-neutral-600">
                <h3 class="text-xl font-semibold text-neutral-900 dark:text-white">
                    Add Members (<span id="selection-count">0</span>/<span id="modal-limit-display">0</span>)
                </h3>
                <button type="button" onclick="closeAddMemberModal()" class="text-neutral-400 hover:bg-neutral-200 hover:text-neutral-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-neutral-600 dark:hover:text-white">
                    <iconify-icon icon="mingcute:close-line" class="text-xl"></iconify-icon>
                </button>
            </div>
            <!-- Body -->
            <div class="p-4">
                <div class="mb-4">
                    <input type="text" class="form-control rounded-lg w-full" placeholder="Search Customers...">
                </div>
                
                <div class="overflow-y-auto max-h-[300px] border border-neutral-200 dark:border-neutral-600 rounded-lg">
                    <!-- Item 1 -->
                    <div class="flex items-center justify-between p-3 border-b border-neutral-200 dark:border-neutral-600 hover:bg-neutral-50 dark:hover:bg-neutral-600">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center font-bold text-sm">JD</div>
                            <div>
                                <p class="font-semibold text-sm text-neutral-900 dark:text-white">John Doe</p>
                                <p class="text-xs text-neutral-500 dark:text-neutral-400">9876543210</p>
                            </div>
                        </div>
                        <input type="checkbox" class="form-checkbox w-5 h-5 text-primary-600 member-checkbox" onchange="handleCheckboxChange(this)">
                    </div>
                     <!-- Item 2 -->
                    <div class="flex items-center justify-between p-3 border-b border-neutral-200 dark:border-neutral-600 hover:bg-neutral-50 dark:hover:bg-neutral-600">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-success-100 text-success-600 flex items-center justify-center font-bold text-sm">AB</div>
                            <div>
                                <p class="font-semibold text-sm text-neutral-900 dark:text-white">Alice Brown</p>
                                <p class="text-xs text-neutral-500 dark:text-neutral-400">1234567890</p>
                            </div>
                        </div>
                        <input type="checkbox" class="form-checkbox w-5 h-5 text-primary-600 member-checkbox" onchange="handleCheckboxChange(this)">
                    </div>
                     <!-- Item 3 -->
                    <div class="flex items-center justify-between p-3 border-b border-neutral-200 dark:border-neutral-600 hover:bg-neutral-50 dark:hover:bg-neutral-600">
                        <div class="flex items-center gap-3">
                             <div class="w-8 h-8 rounded-full bg-warning-100 text-warning-600 flex items-center justify-center font-bold text-sm">RM</div>
                            <div>
                                <p class="font-semibold text-sm text-neutral-900 dark:text-white">Robert Miller</p>
                                <p class="text-xs text-neutral-500 dark:text-neutral-400">5556667777</p>
                            </div>
                        </div>
                        <input type="checkbox" class="form-checkbox w-5 h-5 text-primary-600 member-checkbox" onchange="handleCheckboxChange(this)">
                    </div>
                     <!-- Item 4 -->
                    <div class="flex items-center justify-between p-3 border-b border-neutral-200 dark:border-neutral-600 hover:bg-neutral-50 dark:hover:bg-neutral-600">
                        <div class="flex items-center gap-3">
                             <div class="w-8 h-8 rounded-full bg-danger-100 text-danger-600 flex items-center justify-center font-bold text-sm">JS</div>
                            <div>
                                <p class="font-semibold text-sm text-neutral-900 dark:text-white">Jane Smith</p>
                                <p class="text-xs text-neutral-500 dark:text-neutral-400">9988776655</p>
                            </div>
                        </div>
                        <input type="checkbox" class="form-checkbox w-5 h-5 text-primary-600 member-checkbox" onchange="handleCheckboxChange(this)">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="button" onclick="closeAddMemberModal()" class="w-full text-white bg-primary-600 hover:bg-primary-700 font-medium rounded-lg text-sm px-5 py-2.5">
                        Add Selected Members
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="delete-modal" class="fixed inset-0 z-50 hidden flex justify-center items-center bg-black/30 backdrop-blur-sm">
        <div class="relative p-4 w-full max-w-md bg-white rounded-lg shadow dark:bg-neutral-700" style="width: 505px;">
            <div class="p-4 text-center">
                <iconify-icon icon="mingcute:alert-line" class="text-6xl text-danger-500 mb-4 mx-auto"></iconify-icon>
                <h3 class="mb-5 text-lg font-normal text-neutral-500 dark:text-neutral-400">Are you sure you want to delete this group?</h3>
                <button onclick="confirmDelete()" type="button" class="text-white bg-danger-600 hover:bg-danger-800 focus:ring-4 focus:outline-none focus:ring-danger-300 dark:focus:ring-danger-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Yes, I'm sure
                </button>
                <button onclick="closeDeleteModal()" type="button" class="text-neutral-500 bg-white hover:bg-neutral-100 focus:ring-4 focus:outline-none focus:ring-neutral-200 rounded-lg border border-neutral-200 text-sm font-medium px-5 py-2.5 hover:text-neutral-900 focus:z-10 dark:bg-neutral-700 dark:text-neutral-300 dark:border-neutral-500 dark:hover:text-white dark:hover:bg-neutral-600 dark:focus:ring-neutral-600">
                    No, cancel
                </button>
            </div>
        </div>
    </div>
@endsection