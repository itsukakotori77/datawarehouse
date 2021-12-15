<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Datatables;
use App\Model\UMKM;
use App\Model\JenisUMKM;
use App\Model\Kecamatan;
use Illuminate\Http\Request;

class UMKMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'title' => 'Data UMKM'
        ];
        
        // $query = UMKM::all();
        $csvFile = public_path('data-umkm/' . 'umkm.csv');
        $query = csvToArray($csvFile);

        if($request->ajax())
        {
            // Return
            return Datatables::of($query)
                ->addIndexColumn()
                ->editColumn('Jenis_ID', function($query){
                    switch($query['Jenis_ID'])
                    {
                        case '1':
                            $jenis = 'Kecil';
                        break;

                        case '2':
                            $jenis = 'Menengah';
                        break;

                        case '3':
                            $jenis = 'Mikro';
                        break;
                    }

                    return $jenis;
                })
                ->editColumn('Kecamatan_ID', function($query){
                    switch($query['Kecamatan_ID'])
                    {
                        case '1':
                            $kecamatan = 'Padalarang';
                        break;

                        case '2':
                            $kecamatan = 'Lembang';
                        break;

                        case '3':
                            $kecamatan = 'Batu Jajar';
                        break;
                    }

                    return $kecamatan;
                })
                ->addColumn('Aksi', function($query){
                    return 
                    '
                        <a href="'. url('/umkm/' . $query['Kode_UMKM'] . '/edit') .'" class="btn btn-warning btn-sm" style="margin: auto;"><i class="fas fa-edit"></i></a>
                        <button type="button" class="btn btn-danger btn-sm" style="margin: auto; margin-top: 5px;" onclick="deleteData('. $query['Kode_UMKM'] .')"><i class="fas fa-trash"></i></button>
                    ';
                })
                ->rawColumns(['Kecamatan_ID', 'Jenis_ID', 'Aksi'])
                ->make(True);
        }

        return view('UMKM.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Data UMKM',
            'kecamatan' => Kecamatan::all(),
            'jenis' => JenisUMKM::all(),
        ];

        // return 
        return view('UMKM.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['Tanggal' => Carbon::createFromFormat('d/m/Y', $request->Form_Tanggal)->format('Y-m-d')]);
        // Query
        $umkm = UMKM::create($request->all());

        // Notification
        if($umkm)
        {
            return redirect('/umkm')->with('message', 'Data berhasil diinputkan');
        }else{
            return redirect('/umkm')->with('message', 'Terjadi kesalahan pada proses input data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Variable
        $data = [
            'title' => 'Ubah Data UMKM',
            'kecamatan' => Kecamatan::all(),
            'jenis' => JenisUMKM::all(),
            'umkm' => UMKM::find($id)
        ];

        // return
        return view('UMKM.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Reuqest
        $request->request->add(['Tanggal' => Carbon::createFromFormat('d/m/Y', $request->Form_Tanggal)->format('Y-m-d')]);

        // Query
        $umkm = UMKM::find($id);
        $umkm->update($request->all());

        return redirect('/umkm')->with('message', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $umkm = UMKM::find($id);
        $umkm->delete();
    }

    public function convert()
    {
        $umkm = UMKM::where('Jenis_ID', '=', 1)->get();
        exportCSV($umkm);
    }
}
