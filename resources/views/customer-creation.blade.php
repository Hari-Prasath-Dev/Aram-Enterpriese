@extends('layout.layout')

@section('content')

   @php
    $script='<script src="' . asset('assets/js/data-table.js') . '"></script>
    <script>
        function openCustomerModal(user) {
            document.getElementById("modal-name").textContent = user.name;
            document.getElementById("modal-location").textContent = user.location;
            document.getElementById("modal-phone").textContent = user.phone_number;
            document.getElementById("modal-nominee").textContent = user.nominee_name;
            // Handle photo path correctly (removing potential duplicate slashes if asset has trailing slash)
            var assetBase = "' . asset('') . '";
            document.getElementById("modal-photo").src = assetBase + user.photo;
            
            document.getElementById("customer-details-modal").classList.remove("hidden");
        }
        function closeCustomerModal() {
            document.getElementById("customer-details-modal").classList.add("hidden");
        }
        function openDeleteModal() {
            document.getElementById("delete-modal").classList.remove("hidden");
        }
        function closeDeleteModal() {
            document.getElementById("delete-modal").classList.add("hidden");
        }
        function openPinModal() {
            document.getElementById("pin-modal").classList.remove("hidden");
            // Focus first input
            setTimeout(() => {
                const firstInput = document.querySelector(\'#pin-modal input[type="text"]\');
                if(firstInput) firstInput.focus();
            }, 100);
        }
        function closePinModal() {
            document.getElementById("pin-modal").classList.add("hidden");
        }
        
        // Auto-focus next input logic
        function moveToNext(element, nextId) {
            if (element.value.length >= 1) {
                if(nextId) {
                   document.getElementById(nextId).focus();
                }
            }
        }
    </script>';
@endphp

       <div class="grid grid-cols-12">
        <div class="col-span-12">
            <div class="card border-0 overflow-hidden">
                <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center justify-between">
                    <h6 class="card-title mb-0 text-lg font-semibold text-neutral-900 dark:text-white">Customer List</h6>
                    <a href="{{ route('addUser') }}" class="btn btn-primary text-sm px-3 py-2 flex items-center gap-1">
                        <iconify-icon icon="heroicons:plus" class="text-lg"></iconify-icon> Create Customers
                    </a>
                </div>
                <div class="card-body border-b border-neutral-200 dark:border-neutral-600 px-6 py-4">
                    <div class="w-full flex items-center gap-6 bg-white dark:bg-neutral-700 border border-neutral-300 dark:border-neutral-600 rounded-xl px-4 py-3">
                        <!-- Search -->
                        <div class="flex items-center gap-2" style="width: 30%;">
                            <iconify-icon icon="ion:search-outline" class="text-neutral-500 text-lg"></iconify-icon>
                            <input type="text" class="form-control border-0 bg-transparent focus:shadow-none p-0 text-sm " style="
                                width: 100%;
                                border: 1px solid #d2d2d2;
                                padding: 10px;
                            "placeholder="Search by Name or Mobile...">
                        </div>
                        
                        <!-- Filter By Location -->
                        <div class="flex items-center gap-2 border-l border-neutral-300 dark:border-neutral-600 pl-6 h-full">
                            <span class="text-neutral-800 dark:text-white whitespace-nowrap">Location</span>
                            <select class="form-select border-0 bg-transparent text-neutral-500 focus:shadow-none ps-0 py-0 cursor-pointer min-w-[150px]" style="
                                border: 1px solid #d2d2d2;
                                padding: 6px 29px 6px 6px;
                            ">
                                <option>All Locations</option>
                                <option>New York</option>
                                <option>London</option>
                            </select>
                        </div>

                        <!-- Reset Filter -->
                        <button type="button" class="ml-auto flex items-center gap-1 text-red-500 font-medium hover:text-red-600">
                            <iconify-icon icon="mdi:refresh"></iconify-icon>
                            Reset
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="selection-table-" class="table w-full text-start whitespace-nowrap">
                            <thead>
                                <tr class="border-b border-neutral-200 dark:border-neutral-600 bg-neutral-50 dark:bg-neutral-800">
                                    <th scope="col" class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">S.No</th>
                                    <th scope="col" class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Photo</th>
                                    <th scope="col" class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Name</th>
                                    <th scope="col" class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Phone Number</th>
                                    <th scope="col" class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Location</th>
                                    <th scope="col" class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Nominee Name</th>
                                    <th scope="col" class="text-start px-6 py-3 font-semibold text-neutral-900 dark:text-white">Action</th>
                                </tr>
                            </thead>
                           <tbody>
                                {{-- Sample data, replace with your actual data --}}
                                @php
                                    $users = [
                                        ['s_no' => 1, 'photo' => 'assets/images/user-grid/user-grid-img14.png', 'name' => 'John Doe', 'location' => 'New York', 'phone_number' => '123-456-7890', 'nominee_name' => 'Jane Doe'],
                                        ['s_no' => 2, 'photo' => 'assets/images/user-grid/user-grid-img13.png', 'name' => 'Peter Jones', 'location' => 'London', 'phone_number' => '098-765-4321', 'nominee_name' => 'Mary Jones'],
                                    ];
                                @endphp
                                @foreach ($users as $user)
                                <tr class="border-b border-neutral-200 dark:border-neutral-600 hover:bg-neutral-50 dark:hover:bg-neutral-800">
                                    <td class="px-6 py-3">{{ $user['s_no'] }}</td>
                                    <td class="px-6 py-3" style="
                                                    display: flex;
                                                    justify-content: center;
                                                ">
                                        <img src="{{ asset($user['photo']) }}" alt="" class="shrink-0 rounded-full w-10 h-10 object-cover">
                                    </td>
                                    <td class="px-6 py-3 font-medium text-neutral-900 dark:text-white">{{ $user['name'] }}</td>
                                    <td class="px-6 py-3">{{ $user['phone_number'] }}</td>
                                    <td class="px-6 py-3">{{ $user['location'] }}</td>
                                    <td class="px-6 py-3">{{ $user['nominee_name'] }}</td>
                                     <td class="px-6 py-3">
                                        <div class="flex items-center gap-2" style="
                                                display: flex;
                                                justify-content: center;
                                            ">
                                            <a href="{{ route('viewUser', $user['s_no']) }}" class="w-8 h-8 bg-primary-50 dark:bg-primary-600/10 text-primary-600 dark:text-primary-400 rounded-full inline-flex items-center justify-center hover:bg-primary-100 transition-colors">
                                                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                            </a>
                                            <a href="{{ route('formValidation', ['name' => $user['name'], 'phone' => $user['phone_number'], 'location' => $user['location'], 'email' => 'example@email.com']) }}" class="w-8 h-8 bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 rounded-full inline-flex items-center justify-center hover:bg-success-200 transition-colors">
                                                <iconify-icon icon="lucide:edit"></iconify-icon>
                                            </a>
                                            <a href="{{ route('imageUpload') }}" class="w-8 h-8 bg-info-100 dark:bg-info-600/25 text-info-600 dark:text-info-400 rounded-full inline-flex items-center justify-center hover:bg-info-200 transition-colors">
                                                <iconify-icon icon="mage:file-2"></iconify-icon>
                                            </a>
                                            <button type="button" onclick="openPinModal()" class="w-8 h-8 bg-warning-100 dark:bg-warning-600/25 text-warning-600 dark:text-warning-400 rounded-full inline-flex items-center justify-center hover:bg-warning-200 transition-colors">
                                                <iconify-icon icon="bi:pin-angle"></iconify-icon>
                                            </button>
                                            <button type="button" onclick="openDeleteModal()" class="w-8 h-8 bg-danger-100 dark:bg-danger-600/25 text-danger-600 dark:text-danger-400 rounded-full inline-flex items-center justify-center hover:bg-danger-200 transition-colors">
                                                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Customer Details Modal Removed -->
    <!-- Delete Confirmation Modal -->
<div id="delete-modal" 
     class="fixed inset-0 z-50 hidden flex justify-center items-center bg-black/30 backdrop-blur-sm">

    <div class="relative p-4 w-full max-w-md" style="
    width: 50%;">
        <div class="relative bg-white rounded-lg shadow dark:bg-neutral-700">

            <!-- Close Button -->
            <button type="button" onclick="closeDeleteModal()" 
                class="absolute top-3 right-2.5 text-neutral-400 hover:bg-neutral-200 hover:text-neutral-900 
                       rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center 
                       dark:hover:bg-neutral-600 dark:hover:text-white">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>

            <!-- Modal Content -->
            <div class="p-4 text-center">
                <svg class="mx-auto mb-4 text-neutral-400 w-12 h-12 dark:text-neutral-200"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>

                <h3 class="mb-5 text-lg font-normal text-neutral-500 dark:text-neutral-400">
                    Are you sure you want to verify this deletion?
                </h3>

                <button type="button" onclick="closeDeleteModal()"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none 
                           focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5
                           dark:focus:ring-red-800">
                    Yes, Delete
                </button>

                <button type="button" onclick="closeDeleteModal()"
                    class="py-2.5 px-5 ml-3 text-sm font-medium text-neutral-900 bg-white rounded-lg 
                           border border-neutral-200 hover:bg-neutral-100 hover:text-blue-700 
                           dark:bg-neutral-800 dark:text-neutral-400 dark:border-neutral-600 
                           dark:hover:text-white dark:hover:bg-neutral-700">
                    No, Cancel
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Pin Change Modal -->
<div id="pin-modal" 
     class="fixed inset-0 z-50 hidden flex justify-center items-center bg-black/30 backdrop-blur-sm">

    <div class="relative p-4 w-full max-w-md" style="
    width: 50%;">
        <div class="relative bg-white rounded-lg shadow dark:bg-neutral-700">

            <!-- Header -->
            <div class="flex items-center justify-between p-4 border-b border-neutral-200 dark:border-neutral-600">
                <h3 class="text-xl font-semibold text-neutral-900 dark:text-white">Change Pin</h3>

                <button type="button" onclick="closePinModal()"
                    class="text-neutral-400 hover:bg-neutral-200 hover:text-neutral-900 
                           rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center 
                           dark:hover:bg-neutral-600 dark:hover:text-white">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            <!-- Body -->
            <div class="p-5">

                <!-- Old Pin -->
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">New Pin</label>

                    <div class="flex gap-2 justify-center">
                        <input type="text" maxlength="1" id="pin-1" onkeyup="moveToNext(this, 'pin-2')"
                            class="w-12 h-12 text-center text-xl border border-neutral-300 rounded-lg bg-neutral-50 
                                   focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-700 dark:border-neutral-600">
                        <input type="text" maxlength="1" id="pin-2" onkeyup="moveToNext(this, 'pin-3')" 
                            class="w-12 h-12 text-center text-xl border border-neutral-300 rounded-lg bg-neutral-50 
                                   focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-700 dark:border-neutral-600">
                        <input type="text" maxlength="1" id="pin-3" onkeyup="moveToNext(this, 'pin-4')" 
                            class="w-12 h-12 text-center text-xl border border-neutral-300 rounded-lg bg-neutral-50 
                                   focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-700 dark:border-neutral-600">
                        <input type="text" maxlength="1" id="pin-4"
                            class="w-12 h-12 text-center text-xl border border-neutral-300 rounded-lg bg-neutral-50 
                                   focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-700 dark:border-neutral-600">
                    </div>
                </div>

                <!-- New Pin -->
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Confirm Pin</label>

                    <div class="flex gap-2 justify-center">
                        <input type="text" maxlength="1" id="new-pin-1" onkeyup="moveToNext(this, 'new-pin-2')" 
                            class="w-12 h-12 text-center text-xl border bg-neutral-50 rounded-lg">
                        <input type="text" maxlength="1" id="new-pin-2" onkeyup="moveToNext(this, 'new-pin-3')" 
                            class="w-12 h-12 text-center text-xl border bg-neutral-50 rounded-lg">
                        <input type="text" maxlength="1" id="new-pin-3" onkeyup="moveToNext(this, 'new-pin-4')" 
                            class="w-12 h-12 text-center text-xl border bg-neutral-50 rounded-lg">
                        <input type="text" maxlength="1" id="new-pin-4" 
                            class="w-12 h-12 text-center text-xl border bg-neutral-50 rounded-lg">
                    </div>
                </div>

                <!-- Save Button -->
                <button type="button" onclick="closePinModal()"
                    class="w-full text-white bg-primary-600 hover:bg-primary-700 
                           font-medium rounded-lg text-sm px-5 py-2.5">
                    Save
                </button>

            </div>
        </div>
    </div>
</div>

@endsection
