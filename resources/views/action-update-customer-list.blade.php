@extends('layout.layout')
@php
    $title='Action Update - Customer List';
    $subTitle = 'Notify Customers';
    $script='<script src="' . asset('assets/js/data-table.js') . '"></script>';
@endphp

@section('content')
<div class="grid grid-cols-12">
    <div class="col-span-12">
        <div class="card border-0 overflow-hidden">
            <div class="card-header">
                <h6 class="card-title mb-0 text-lg">Customer List</h6>
            </div>
            <div class="card-body">
                <table id="selection-table" class="border border-neutral-200 dark:border-neutral-600 rounded-lg border-separate">
                    <thead>
                        <tr>
                            <th scope="col" class="text-neutral-800 dark:text-white">S.No</th>
                            <th scope="col" class="text-neutral-800 dark:text-white">Customer Name</th>
                            <th scope="col" class="text-neutral-800 dark:text-white">Phone Number</th>
                            <th scope="col" class="text-neutral-800 dark:text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // Mock Data
                            $customers = [
                                ['name' => 'John Doe', 'phone' => '9876543210'],
                                ['name' => 'Jane Smith', 'phone' => '1234567890'],
                                ['name' => 'Mike Ross', 'phone' => '5556667777'],
                            ];
                            
                            // Message Template
                            $message = "Aram Enterprises%0ASave Money & Live Better%0A%0AGracious Group : 10 months%0ADate : 15/06/2025%0AChit amount : 3,00,000%0AMonth : 1st%0AAuction : 75,000%0ADividend : 6,800%0APayable amount : 23,200%0ALast date : 22/06/2025%0ASuccessful Bidder : Mahalakshmi Traders";
                        @endphp

                        @foreach($customers as $index => $customer)
                        <tr>
                            <td>{{ sprintf('%02d', $index + 1) }}</td>
                            <td>
                                <div class="flex items-center">
                                    <h6 class="text-base mb-0 font-medium grow">{{ $customer['name'] }}</h6>
                                </div>
                            </td>
                            <td>{{ $customer['phone'] }}</td>
                            <td>
                                <a href="https://wa.me/{{ $customer['phone'] }}?text={{ $message }}" target="_blank" class="inline-block transition-transform hover:scale-110">
                                    <img src="{{ asset('assets/images/chat/whatsapp.png') }}" alt="WhatsApp" class="w-8 h-8">
                                </a>
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
