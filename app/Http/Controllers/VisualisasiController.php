<?php

namespace App\Http\Controllers;

use DB;
use Datatables;
use App\Model\Reporting;
use App\Model\UMKM;
use Illuminate\Http\Request;

class VisualisasiController extends Controller
{
    public function index()
    {
        // variable
        $data = [
            // Title
            'title' => 'Dashboard',

            // UMKM Data
            'umkm_padalarang' => UMKM::where('Jenis_ID', '=', 1)->get()->count(),
            'umkm_lembang' => UMKM::where('Jenis_ID', '=', 2)->get()->count(),
            'umkm_batu_jajar' => UMKM::where('Jenis_ID', '=', 3)->get()->count(),

            // UMKM Padalarang
            'mikro_padalarang' => UMKM::leftJoin('jenis_umkm', 'jenis_umkm.Kode_Jenis', '=', 'umkm.Jenis_ID')
                                ->leftJoin('kecamatan', 'kecamatan.Kode_Kecamatan', '=', 'umkm.Kecamatan_ID')
                                ->where([
                                    ['jenis_umkm.Nama', '=', 'Mikro'],
                                    ['kecamatan.Nama', '=', 'Padalarang']
                                ])->get()->count(),
            'kecil_padalarang' => UMKM::leftJoin('jenis_umkm', 'jenis_umkm.Kode_Jenis', '=', 'umkm.Jenis_ID')
                                ->leftJoin('kecamatan', 'kecamatan.Kode_Kecamatan', '=', 'umkm.Kecamatan_ID')
                                ->where([
                                    ['jenis_umkm.Nama', '=', 'Kecil'],
                                    ['kecamatan.Nama', '=', 'Padalarang']
                                ])->get()->count(),
            'menengah_padalarang' => UMKM::leftJoin('jenis_umkm', 'jenis_umkm.Kode_Jenis', '=', 'umkm.Jenis_ID')
                                ->leftJoin('kecamatan', 'kecamatan.Kode_Kecamatan', '=', 'umkm.Kecamatan_ID')
                                ->where([
                                    ['jenis_umkm.Nama', '=', 'Menengah'],
                                    ['kecamatan.Nama', '=', 'Padalarang']
                                ])->get()->count(),
                                
            
            // Lembang
            'mikro_lembang' => UMKM::leftJoin('jenis_umkm', 'jenis_umkm.Kode_Jenis', '=', 'umkm.Jenis_ID')
                                ->leftJoin('kecamatan', 'kecamatan.Kode_Kecamatan', '=', 'umkm.Kecamatan_ID')
                                ->where([
                                    ['jenis_umkm.Nama', '=', 'Mikro'],
                                    ['kecamatan.Nama', '=', 'Lembang']
                                ])->get()->count(),
            'kecil_lembang' => UMKM::leftJoin('jenis_umkm', 'jenis_umkm.Kode_Jenis', '=', 'umkm.Jenis_ID')
                                ->leftJoin('kecamatan', 'kecamatan.Kode_Kecamatan', '=', 'umkm.Kecamatan_ID')
                                ->where([
                                    ['jenis_umkm.Nama', '=', 'Kecil'],
                                    ['kecamatan.Nama', '=', 'Lembang']
                                ])->get()->count(),
            'menengah_lembang' => UMKM::leftJoin('jenis_umkm', 'jenis_umkm.Kode_Jenis', '=', 'umkm.Jenis_ID')
                                ->leftJoin('kecamatan', 'kecamatan.Kode_Kecamatan', '=', 'umkm.Kecamatan_ID')
                                ->where([
                                    ['jenis_umkm.Nama', '=', 'Menengah'],
                                    ['kecamatan.Nama', '=', 'Lembang']
                                ])->get()->count(),

            // Lembang
            'mikro_batu_jajar' => UMKM::leftJoin('jenis_umkm', 'jenis_umkm.Kode_Jenis', '=', 'umkm.Jenis_ID')
                                ->leftJoin('kecamatan', 'kecamatan.Kode_Kecamatan', '=', 'umkm.Kecamatan_ID')
                                ->where([
                                    ['jenis_umkm.Nama', '=', 'Mikro'],
                                    ['kecamatan.Nama', '=', 'Batu Jajar']
                                ])->get()->count(),
            'kecil_batu_jajar' => UMKM::leftJoin('jenis_umkm', 'jenis_umkm.Kode_Jenis', '=', 'umkm.Jenis_ID')
                                ->leftJoin('kecamatan', 'kecamatan.Kode_Kecamatan', '=', 'umkm.Kecamatan_ID')
                                ->where([
                                    ['jenis_umkm.Nama', '=', 'Kecil'],
                                    ['kecamatan.Nama', '=', 'Batu Jajar']
                                ])->get()->count(),
            'menengah_batu_jajar' => UMKM::leftJoin('jenis_umkm', 'jenis_umkm.Kode_Jenis', '=', 'umkm.Jenis_ID')
                                ->leftJoin('kecamatan', 'kecamatan.Kode_Kecamatan', '=', 'umkm.Kecamatan_ID')
                                ->where([
                                    ['jenis_umkm.Nama', '=', 'Menengah'],
                                    ['kecamatan.Nama', '=', 'Batu Jajar']
                                ])->get()->count(),

            // Kenaikan Level UMKM

            // Padalarang
            'umkm_padalarang_2017' => UMKM::whereBetween('tanggal', [
                date('Y-m-d', strtotime('2017-01-01')),    
                date('Y-m-d', strtotime('2017-12-30')),    
            ])->where('Jenis_ID', '=', '1')
            ->sum('Omzet'),
            'umkm_padalarang_2018' => UMKM::whereBetween('tanggal', [
                date('Y-m-d', strtotime('2018-01-01')),    
                date('Y-m-d', strtotime('2018-12-30')),    
            ])->where('Jenis_ID', '=', '1')
            ->sum('Omzet'),
            'umkm_padalarang_2019' => UMKM::whereBetween('tanggal', [
                date('Y-m-d', strtotime('2019-01-01')),    
                date('Y-m-d', strtotime('2019-12-30')),    
            ])->where('Jenis_ID', '=', '1')
            ->sum('Omzet'),
            'umkm_padalarang_2020' => UMKM::whereBetween('tanggal', [
                date('Y-m-d', strtotime('2020-01-01')),    
                date('Y-m-d', strtotime('2020-12-30')),    
            ])->where('Jenis_ID', '=', '1')
            ->sum('Omzet'),


            // Lembang
            'umkm_lembang_2017' => UMKM::whereBetween('tanggal', [
                date('Y-m-d', strtotime('2017-01-01')),    
                date('Y-m-d', strtotime('2017-12-30')),    
            ])->where('Jenis_ID', '=', '2')
            ->sum('Omzet'),
            'umkm_lembang_2018' => UMKM::whereBetween('tanggal', [
                date('Y-m-d', strtotime('2018-01-01')),    
                date('Y-m-d', strtotime('2018-12-30')),    
            ])->where('Jenis_ID', '=', '2')
            ->sum('Omzet'),
            'umkm_lembang_2019' => UMKM::whereBetween('tanggal', [
                date('Y-m-d', strtotime('2019-01-01')),    
                date('Y-m-d', strtotime('2019-12-30')),    
            ])->where('Jenis_ID', '=', '2')
            ->sum('Omzet'),
            'umkm_lembang_2020' => UMKM::whereBetween('tanggal', [
                date('Y-m-d', strtotime('2020-01-01')),    
                date('Y-m-d', strtotime('2020-12-30')),    
            ])->where('Jenis_ID', '=', '2')
            ->sum('Omzet'),


            // Batu Jajar
            'umkm_batu_jajar_2017' => UMKM::whereBetween('tanggal', [
                date('Y-m-d', strtotime('2017-01-01')),    
                date('Y-m-d', strtotime('2017-12-30')),    
            ])->where('Jenis_ID', '=', '3')
            ->sum('Omzet'),
            'umkm_batu_jajar_2018' => UMKM::whereBetween('tanggal', [
                date('Y-m-d', strtotime('2018-01-01')),    
                date('Y-m-d', strtotime('2018-12-30')),    
            ])->where('Jenis_ID', '=', '3')
            ->sum('Omzet'),
            'umkm_batu_jajar_2019' => UMKM::whereBetween('tanggal', [
                date('Y-m-d', strtotime('2019-01-01')),    
                date('Y-m-d', strtotime('2019-12-30')),    
            ])->where('Jenis_ID', '=', '3')
            ->sum('Omzet'),
            'umkm_batu_jajar_2020' => UMKM::whereBetween('tanggal', [
                date('Y-m-d', strtotime('2020-01-01')),    
                date('Y-m-d', strtotime('2020-12-30')),    
            ])->where('Jenis_ID', '=', '3')
            ->sum('Omzet'),

            // Padalarang
            'max_padalarang_2017' => UMKM::select('Nama')
                                ->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2017-01-01')),    
                                    date('Y-m-d', strtotime('2017-12-30')),    
                                ])->where('Kecamatan_ID', '=', '1')->orderBy('Omzet', 'DESC')->take(3)->get(),
            'max_padalarang_2018' => UMKM::select('Nama')
                                ->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2018-01-01')),    
                                    date('Y-m-d', strtotime('2018-12-30')),    
                                ])->where('Kecamatan_ID', '=', '1')->orderBy('Omzet', 'DESC')->take(3)->get(),
            'max_padalarang_2019' => UMKM::select('Nama')
                                ->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2019-01-01')),    
                                    date('Y-m-d', strtotime('2019-12-30')),    
                                ])->where('Kecamatan_ID', '=', '1')->orderBy('Omzet', 'DESC')->take(3)->get(),
            'max_padalarang_2020' => UMKM::select('Nama')
                                ->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2020-01-01')),    
                                    date('Y-m-d', strtotime('2020-12-30')),    
                                ])->where('Kecamatan_ID', '=', '1')->orderBy('Omzet', 'DESC')->take(3)->get(),

            // Lembang
            'max_lembang_2017' => UMKM::select('Nama')
                                ->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2017-01-01')),    
                                    date('Y-m-d', strtotime('2017-12-30')),    
                                ])->where('Kecamatan_ID', '=', '2')->orderBy('Omzet', 'DESC')->take(3)->get(),
            'max_lembang_2018' => UMKM::select('Nama')
                                ->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2018-01-01')),    
                                    date('Y-m-d', strtotime('2018-12-30')),    
                                ])->where('Kecamatan_ID', '=', '2')->orderBy('Omzet', 'DESC')->take(3)->get(),
            'max_lembang_2019' => UMKM::select('Nama')
                                ->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2019-01-01')),    
                                    date('Y-m-d', strtotime('2019-12-30')),    
                                ])->where('Kecamatan_ID', '=', '2')->orderBy('Omzet', 'DESC')->take(3)->get(),
            'max_lembang_2020' => UMKM::select('Nama')
                                ->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2020-01-01')),    
                                    date('Y-m-d', strtotime('2020-12-30')),    
                                ])->where('Kecamatan_ID', '=', '2')->orderBy('Omzet', 'DESC')->take(3)->get(),

            // Batu Jajar
            'max_batu_jajar_2017' => UMKM::select('Nama')
                                ->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2017-01-01')),    
                                    date('Y-m-d', strtotime('2017-12-30')),    
                                ])->where('Kecamatan_ID', '=', '3')->orderBy('Omzet', 'DESC')->take(3)->get(),
            'max_batu_jajar_2018' => UMKM::select('Nama')
                                ->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2018-01-01')),    
                                    date('Y-m-d', strtotime('2018-12-30')),    
                                ])->where('Kecamatan_ID', '=', '3')->orderBy('Omzet', 'DESC')->take(3)->get(),
            'max_batu_jajar_2019' => UMKM::select('Nama')
                                ->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2019-01-01')),    
                                    date('Y-m-d', strtotime('2019-12-30')),    
                                ])->where('Kecamatan_ID', '=', '3')->orderBy('Omzet', 'DESC')->take(3)->get(),
            'max_batu_jajar_2020' => UMKM::select('Nama')
                                ->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2020-01-01')),    
                                    date('Y-m-d', strtotime('2020-12-30')),    
                                ])->where('Kecamatan_ID', '=', '3')->orderBy('Omzet', 'DESC')->take(3)->get(),


            // Kenaikan Level 2017
            'belum_berkembang_2017' => UMKM::select('omzet')
                                ->where([
                                    ['omzet', '<=', 25000000],
                                ])->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2017-01-01')),    
                                    date('Y-m-d', strtotime('2017-12-30')),    
                                ])->get()->count(),
            'sedang_berkembang_2017' => UMKM::select('omzet')
                                ->where([
                                    ['omzet', '>', 25000000],
                                    ['omzet', '<=', 50000000]
                                ])->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2017-01-01')),    
                                    date('Y-m-d', strtotime('2017-12-30')),    
                                ])->get()->count(),
            'sudah_berkembang_2017' => UMKM::select('omzet')
                                ->where([
                                    ['omzet', '>', 50000000]
                                ])->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2017-01-01')),    
                                    date('Y-m-d', strtotime('2017-12-30')),    
                                ])->get()->count(),
                                
            // Kenaikan Level 2018
            'belum_berkembang_2018' => UMKM::select('omzet')
                                ->where([
                                    ['omzet', '<=', 25000000],
                                ])->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2018-01-01')),    
                                    date('Y-m-d', strtotime('2018-12-30')),    
                                ])->get()->count(),
            'sedang_berkembang_2018' => UMKM::select('omzet')
                                ->where([
                                    ['omzet', '>', 25000000],
                                    ['omzet', '<=', 50000000]
                                ])->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2018-01-01')),    
                                    date('Y-m-d', strtotime('2018-12-30')),    
                                ])->get()->count(),
            'sudah_berkembang_2018' => UMKM::select('omzet')
                                ->where([
                                    ['omzet', '>', 50000000]
                                ])->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2018-01-01')),    
                                    date('Y-m-d', strtotime('2018-12-30')),    
                                ])->get()->count(),

            // Kenaikan Level 2019
            'belum_berkembang_2019' => UMKM::select('omzet')
                                ->where([
                                    ['omzet', '<=', 25000000],
                                ])->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2019-01-01')),    
                                    date('Y-m-d', strtotime('2019-12-30')),    
                                ])->get()->count(),
            'sedang_berkembang_2019' => UMKM::select('omzet')
                                ->where([
                                    ['omzet', '>', 25000000],
                                    ['omzet', '<=', 50000000]
                                ])->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2019-01-01')),    
                                    date('Y-m-d', strtotime('2019-12-30')),    
                                ])->get()->count(),
            'sudah_berkembang_2019' => UMKM::select('omzet')
                                ->where([
                                    ['omzet', '>', 50000000]
                                ])->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2019-01-01')),    
                                    date('Y-m-d', strtotime('2019-12-30')),    
                                ])->get()->count(),

            // Kenaikan Level 2020
            'belum_berkembang_2020' => UMKM::select('omzet')
                                ->where([
                                    ['omzet', '<=', 25000000],
                                ])->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2020-01-01')),    
                                    date('Y-m-d', strtotime('2020-12-30')),    
                                ])->get()->count(),
            'sedang_berkembang_2020' => UMKM::select('omzet')
                                ->where([
                                    ['omzet', '>', 25000000],
                                    ['omzet', '<=', 50000000]
                                ])->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2020-01-01')),    
                                    date('Y-m-d', strtotime('2020-12-30')),    
                                ])->get()->count(),
            'sudah_berkembang_2020' => UMKM::select('omzet')
                                ->where([
                                    ['omzet', '>', 50000000]
                                ])->whereBetween('tanggal', [
                                    date('Y-m-d', strtotime('2020-01-01')),    
                                    date('Y-m-d', strtotime('2020-12-30')),    
                                ])->get()->count(),

        ];

        // View
        return view('Visualisasi.index', compact('data'));
        // return $data;
    }
}
