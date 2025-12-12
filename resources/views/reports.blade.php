@extends('layout.layout')
@php
    $title='Reports';
    $subTitle = 'Financial Overview';
    $script = '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById("revenueChart").getContext("2d");
        new Chart(ctx, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                datasets: [{
                    label: "Monthly Collection",
                    data: [12000, 19000, 3000, 5000, 2000, 30000],
                    borderColor: "#4f46e5",
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>';
@endphp

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-6">
        <!-- Summary Cards -->
        <div class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-cyan-600/10 to-white">
            <div class="card-body p-5">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="font-medium text-neutral-900 dark:text-white mb-1">Total Collection</p>
                        <h6 class="mb-0 dark:text-white">$125,000</h6>
                    </div>
                    <div class="w-[50px] h-[50px] bg-cyan-600 rounded-full flex justify-center items-center">
                        <iconify-icon icon="heroicons:banknotes" class="text-white text-2xl"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-purple-600/10 to-bg-white">
            <div class="card-body p-5">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="font-medium text-neutral-900 dark:text-white mb-1">Pending Clearance</p>
                        <h6 class="mb-0 dark:text-white">$15,000</h6>
                    </div>
                    <div class="w-[50px] h-[50px] bg-purple-600 rounded-full flex justify-center items-center">
                        <iconify-icon icon="heroicons:clock" class="text-white text-2xl"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>

         <div class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-blue-600/10 to-bg-white">
            <div class="card-body p-5">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="font-medium text-neutral-900 dark:text-white mb-1">Active Chits</p>
                        <h6 class="mb-0 dark:text-white">45</h6>
                    </div>
                    <div class="w-[50px] h-[50px] bg-blue-600 rounded-full flex justify-center items-center">
                        <iconify-icon icon="heroicons:document-text" class="text-white text-2xl"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-success-600/10 to-bg-white">
            <div class="card-body p-5">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="font-medium text-neutral-900 dark:text-white mb-1">Total Members</p>
                        <h6 class="mb-0 dark:text-white">320</h6>
                    </div>
                    <div class="w-[50px] h-[50px] bg-success-600 rounded-full flex justify-center items-center">
                        <iconify-icon icon="heroicons:users" class="text-white text-2xl"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6">
        <!-- Main Chart -->
        <div class="col-span-12 lg:col-span-8">
            <div class="card border-0">
                <div class="card-header border-b border-neutral-200 dark:border-neutral-600 py-4 px-6">
                    <h6 class="card-title mb-0 text-lg font-semibold text-neutral-900 dark:text-white">Monthly Collection Trend</h6>
                </div>
                <div class="card-body p-6">
                    <div class="h-[350px]">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity Table -->
        <div class="col-span-12 lg:col-span-4">
             <div class="card border-0 h-full">
                <div class="card-header border-b border-neutral-200 dark:border-neutral-600 py-4 px-6 flex justify-between items-center">
                    <h6 class="card-title mb-0 text-lg font-semibold text-neutral-900 dark:text-white">Recent Transactions</h6>
                    <a href="javascript:void(0)" class="text-primary-600 text-sm hover:underline">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                         <table class="table w-full text-start">
                            <tbody>
                                <tr class="border-b border-neutral-200 dark:border-neutral-600 hover:bg-neutral-50 dark:hover:bg-neutral-800">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
                                                <iconify-icon icon="heroicons:arrow-down-left"></iconify-icon>
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-neutral-900 dark:text-white mb-0">Payment Received</p>
                                                <span class="text-xs text-neutral-500">Gold Scheme A</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-end">
                                        <span class="text-green-600 font-medium">+$500</span>
                                        <p class="text-xs text-neutral-500 mb-0">Today, 10:30 AM</p>
                                    </td>
                                </tr>
                                <tr class="border-b border-neutral-200 dark:border-neutral-600 hover:bg-neutral-50 dark:hover:bg-neutral-800">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                                                <iconify-icon icon="heroicons:arrow-path"></iconify-icon>
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-neutral-900 dark:text-white mb-0">Chit Created</p>
                                                <span class="text-xs text-neutral-500">Silver Pot B</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-end">
                                        <span class="text-neutral-900 dark:text-white font-medium">New</span>
                                        <p class="text-xs text-neutral-500 mb-0">Yesterday</p>
                                    </td>
                                </tr>
                                 <tr class="border-b border-neutral-200 dark:border-neutral-600 hover:bg-neutral-50 dark:hover:bg-neutral-800">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center">
                                                <iconify-icon icon="heroicons:exclamation-triangle"></iconify-icon>
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-neutral-900 dark:text-white mb-0">Payment Due</p>
                                                <span class="text-xs text-neutral-500">Mr. John Doe</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-end">
                                        <span class="text-yellow-600 font-medium">$200</span>
                                        <p class="text-xs text-neutral-500 mb-0">2 days ago</p>
                                    </td>
                                </tr>
                                 <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-800">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
                                                <iconify-icon icon="heroicons:arrow-down-left"></iconify-icon>
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-neutral-900 dark:text-white mb-0">Payment Received</p>
                                                <span class="text-xs text-neutral-500">Diamond Plan</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-end">
                                        <span class="text-green-600 font-medium">+$1,200</span>
                                        <p class="text-xs text-neutral-500 mb-0">3 days ago</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
