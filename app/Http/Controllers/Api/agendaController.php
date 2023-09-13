<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Agenda;


class agendaController extends Controller
{
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(),[
            // 'link' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

    }
}
