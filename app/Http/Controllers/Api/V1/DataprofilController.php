<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dataprofil;
use App\Http\Resources\dataprofilResource;

class DataprofilController extends Controller
{
    public function getAll()
    {
        $data = dataprofil::latest()->get();
        return response()->json([
            'status' => 'success',
            'message' => 'berhasil mengambil data semua dataprofil',
            'data' => eventResource::collection($data)

        ]);
    }

    public function getOnebyId($id)
    {
        $data = dataprofil::find($id);
        if (is_null($data)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'berhasil mengambil data salah satu dataprofil',
            'data' =>  new eventResource($data)
        ]);
    }
}
