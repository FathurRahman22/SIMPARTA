<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dataprofil;
use App\Http\Resources\dataprofilResource;

class DataprofilController extends Controller
{
    public function getAll()
    {
        $data = dataprofil::latest()->get();
        return response()->json([dataprofilResource::collection($data), 'dataprofil fetched.']);
    }

    public function getOnebyId($id)
    {
        $data = dataprofil::find($id);
        if (is_null($data)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new dataprofilResource($data)]);
    }
}
