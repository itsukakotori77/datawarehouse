<?php

namespace App\Http\Controllers;

use App\Model\UMKM;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        // Variable
        $data = [
            'title' => 'Dashboard',
            'umkm_padalarang' => UMKM::where('Jenis_ID', '=', 1)->get()->count(),
            'umkm_lembang' => UMKM::where('Jenis_ID', '=', 2)->get()->count(),
            'umkm_batu_jajar' => UMKM::where('Jenis_ID', '=', 3)->get()->count(),
            'umkm_2017' => UMKM::whereBetween('tanggal', [
                date('Y-m-d', strtotime('2017-01-01')),    
                date('Y-m-d', strtotime('2017-12-30')),    
            ])->get()->count(),
            'umkm_2018' => UMKM::whereBetween('tanggal', [
                date('Y-m-d', strtotime('2018-01-01')),    
                date('Y-m-d', strtotime('2018-12-30')),    
            ])->get()->count(),
            'umkm_2019' => UMKM::whereBetween('tanggal', [
                date('Y-m-d', strtotime('2019-01-01')),    
                date('Y-m-d', strtotime('2019-12-30')),    
            ])->get()->count(),
            'umkm_2020' => UMKM::whereBetween('tanggal', [
                date('Y-m-d', strtotime('2020-01-01')),    
                date('Y-m-d', strtotime('2020-12-30')),    
            ])->get()->count(),

        ];

        // return
        return view('Home.dashboard', compact('data'));
    }

    public function test()
    {
        return view('layouts.app');
    }

    public function testETL()
    {

    }
}
