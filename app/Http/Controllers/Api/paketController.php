<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paket;
use App\Http\Resources\paketResource;


class PaketController extends Controller
{
    public function getAll()
    {
        $data = Paket::latest()->get();
        return response()->json([paketResource::collection($data), 'Paket fetched.']);
    }

    public function getOnebyId($id)
    {
        $data = Paket::find($id);
        if (is_null($data)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new paketResource($data)]);
    }
    public function getOneByKode($kode_paket)
    {
        $data = Paket::find($kode_paket);
        if (is_null($data)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'berhasil mengambil data salah satu paket',
            'data' =>  new paketResource($data)
        ]);
    }
}
