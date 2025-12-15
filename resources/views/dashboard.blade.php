@extends('layout.layout')

@php
    $title='Dashboard';
    $subTitle = 'AI';
    $script= '<script src="' . asset('assets/js/homeOneChart.js') . '"></script>';
@endphp

@section('content')




   <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 3xl:grid-cols-5 gap-6">

    <!-- Total Users -->
    <div class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-cyan-600/10 to-white">
        <div class="card-body p-5">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div>
                    <p class="font-medium text-neutral-900 dark:text-white mb-1">Total User</p>
                    <h6 class="mb-0 dark:text-white">{{ $totalUsers ?? 200 }}</h6>
                </div>
                <div class="w-[50px] h-[50px] bg-cyan-600 rounded-full flex justify-center items-center">
                    <iconify-icon icon="gridicons:multiple-users" class="text-white text-2xl"></iconify-icon>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Groups -->
        <div class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-purple-600/10 to-bg-white">
        <div class="card-body p-5">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div>
                    <p class="font-medium text-neutral-900 dark:text-white mb-1">Total Groups</p>
                    <h6 class="mb-0 dark:text-white">{{ $totalGroups ?? 300 }}</h6>
                </div>
                <div class="w-[50px] h-[50px] bg-yellow-500 rounded-full flex justify-center items-center" style="background: #bc7ff9;">
                    <img src="{{ asset('assets/images/group.png') }}" 
                    class="w-8 h-8 object-contain" 
                    alt="icon">

                </div>
            </div>
        </div>
    </div>

    <!-- Active Customers -->
     <div class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-blue-600/10 to-bg-white" >
        <div class="card-body p-5">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div>
                    <p class="font-medium text-neutral-900 dark:text-white mb-1">Active Customers</p>
                    <h6 class="mb-0 dark:text-white">{{ $activeCustomers ?? 150 }}</h6>
                </div>
                <div class="w-[50px] h-[50px] bg-green-500 rounded-full flex justify-center items-center" style="
    background: #1dde1db5;
">
                    <iconify-icon icon="mdi:account-check" class="text-white text-2xl"></iconify-icon>
                </div>
            </div>
        </div>
    </div>

    <!-- Not Active Customers -->
      <div class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-success-600/10 to-bg-white" >
        <div class="card-body p-5">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div>
                    <p class="font-medium text-neutral-900 dark:text-white mb-1">Non Active Customers</p>
                    <h6 class="mb-0 dark:text-white">{{ $inactiveCustomers ?? 50 }}</h6>
                </div>
                <div class="w-[50px] h-[50px] bg-red-500 rounded-full flex justify-center items-center" style="
    background: #de241db5;
">
                    <iconify-icon icon="mdi:account-cancel" class="text-white text-2xl"></iconify-icon>
                </div>
            </div>
        </div>
    </div>

    <!-- Paid Customers -->
 <div class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-red-600/10 to-bg-white">
        <div class="card-body p-5">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div>
                    <p class="font-medium text-neutral-900 dark:text-white mb-1">Paid Customers</p>
                    <h6 class="mb-0 dark:text-white">{{ $paidCustomers ?? 140 }}</h6>
                </div>
                <div class="w-[50px] h-[50px] bg-purple-500 rounded-full flex justify-center items-center" style="
    background: #1dde1db5;
">
                    <iconify-icon icon="mdi:currency-rupee" class="text-white text-2xl"></iconify-icon>
                </div>
            </div>
        </div>
    </div>

    <!-- Unpaid Customers -->
      <div class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-success-600/10 to-bg-white">
        <div class="card-body p-5">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div>
                    <p class="font-medium text-neutral-900 dark:text-white mb-1">Unpaid Customers</p>
                    <h6 class="mb-0 dark:text-white">{{ $unpaidCustomers ?? 10 }}</h6>
                </div>
                <div class="w-[50px] h-[50px] bg-orange-500 rounded-full flex justify-center items-center" style="
    background: #ff0b0bff;
">
                    <iconify-icon icon="mdi:alert-circle" class="text-white text-2xl"></iconify-icon>
                </div>
            </div>
        </div>
    </div>

    <!-- Next Group Date -->
        <div class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-pink-600/10 to-bg-white">
        <div class="card-body p-5">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div>
                    <p class="font-medium text-neutral-900 dark:text-white mb-1">Next Group Date</p>
                    <h6 class="mb-0 dark:text-white">{{ $nextGroupDate ?? '21/06/24' }}</h6>
                </div>
                <div class="w-[50px] h-[50px] bg-teal-500 rounded-full flex justify-center items-center" style="
    background: #fb92c0;
">
                    <iconify-icon icon="mdi:calendar-edit" class="text-white text-2xl"></iconify-icon>
                </div>
            </div>
        </div>
    </div>

    <!-- No of Admins -->
        <div class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-indigo-600/10 to-bg-white">
        <div class="card-body p-5">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div>
                    <p class="font-medium text-neutral-900 dark:text-white mb-1">No of Admins</p>
                    <h6 class="mb-0 dark:text-white">{{ $adminCount ?? '03' }}</h6>
                </div>
                <div class="w-[50px] h-[50px] bg-indigo-500 rounded-full flex justify-center items-center" style="
    background: #fe6d04;
">
                    <iconify-icon icon="mdi:account-cog" class="text-white text-2xl"></iconify-icon>
                </div>
            </div>
        </div>
    </div>

</div>


   @php
    $title='Basic Table';
    $subTitle = 'Basic Table';
@endphp



    <div class="grid grid-cols-12" style="margin-top: 20px;">
        <div class="col-span-12">
            <div class="card border-0 overflow-hidden">
                <div class="card-header">
                    <h6 class="card-title mb-0 text-lg">Recent Transactions</h6>
                </div>
                <div class="card-body">
                    <table class="border border-neutral-200 dark:border-neutral-600 rounded-lg border-separate w-full table-fixed">
                        <thead>
                            <tr>
                                <th scope="col" class="text-neutral-800 dark:text-white p-4">S.No</th>
                                <th scope="col" class="text-neutral-800 dark:text-white p-4">Date</th>
                                <th scope="col" class="text-neutral-800 dark:text-white p-4">Photo</th>
                                <th scope="col" class="text-neutral-800 dark:text-white p-4">Name</th>
                                <th scope="col" class="text-neutral-800 dark:text-white p-4">Phone Number</th>
                                <th scope="col" class="text-neutral-800 dark:text-white p-4">Group Value</th>
                                <th scope="col" class="text-neutral-800 dark:text-white p-4">Paid Amount</th>
                                <th scope="col" class="text-neutral-800 dark:text-white p-4">Transactions Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tableData as $index => $item)
                            <tr>
                                <td class="p-4">{{ $index + 1 }}</td>
                                <td class="p-4">{{ $item['date'] }}</td>
                                <td class="p-4">
                                     <img src="{{ asset($item['img']) }}" alt="" class="w-10 h-10 rounded-full object-cover">
                                </td>
                                <td class="p-4">
                                    <h6 class="text-base mb-0 font-medium">{{ $item['name'] }}</h6>
                                </td>
                                <td class="p-4">9876543210</td> <!-- Static Phone based on request for list format -->
                                <td class="p-4">Group A</td> <!-- Static Group Value -->
                                <td class="p-4">₹ {{ $item['amount'] }}</td>
                                <td class="p-4">
                                    @if($loop->iteration % 3 == 0)
                                        Cash
                                    @elseif($loop->iteration % 3 == 1)
                                        UPI
                                    @else
                                        Bank Transfer
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination Removed -->
                </div>
            </div>
        </div>
    </div>
@endsection

