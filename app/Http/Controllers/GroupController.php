<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chit;
use App\Models\ChitScheme;
use Illuminate\Http\Request;

class GroupController extends Controller
{
   
    public function store(Request $request)
    {
        // Create Chit
        $chit = Chit::create([
            'chit_name'       => $request->chit_name,
            'amount'          => $request->amount,
            'type'            => $request->type,
            'start_date'      => $request->start_date,
            'duration_months' => $request->duration_months,
            'auction_held_on' => $request->auction_held_on,
            'status'          => $request->status,
        ]);

        // Prepare scheme data for bulk insert
        $startingBids = $request->input('starting_bid', []);
        $amountPayables = $request->input('amount_payable', []);
        $dividends = $request->input('dividend', []);

        $schemes = [];

        foreach ($startingBids as $index => $bid) {
            if (!is_null($bid)) {
                $schemes[] = [
                    'chit_id'       => $chit->id,
                    'month'         => $index + 1,
                    'starting_bid'  => $bid,
                    'amount_payable'=> $amountPayables[$index] ?? 0,
                    'dividend'      => $dividends[$index] ?? 0,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ];
            }
        }

        // Bulk insert all schemes
        if (!empty($schemes)) {
            ChitScheme::insert($schemes); // <-- this is the fix
        }

        return redirect()->route('groupCreation')->with('message', 'Group Details Created successfully');
    }

    public function update(Request $request, $id)
    {
        $group = Chit::findOrFail($id);

        $group->update([
            'chit_name'        => $request->chit_name,
            'amount'           => $request->amount,
            'type'             => $request->type,
            'start_date'       => $request->start_date,
            'duration_months'  => $request->duration_months,
            'auction_held_on'  => $request->auction_held_on,
            'status'           => $request->status,
        ]);

        // Remove old schemes
        ChitScheme::where('chit_id', $group->id)->delete();

        // Save schemes correctly
        if ($request->has('schemes')) {
            foreach ($request->schemes as $month => $scheme) {

                // Skip empty rows
                if (
                    empty($scheme['starting_bid']) ||
                    empty($scheme['amount_payable'])
                ) {
                    continue;
                }

                ChitScheme::create([
                    'chit_id'        => $group->id,
                    'month'          => $month,
                    'starting_bid'   => $scheme['starting_bid'],
                    'amount_payable' => $scheme['amount_payable'],
                    'dividend'       => $scheme['dividend'] ?? 0,
                ]);
            }
        }


        return redirect()->route('groupCreation')
            ->with('success', 'Group updated successfully');
    }

    public function addMembers(Request $request)
{
    $request->validate([
        'group_id' => 'required|exists:chits,id',
        'user_ids' => 'required|array',
        'user_ids.*' => 'exists:users,id',
    ]);

    $group = Chit::findOrFail($request->group_id);

    // Prepare data with pivot info (optional: joined_at timestamp)
    $usersWithPivot = [];
    foreach ($request->user_ids as $userId) {
        $usersWithPivot[$userId] = ['joined_at' => now()];
    }

    // Attach users to the group without removing existing ones
    $group->users()->syncWithoutDetaching($usersWithPivot);

    return back()->with('success', 'Members added successfully');
}



}


