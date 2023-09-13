<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\DataKunjungan;

class KunjunganController extends Controller
{
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(),[
            // 'link' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $link = DataKunjungan::create([
            'link' => $request->link,
        ]);


        return response()
            ->json([
                'status' => 'success',
                'message' => 'berhasil mengsubmit link',
                'data' => $link,
            ]);
    }
}
