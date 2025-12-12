<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            ['id' => 1, 'date' => '25 Jan 2025', 'name' => 'Kathryn Murphy', 'phone' => '(201) 555-0124', 'chit_name' => 'Chit #526534', 'amount' => '$200.00', 'img' => 'assets/images/user-list/user-list1.png'],
            ['id' => 2, 'date' => '26 Jan 2025', 'name' => 'John Doe', 'phone' => '(202) 555-0125', 'chit_name' => 'Chit #526535', 'amount' => '$250.00', 'img' => 'assets/images/user-list/user-list2.png'],
            ['id' => 3, 'date' => '27 Jan 2025', 'name' => 'Jane Smith', 'phone' => '(203) 555-0126', 'chit_name' => 'Chit #526536', 'amount' => '$300.00', 'img' => 'assets/images/user-list/user-list3.png'],
            ['id' => 4, 'date' => '28 Jan 2025', 'name' => 'Peter Jones', 'phone' => '(204) 555-0127', 'chit_name' => 'Chit #526537', 'amount' => '$350.00', 'img' => 'assets/images/user-list/user-list4.png'],
            ['id' => 5, 'date' => '29 Jan 2025', 'name' => 'Mary Johnson', 'phone' => '(205) 555-0128', 'chit_name' => 'Chit #526538', 'amount' => '$400.00', 'img' => 'assets/images/user-list/user-list5.png'],
            ['id' => 6, 'date' => '30 Jan 2025', 'name' => 'Chris Lee', 'phone' => '(206) 555-0129', 'chit_name' => 'Chit #526539', 'amount' => '$450.00', 'img' => 'assets/images/user-list/user-list1.png'],
            ['id' => 7, 'date' => '31 Jan 2025', 'name' => 'Patricia Brown', 'phone' => '(207) 555-0130', 'chit_name' => 'Chit #526540', 'amount' => '$500.00', 'img' => 'assets/images/user-list/user-list2.png'],
            ['id' => 8, 'date' => '1 Feb 2025', 'name' => 'Robert Miller', 'phone' => '(208) 555-0131', 'chit_name' => 'Chit #526541', 'amount' => '$550.00', 'img' => 'assets/images/user-list/user-list3.png'],
            ['id' => 9, 'date' => '2 Feb 2025', 'name' => 'Jennifer Wilson', 'phone' => '(209) 555-0132', 'chit_name' => 'Chit #526542', 'amount' => '$600.00', 'img' => 'assets/images/user-list/user-list4.png'],
            ['id' => 10, 'date' => '3 Feb 2025', 'name' => 'Michael Davis', 'phone' => '(210) 555-0133', 'chit_name' => 'Chit #526543', 'amount' => '$650.00', 'img' => 'assets/images/user-list/user-list5.png'],
            ['id' => 11, 'date' => '4 Feb 2025', 'name' => 'Sarah Brown', 'phone' => '(211) 555-0134', 'chit_name' => 'Chit #526544', 'amount' => '$700.00', 'img' => 'assets/images/user-list/user-list1.png'],
        ];

        $collection = new Collection($data);
        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentPageItems, count($collection), $perPage);
        $paginatedItems->setPath(request()->url());

        return view('dashboard.index', ['tableData' => $paginatedItems]);
    }
}