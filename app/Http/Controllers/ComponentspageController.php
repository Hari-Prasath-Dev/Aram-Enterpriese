<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\BankDetail;
use Illuminate\Http\Request;

class ComponentspageController extends Controller
{
    public function imageUpload($id)
    {
        $bankDetail = BankDetail::where('user_id', $id)->first();

        return view('image-upload', compact('id', 'bankDetail'));
    }


    public function storeBankDetails(Request $request, $userId)
    {
        $bankDetail = BankDetail::where('user_id', $userId)->first();

        $data = $request->except('_token');

        $files = [
            'bank_statement',
            'aadhar_front',
            'aadhar_back',
            'pan_card',
            'cibil_score',
            'other_proof'
        ];

        foreach ($files as $fileField) {

            // Remove file
            if ($request->input('remove_'.$fileField) == 1 && $bankDetail?->$fileField) {
                if (file_exists(public_path($bankDetail->$fileField))) {
                    unlink(public_path($bankDetail->$fileField));
                }
                $data[$fileField] = null;
            }

            // Upload new file
            if ($request->hasFile($fileField)) {
                $fileName = time().'_'.$fileField.'.'.$request->file($fileField)->extension();
                $request->file($fileField)->move(public_path('uploads'), $fileName);
                $data[$fileField] = 'uploads/'.$fileName;
            }
        }

        $data['user_id'] = $userId;

        BankDetail::updateOrCreate(
            ['user_id' => $userId],
            $data
        );

        return redirect()->route('customerCreation')->with('success', 'Bank details updated successfully!');

    }

}
