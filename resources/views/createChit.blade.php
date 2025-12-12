@extends('layout.layout')
@php
    $title='Create New Chit';
    $subTitle = 'Create New Chit';
@endphp

@section('content')
    <div class="grid grid-cols-1 gap-6">
        <div class="card h-full p-0 border-0 overflow-hidden">
            <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center justify-between">
                <h6 class="text-lg font-semibold mb-0">Create New Chit</h6>
                <a href="{{ route('chitCreation') }}" class="text-neutral-500 hover:text-neutral-700 dark:text-neutral-400 dark:hover:text-white">
                    <iconify-icon icon="mingcute:close-line" class="text-2xl"></iconify-icon>
                </a>
            </div>
            <div class="card-body p-6">
                <form action="{{ route('chitCreation') }}"> 
                    <!-- Note: Action pointing to list for demo purposes, would normally be a POST route -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Chit Name</label>
                            <input type="text" class="form-control rounded-lg" placeholder="Enter name">
                        </div>
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Chit Value</label>
                            <input type="number" class="form-control rounded-lg" placeholder="Enter value">
                        </div>
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Date</label>
                            <input type="date" class="form-control rounded-lg">
                        </div>
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Type</label>
                            <select class="form-control rounded-lg form-select">
                                <option>Select Type</option>
                                <option>Fixed</option>
                                <option>Auction</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-label font-semibold text-neutral-900 dark:text-white mb-2">Status</label>
                            <select class="form-control rounded-lg form-select">
                                <option>Select Status</option>
                                <option>Active</option>
                                <option>Closed</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="btn btn-primary px-6 py-2.5">Create Chit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
