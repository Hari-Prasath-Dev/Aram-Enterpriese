@extends('layout.layout')
@php
    $title='Action Update';
    $subTitle = 'Update Action Details';
@endphp

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Form Section -->
    <div class="card h-full border-0 overflow-hidden">
        <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6">
            <h6 class="text-lg font-semibold text-neutral-900 dark:text-white">Action Details</h6>
        </div>
        <div class="card-body px-6 py-8">
            <form action="{{ route('auction.storeOrUpdate') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-5">
                    <!-- Group Name -->
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">
                            Group Name
                        </label>
                        <select id="group-name" name="group_id" class="form-control rounded-lg w-full" onchange="updateGroupValue()">
                            <option value="">Select Group</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}" data-value="{{ $group->amount }}" data-duration="{{ $group->duration_months }}">
                                    {{ $group->chit_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Group Value (Auto-populated) -->
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">Group Value</label>
                        <input type="text" id="group-value" class="form-control rounded-lg w-full bg-neutral-100 dark:bg-neutral-700" readonly>
                    </div>

                    <!-- Auction Count -->
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">
                            Auction Count
                        </label>

                        <select id="auction-count"
                                name="auction_count"
                                class="form-control rounded-lg w-full"
                                onchange="updatePreview()">

                            <option value="">Select Count</option>

                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>


                    <!-- Auction Completed -->
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">
                            Auction Completed Amount
                        </label>
                        <input type="number" name="auction_completed_amount" id="auction-completed" 
                            class="form-control rounded-lg w-full" 
                            placeholder="Enter amount" 
                            oninput="updatePreview()" 
                            value="">
                    </div>


                    <!-- Dividend -->
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">Dividend</label>
                        <input type="number" name="dividend" id="dividend" class="form-control rounded-lg w-full" placeholder="Enter dividend" value="" oninput="updatePreview()">
                    </div>

                    <!-- Payable Amount -->
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">Payable Amount</label>
                        <input type="number" name="payable_amount" id="payable-amount" class="form-control rounded-lg w-full" placeholder="Enter amount" value="" oninput="updatePreview()">
                    </div>

                    <!-- Last Date -->
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">Last Date</label>
                        <input type="date" name="last_date" id="last-date" value="" class="form-control rounded-lg w-full" onchange="updatePreview()">
                    </div>

                    <!-- Successful Bidder -->
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">Successful Bidder</label>
                        <input type="text" name="successful_bidder" id="successful-bidder" class="form-control rounded-lg w-full" placeholder="Enter bidder name" value="" oninput="updatePreview()">
                    </div>

                    <div class="flex gap-3 mt-4">
                        <button type="submit" class="btn btn-primary-600 text-white w-full rounded-lg py-2.5">Submit</button>
                        <a href="{{ route('index') }}" class="btn bg-neutral-200 text-neutral-700 hover:bg-neutral-300 w-full rounded-lg py-2.5 text-center">Close</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Preview Section -->
    <div class="card h-full border-0 overflow-hidden">
        <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6">
            <h6 class="text-lg font-semibold text-neutral-900 dark:text-white">Preview</h6>
        </div>
        <div class="card-body px-6 py-8 flex items-center justify-center bg-neutral-50 dark:bg-neutral-800" style="padding: 4px;">
            <div id="preview-card" class="bg-white dark:bg-neutral-700 p-8 rounded-xl shadow-sm w-full max-w-md text-center border border-neutral-200 dark:border-neutral-600">
                <h4 class="text-xl font-bold text-primary-600 mb-1">Aram Enterprises</h4>
                <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-6">Save Money & Live Better</p>

                <div class="space-y-3 text-left" style="padding: 0px 40px 40px 40px;">
                    <div class="flex justify-between">
                        <span class="font-medium text-neutral-600 dark:text-neutral-300">Group:</span>
                        <span class="font-semibold text-neutral-900 dark:text-white" id="prev-group">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-neutral-600 dark:text-neutral-300">Date:</span>
                        <span class="font-semibold text-neutral-900 dark:text-white" id="prev-date">{{ date('d/m/Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-neutral-600 dark:text-neutral-300">Chit Amount:</span>
                        <span class="font-semibold text-neutral-900 dark:text-white" id="prev-chit">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-neutral-600 dark:text-neutral-300">Month:</span>
                        <span class="font-semibold text-neutral-900 dark:text-white" id="prev-month">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-neutral-600 dark:text-neutral-300">Auction:</span>
                        <span class="font-semibold text-neutral-900 dark:text-white" id="prev-auction">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-neutral-600 dark:text-neutral-300">Dividend:</span>
                        <span class="font-semibold text-neutral-900 dark:text-white" id="prev-dividend">-</span>
                    </div>
                    <div class="flex justify-between border-t border-dashed border-neutral-300 dark:border-neutral-500 pt-2 mt-2">
                        <span class="font-bold text-neutral-800 dark:text-white">Payable Amount:</span>
                        <span class="font-bold text-primary-600" id="prev-payable">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-neutral-600 dark:text-neutral-300">Last Date:</span>
                        <span class="font-semibold text-neutral-900 dark:text-white" id="prev-last-date">-</span>
                    </div>
                    <div class="mt-4 pt-2 border-t border-neutral-200 dark:border-neutral-600 text-center">
                        <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Successful Bidder</p>
                        <h6 class="font-bold text-neutral-900 dark:text-white" id="prev-bidder">-</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateGroupValue() {
        const select = document.getElementById('group-name');
        const option = select.options[select.selectedIndex];

        if (!option.value) {
            document.getElementById('group-value').value = '';
            document.getElementById('prev-group').innerText = '-';
            document.getElementById('prev-chit').innerText = '-';
            document.getElementById('prev-month').innerText = '-';
            return;
        }

        const chitAmount = option.dataset.value;
        const duration = option.dataset.duration;
        const groupName = option.text;

        // Form field
        document.getElementById('group-value').value =
            new Intl.NumberFormat('en-IN').format(chitAmount);

        // Preview
        document.getElementById('prev-group').innerText =
            `${groupName} (${duration} months)`;

        document.getElementById('prev-chit').innerText =
            new Intl.NumberFormat('en-IN').format(chitAmount);
    }

    function updatePreview() {
    const auctionCount = document.getElementById('auction-count').value;
    const auctionCompleted = document.getElementById('auction-completed')?.value;
    const dividend = document.getElementById('dividend')?.value;
    const payableAmount = document.getElementById('payable-amount')?.value;
    const lastDate = document.getElementById('last-date')?.value;
    const bidder = document.getElementById('successful-bidder')?.value;

    // Month with suffix
    if (auctionCount) {
        const suffixes = ["th", "st", "nd", "rd"];
        const v = auctionCount % 100;
        const suffix = (suffixes[(v - 20) % 10] || suffixes[v] || suffixes[0]);
        document.getElementById('prev-month').innerText = auctionCount + suffix;
    }

    if (auctionCompleted)
        document.getElementById('prev-auction').innerText =
            new Intl.NumberFormat('en-IN').format(auctionCompleted);

    if (dividend)
        document.getElementById('prev-dividend').innerText =
            new Intl.NumberFormat('en-IN').format(dividend);

    if (payableAmount)
        document.getElementById('prev-payable').innerText =
            new Intl.NumberFormat('en-IN').format(payableAmount);

    if (lastDate) {
        const d = new Date(lastDate);
        document.getElementById('prev-last-date').innerText =
            `${String(d.getDate()).padStart(2,'0')}/${String(d.getMonth()+1).padStart(2,'0')}/${d.getFullYear()}`;
    }

    if (bidder)
        document.getElementById('prev-bidder').innerText = bidder;
}

// Trigger preview on page load to reflect existing DB values
document.addEventListener('DOMContentLoaded', updatePreview);
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const groupSelect = document.getElementById('group-name');

        if (groupSelect.value) {
            updateGroupValue(); // load chit details on page load
        }

        updatePreview(); // load other values if already filled
    });
</script>

@endsection
