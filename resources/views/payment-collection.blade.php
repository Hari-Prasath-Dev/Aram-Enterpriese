@extends('layout.layout')
@php
    $title='Payment Collection';
    $subTitle = 'Payment Collection List';
    $script='<script src="' . asset('assets/js/data-table.js') . '"></script>
    <script>
        function openPaymentModal() {
            document.getElementById("payment-modal").classList.remove("hidden");
        }
        function closePaymentModal() {
            document.getElementById("payment-modal").classList.add("hidden");
        }
        
        if (document.getElementById("payment-table") && typeof simpleDatatables.DataTable !== \'undefined\') {
            const dataTable = new simpleDatatables.DataTable("#payment-table", {
                searchable: false,
                perPageSelect: false
            });
        }
    </script>';
@endphp

<style>
    #payment-table tbody td {
        width: auto !important;
        padding-top: 0.55rem !important;
        padding-bottom: 0.55rem !important;
        padding-left: 1rem !important;
        padding-right: 1rem !important;
    }
</style>

@section('content')

    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <div class="card border-0 overflow-hidden">
                <div class="card-header">
                    <h6 class="card-title mb-0 text-lg">Payment Collection List</h6>
                </div>
                <div class="card-body px-6 py-4">
    <div class="w-full flex items-center gap-6 bg-white dark:bg-neutral-700 border border-neutral-300 dark:border-neutral-600 rounded-xl px-4 py-3">
                        <!-- Filter By -->
                       
        <!-- Search -->
        <div class="flex items-center gap-2 max-w-md w-[250px]">
            <iconify-icon icon="ion:search-outline" class="text-neutral-500 text-lg"></iconify-icon>
            <input 
                type="text" 
                class="form-control bg-white dark:bg-neutral-800 border border-neutral-300 dark:border-neutral-600 
                       rounded-lg px-3 py-1.5 text-sm w-full"
                placeholder="Search..."
            >
        </div>

        <!-- Select Group -->
        <div class="flex items-center gap-3 border-l border-neutral-300 dark:border-neutral-600 pl-6">
            <span class="text-neutral-800 dark:text-white whitespace-nowrap w-[130px]" >
                Select Group
            </span>

            <select 
                class="form-select bg-white dark:bg-neutral-800 border border-neutral-300 dark:border-neutral-600 
                       text-neutral-700 dark:text-neutral-300 rounded-lg px-3 py-1.5 text-sm cursor-pointer 
                       w-[120px]">
                <option>All Groups</option>
                <option>Gold Scheme A</option>
                <option>Silver Pot B</option>
            </select>
        </div>

        <!-- Select Month -->
        <div class="flex items-center gap-3 border-l border-neutral-300 dark:border-neutral-600 pl-6">
            <span class="text-neutral-800 dark:text-white whitespace-nowrap w-[130px]" >
                Select Month
            </span>

            <input 
                type="month" 
                class="form-control bg-white dark:bg-neutral-800 border border-neutral-300 dark:border-neutral-600 
                       rounded-lg px-3 py-1.5 text-sm w-[120px]"
            >
        </div>

        <!-- Reset Filter -->
        <button 
            type="button" 
            class="ml-auto flex items-center gap-1 text-red-500 font-medium hover:text-red-600">
            <iconify-icon icon="mdi:refresh"></iconify-icon>
            Reset
        </button>

    </div>
</div>

                <div class="card-body">
                    <table id="payment-table" class="w-full border border-neutral-200 dark:border-neutral-600 rounded-lg border-separate">
                        <thead>
                            <tr>
                                <th scope="col" class="text-neutral-800 dark:text-white">S.No</th>
                                <th scope="col" class="text-neutral-800 dark:text-white">Group Name</th>
                                <th scope="col" class="text-neutral-800 dark:text-white">Customer Name</th>
                                <th scope="col" class="text-neutral-800 dark:text-white">Phone Number</th>
                                <th scope="col" class="text-neutral-800 dark:text-white">Auction</th>
                                <th scope="col" class="text-neutral-800 dark:text-white">Paid Amount</th>
                                <th scope="col" class="text-neutral-800 dark:text-white">Balance</th>
                                <th scope="col" class="text-neutral-800 dark:text-white">Action</th>
                                <th scope="col" class="text-neutral-800 dark:text-white">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Data Row 1 -->
                            <tr>
                                <td>01</td>
                                <td>Gold Scheme A</td>
                                <td>
                                    <div class="flex items-center">
                                        <h6 class="text-base mb-0 font-medium grow">John Doe</h6>
                                    </div>
                                </td>
                                <td>9876543210</td>
                                <td><span class="badge bg-success-100 text-success-600 rounded-full px-3 py-1">6/10</span></td>
                                <td>₹500.00</td>
                                <td>₹4500.00</td>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('paymentView', ['id' => 1]) }}" class="w-8 h-8 bg-primary-50 dark:bg-primary-600/10 text-primary-600 dark:text-primary-400 rounded-full inline-flex items-center justify-center" title="View" >
                                            <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                        </a>
                                        <button type="button" onclick="openPaymentModal()" class="w-8 h-8 bg-primary-50 dark:bg-primary-600/10 text-primary-600 dark:text-primary-400 rounded-full inline-flex items-center justify-center" title="Payment"style="background: #1dde1db5;">
                                             <iconify-icon icon="mdi:currency-rupee" class="text-white text-2xl"></iconify-icon>
                                        </button>
                                    </div>
                                </td>
                                <td><span class="badge bg-warning-100 text-warning-600 rounded-full px-3 py-1">Partially Paid</span></td>
                            </tr>
                             <!-- Sample Data Row 2 -->
                             <tr>
                                <td>02</td>
                                <td>Silver Pot B</td>
                                <td>
                                    <div class="flex items-center">
                                        <h6 class="text-base mb-0 font-medium grow">Jane Smith</h6>
                                    </div>
                                </td>
                                <td>1234567890</td>
                                <td><span class="badge bg-warning-100 text-warning-600 rounded-full px-3 py-1">Pending</span></td>
                                <td>$0.00</td>
                                <td>$2000.00</td>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('paymentView', ['id' => 2]) }}" class="w-8 h-8 bg-primary-50 dark:bg-primary-600/10 text-primary-600 dark:text-primary-400 rounded-full inline-flex items-center justify-center" title="View">
                                            <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                        </a>
                                       <button type="button" onclick="openPaymentModal()" class="w-8 h-8 bg-primary-50 dark:bg-primary-600/10 text-primary-600 dark:text-primary-400 rounded-full inline-flex items-center justify-center" title="Payment"style="background: #1dde1db5;">
                                             <iconify-icon icon="mdi:currency-rupee" class="text-white text-2xl" ></iconify-icon>
                                        </button>
                                        
                                    </div>
                                </td>
                                <td><span class="badge bg-danger-100 text-danger-600 rounded-full px-3 py-1">Not Paid</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

<!-- Payment Modal -->
<div id="payment-modal" class="fixed inset-0 z-50 hidden flex justify-center items-center bg-black/30 backdrop-blur-sm">
    <div class="relative bg-white rounded-lg shadow dark:bg-neutral-700" style="width: 505px;">
        <!-- Header -->
        <div class="flex items-center justify-between p-4 border-b border-neutral-200 dark:border-neutral-600">
            <h3 class="text-xl font-semibold text-neutral-900 dark:text-white">Enter Payment Amount</h3>
            <button type="button" onclick="closePaymentModal()" class="text-neutral-400 hover:bg-neutral-200 hover:text-neutral-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-neutral-600 dark:hover:text-white">
                <iconify-icon icon="mingcute:close-line" class="text-xl"></iconify-icon>
            </button>
        </div>
        <!-- Body -->
        <div class="p-6">
            <div class="mb-4">
                <label for="payment-amount" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Amount</label>
                <input type="number" id="payment-amount" class="form-control rounded-lg w-full" placeholder="Enter amount">
            </div>
            <button type="button" onclick="closePaymentModal()" class="w-full text-white bg-primary-600 hover:bg-primary-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Submit Payment
            </button>
        </div>
    </div>
</div>
