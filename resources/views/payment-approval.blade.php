@extends('layout.layout')
@php
    $title='Payment Approval';
    $subTitle = 'Payment Approval List';
    $script='<script src="' . asset('assets/js/data-table.js') . '"></script>
    <script>
        function openProofModal() {
            document.getElementById("proof-modal").classList.remove("hidden");
        }
        function closeProofModal() {
            document.getElementById("proof-modal").classList.add("hidden");
        }
    </script>';
@endphp

@section('content')

    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <div class="card border-0 overflow-hidden">
                <div class="card-header">
                    <h6 class="card-title mb-0 text-lg">Payment Approval List</h6>
                </div>
                <div class="card-body px-6 py-4">
                    <!-- Filter Section (Standardized) -->

                </div>
                <div class="card-body">
                    <table id="selection-table" class="border border-neutral-200 dark:border-neutral-600 rounded-lg border-separate">
                        <thead>
                            <tr>
                                <th scope="col" class="text-neutral-800 dark:text-white">S.No</th>
                                <th scope="col" class="text-neutral-800 dark:text-white">Group Name</th>
                                <th scope="col" class="text-neutral-800 dark:text-white">Customer Name</th>
                                <th scope="col" class="text-neutral-800 dark:text-white">Mobile Number</th>
                                <th scope="col" class="text-neutral-800 dark:text-white">Paid Amount</th>
                                <th scope="col" class="text-neutral-800 dark:text-white">Proof</th>
                                <th scope="col" class="text-neutral-800 dark:text-white">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chitDetails as $index => $chit)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $chit->group->chit_name }}</td>
                                    <td>{{ $chit->user->name ?? 'N/A' }}</td>
                                    <td>{{ $chit->user->mobile ?? 'N/A' }}</td>
                                    <td>₹{{ number_format($chit->amount, 2) }}</td>
                                    <td>
                                        <button type="button" onclick="openProofModal({{ $chit->id }})" class="btn btn-sm btn-primary-600 text-white px-3 py-1.5 rounded-full" title="View Proof">
                                            View
                                        </button>
                                    </td>
                                    <td>
                                        @if($chit->status == 'pending')
                                            <span class="badge bg-warning-100 text-warning-600 rounded-full px-3 py-1">Pending</span>
                                        @elseif($chit->status == 'approved')
                                            <span class="badge bg-success-100 text-success-600 rounded-full px-3 py-1">Approved</span>
                                        @else
                                            <span class="badge bg-danger-100 text-danger-600 rounded-full px-3 py-1">Rejected</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

<!-- Proof Modal -->
<div id="proof-modal" class="fixed inset-0 z-50 hidden flex justify-center items-center bg-black/30 backdrop-blur-sm">
    <div class="relative bg-white rounded-lg shadow dark:bg-neutral-700" style="width: 505px;">
        <!-- Header -->
        <div class="flex items-center justify-between p-4 border-b border-neutral-200 dark:border-neutral-600">
            <h3 class="text-xl font-semibold text-neutral-900 dark:text-white">Payment Proof</h3>
            <button type="button" onclick="closeProofModal()" class="text-neutral-400 hover:bg-neutral-200 hover:text-neutral-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-neutral-600 dark:hover:text-white">
                <iconify-icon icon="mingcute:close-line" class="text-xl"></iconify-icon>
            </button>
        </div>
        <!-- Body -->
        <div class="p-6 text-center">

    <!-- Image -->
    <div class="mb-4">
        <img src="{{ asset('assets/images/user.png') }}" 
             alt="Proof" 
             class="max-w-full h-auto mx-auto rounded-lg border border-neutral-200 dark:border-neutral-600">
    </div>

    <!-- Paid Amount -->
    <div class="text-lg font-semibold text-neutral-900 dark:text-white mb-4">
        Paid Amount: <span class="text-primary-600">₹500.00</span>
    </div>

    <!-- Action Buttons -->
   <div class="flex gap-3 w-full mt-4">

    <!-- Approve -->
    <button 
        type="button"
        class="w-full bg-green-600 text-white font-medium rounded-lg 
               text-sm px-5 py-2.5 transition-colors duration-200"style="
    background: green;
"
    >
        Approve
    </button>

    <!-- Denied -->
    <button 
        type="button"
        class="w-full bg-red-600 hover:bg-red-400 text-white font-medium rounded-lg 
               text-sm px-5 py-2.5 transition-colors duration-200"
    >
        Denied
    </button>

</div>


    <!-- Close Button -->
    <button 
        type="button" 
        onclick="closeProofModal()" 
        class="mt-4 w-full text-white bg-primary-600 hover:bg-primary-700 font-medium rounded-lg text-sm px-5 py-2.5"
    >
        Close
    </button>

</div>

    </div>
</div>
