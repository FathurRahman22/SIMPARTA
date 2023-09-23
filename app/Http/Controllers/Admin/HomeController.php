<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\DataprofilController; // Import DataprofilController
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DataKunjunganController;
use App\Models\DataKunjungan;
use App\Models\Dataprofil;
use Auth;


class HomeController
{
    public function index()
    {
        $user = Auth::user();
        $dataKunjungan = DataKunjungan::latest()->first();
        $dataprofilsController = new DataprofilController();
        $dataprofils = $dataprofilsController->getDataprofilData();
        $categoryTotals = $dataprofilsController->getCategoryTotals();
        $dataKunjunganController = new DataKunjunganController();
        $categoryTotalsDKW = $dataKunjunganController->getCategoryTotals();
        
        $filters = [];
        if (!is_null($user->roles[0]->title) && $user->roles[0]->title !== 'Admin') {
            $filters = [
                ['tag_id', '=', $user->tag_id]
            ];
        }
    
        $dataKunjungans = DataKunjungan::whereHas('dataprofil', function ($query) use ($filters) {
            $query->where($filters);
        })->get();
     // Retrieve dataprofils that match the user's tag_id
     $dataprofils = Dataprofil::where($filters)->get();

     return view('home', compact('dataKunjungan', 'dataprofils', 'categoryTotals', 'categoryTotalsDKW', 'dataKunjungans', 'user'));
    }
    
}