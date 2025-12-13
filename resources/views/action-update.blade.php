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
            <form action="{{ route('actionUpdateCustomerList') }}" method="GET">
                <div class="grid grid-cols-1 gap-5">
                    <!-- Group Name -->
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">Group Name</label>
                        <select id="group-name" class="form-control rounded-lg w-full" onchange="updateGroupValue()">
                            <option value="" data-value="0">Select Group</option>
                            <option value="Gracious Group" data-value="3000000">Gracious Group</option>
                            <option value="Gold Scheme A" data-value="500000">Gold Scheme A</option>
                            <option value="Silver Pot B" data-value="200000">Silver Pot B</option>
                        </select>
                    </div>

                    <!-- Group Value (Auto-populated) -->
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">Group Value</label>
                        <input type="text" id="group-value" class="form-control rounded-lg w-full bg-neutral-100 dark:bg-neutral-700" readonly>
                    </div>

                    <!-- Auction Count -->
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">Auction Count</label>
                        <select id="auction-count" class="form-control rounded-lg w-full" onchange="updatePreview()">
                            <option value="">Select Count</option>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- Auction Completed -->
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">Auction Completed Amount</label>
                        <input type="number" id="auction-completed" class="form-control rounded-lg w-full" placeholder="Enter amount" oninput="updatePreview()">
                    </div>

                    <!-- Dividend -->
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">Dividend</label>
                        <input type="number" id="dividend" class="form-control rounded-lg w-full" placeholder="Enter dividend" oninput="updatePreview()">
                    </div>

                    <!-- Payable Amount -->
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">Payable Amount</label>
                        <input type="number" id="payable-amount" class="form-control rounded-lg w-full" placeholder="Enter amount" oninput="updatePreview()">
                    </div>

                    <!-- Last Date -->
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">Last Date</label>
                        <input type="date" id="last-date" class="form-control rounded-lg w-full" onchange="updatePreview()">
                    </div>

                    <!-- Successful Bidder -->
                    <div>
                        <label class="block text-sm font-medium text-neutral-900 dark:text-white mb-2">Successful Bidder</label>
                        <input type="text" id="successful-bidder" class="form-control rounded-lg w-full" placeholder="Enter bidder name" oninput="updatePreview()">
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
        <div class="card-body px-6 py-8 flex items-center justify-center bg-neutral-50 dark:bg-neutral-800" style="
    padding: 4px;
">
            <div id="preview-card" class="bg-white dark:bg-neutral-700 p-8 rounded-xl shadow-sm w-full max-w-md text-center border border-neutral-200 dark:border-neutral-600">
                <h4 class="text-xl font-bold text-primary-600 mb-1">Aram Enterprises</h4>
                <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-6">Save Money & Live Better</p>

                <div class="space-y-3 text-left" style="
    padding: 0px 40px 40px 40px;
">
                    <div class="flex justify-between">
                        <span class="font-medium text-neutral-600 dark:text-neutral-300">Group:</span>
                        <span class="font-semibold text-neutral-900 dark:text-white" id="prev-group">Gracious Group : 10 months</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-neutral-600 dark:text-neutral-300">Date:</span>
                        <span class="font-semibold text-neutral-900 dark:text-white" id="prev-date">{{ date('d/m/Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-neutral-600 dark:text-neutral-300">Chit Amount:</span>
                        <span class="font-semibold text-neutral-900 dark:text-white" id="prev-chit">3,00,000</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-neutral-600 dark:text-neutral-300">Month:</span>
                        <span class="font-semibold text-neutral-900 dark:text-white" id="prev-month">1st</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-neutral-600 dark:text-neutral-300">Auction:</span>
                        <span class="font-semibold text-neutral-900 dark:text-white" id="prev-auction">75,000</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-neutral-600 dark:text-neutral-300">Dividend:</span>
                        <span class="font-semibold text-neutral-900 dark:text-white" id="prev-dividend">6,800</span>
                    </div>
                    <div class="flex justify-between border-t border-dashed border-neutral-300 dark:border-neutral-500 pt-2 mt-2">
                        <span class="font-bold text-neutral-800 dark:text-white">Payable Amount:</span>
                        <span class="font-bold text-primary-600" id="prev-payable">23,200</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-neutral-600 dark:text-neutral-300">Last Date:</span>
                        <span class="font-semibold text-neutral-900 dark:text-white" id="prev-last-date">22/06/2025</span>
                    </div>
                    <div class="mt-4 pt-2 border-t border-neutral-200 dark:border-neutral-600 text-center">
                        <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-1">Successful Bidder</p>
                        <h6 class="font-bold text-neutral-900 dark:text-white" id="prev-bidder">Mahalakshmi Traders</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateGroupValue() {
        const select = document.getElementById('group-name');
        const value = select.options[select.selectedIndex].getAttribute('data-value');
        const text = select.options[select.selectedIndex].text;
        
        document.getElementById('group-value').value = new Intl.NumberFormat('en-IN').format(value);
        
        if(text !== 'Select Group') {
            document.getElementById('prev-group').innerText = text + " : 10 months"; // Assuming 10 months for demo
            document.getElementById('prev-chit').innerText = new Intl.NumberFormat('en-IN').format(value);
        }
        updatePreview();
    }

    function updatePreview() {
        const auctionCount = document.getElementById('auction-count').value;
        const auctionCompleted = document.getElementById('auction-completed').value;
        const dividend = document.getElementById('dividend').value;
        const payableAmount = document.getElementById('payable-amount').value;
        const lastDate = document.getElementById('last-date').value;
        const bidder = document.getElementById('successful-bidder').value;

        if(auctionCount) {
            const suffixes = ["th", "st", "nd", "rd"];
            const v = auctionCount % 100;
            const suffix = suffixes[(v - 20) % 10] || suffixes[v] || suffixes[0];
            document.getElementById('prev-month').innerText = auctionCount + suffix;
        }

        if(auctionCompleted) document.getElementById('prev-auction').innerText = new Intl.NumberFormat('en-IN').format(auctionCompleted);
        if(dividend) document.getElementById('prev-dividend').innerText = new Intl.NumberFormat('en-IN').format(dividend);
        if(payableAmount) document.getElementById('prev-payable').innerText = new Intl.NumberFormat('en-IN').format(payableAmount);
        
        if(lastDate) {
            const dateObj = new Date(lastDate);
            const day = String(dateObj.getDate()).padStart(2, '0');
            const month = String(dateObj.getMonth() + 1).padStart(2, '0');
            const year = dateObj.getFullYear();
            document.getElementById('prev-last-date').innerText = `${day}/${month}/${year}`;
        }

        if(bidder) document.getElementById('prev-bidder').innerText = bidder;
        
        // Calculate Dividend (Mock logic: (Chit Amount - Auction Amount) / 100 or similar, but user gave static example 6800)
        // For now, let's just leave the static 6,800 or calculate if logic provided. 
        // User example: Chit 3,00,000, Auction 75,000, Dividend 6,800. 
        // 300000 - 75000 = 225000. 225000 / ? = 6800. 
        // Let's keep it static or simple calculation if needed.
    }
</script>
@endsection
