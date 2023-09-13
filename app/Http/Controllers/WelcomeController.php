<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\DataprofilController; 
use App\Models\Dataprofil;

class WelcomeController extends Controller
{
    public function index()
    {   
        $dataprofilsController = new DataprofilController();
        $dataprofils = $dataprofilsController->getDataprofilData();

        $categoryTotals = $this->getCategoryTotals();
        return view('welcome', compact('dataprofils','categoryTotals'));
    }

    public function getCategoryTotals()
    {
        $hotelTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Hotel dan Akomodasi Lainnya')->count();
        $dtwTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Daya Tarik Wisata')->count();
        $kafeTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Kafe')->count();
        $restoTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Restoran')->count();
        $makananTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Usaha Makanan')->count();
        $minumanTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Usaha Minuman')->count();
        $barTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Bar, Klub Malam, dan Karaoke')->count();
        $spaTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Spa dan Rumah Pijat')->count();
        $jasaTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Jasa Pariwisata')->count();
        $perkemahanTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Perkemahan dan Pondok Wisata')->count();
        $tamanTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Taman Rekreasi dan Hiburan')->count();
        $fotografiTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Aktivitas Desain dan Fotografi')->count();
        $seniTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Seni Pertunjukan')->count();
        $olahragaTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Fasilitas Olahraga')->count();

        return [
            'hotelTotal' => $hotelTotal,
            'dtwTotal' => $dtwTotal,
            'kafeTotal' => $kafeTotal,
            'restoTotal' => $restoTotal,
            'makananTotal' => $makananTotal,
            'minumanTotal' => $minumanTotal,
            'barTotal' => $barTotal,
            'spaTotal' => $spaTotal,
            'jasaTotal' => $jasaTotal,
            'perkemahanTotal' => $perkemahanTotal,
            'tamanTotal' => $tamanTotal,
            'fotografiTotal' => $fotografiTotal,
            'seniTotal' => $seniTotal,
            'olahragaTotal' => $olahragaTotal,
        ];
    }
}