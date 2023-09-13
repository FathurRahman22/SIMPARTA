<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\DataprofilController; // Import DataprofilController
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
       
        $dataprofilsController = new DataprofilController();
        $dataprofils = $dataprofilsController->getDataprofilData();

        $categoryTotals = $dataprofilsController->getCategoryTotals();

        return view('home', compact('dataprofils', 'categoryTotals'));
    }
}