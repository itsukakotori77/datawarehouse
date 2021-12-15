<?php

namespace App\Http\Controllers;

use Datatables;
use App\Model\Reporting;
use App\Model\UMKM;
use Marquine\Etl\Etl;
use Illuminate\Http\Request;

class DataWarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Variable
        $data = [
            'title' => 'Data Warehouse',
        ];

        $query = Reporting::all();

        if($request->ajax())
        {
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('Aksi', function($query){
                    return 
                        'test';
                })
                ->editColumn('Tanggal', function($query){
                    return 
                        date('d/m/Y', strtotime($query->Tanggal));
                })
                ->rawColumns(['Aksi'])
                ->make(True);
        }

        return view('DataWarehouse.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Creating Object
        $etl = new Etl;

        // Proses ETL
        $etl->extract('query', 'select * from umkm', [
            'columns' => [
                'Kode_UMKM',
                'Jenis_ID',
                'Kecamatan_ID',
                'Tanggal',
            ]
        ])->transform('trim', [     /// USE TRIM (RECOMENDED)
            'columns' => [
                'Kode_UMKM',
                'Jenis_ID',
                'Kecamatan_ID',
                'Tanggal',
            ]
        ])->load('insert', 'reporting',  [
            'columns' => [
                'Kode_UMKM',
                'Jenis_ID',
                'Kecamatan_ID',
                'Tanggal',
                
            ],
            ['timestamps' => true]
        ])
        ->run();

        // return redirect
        // return redirect('/datawarehouse')->with('message', 'Extract Transform Load Berhasil dilakukan');

        // return response()->json([
        //     'test' => UMKM::raw('select * from umkm limit 10')
        // ]);
        // return response()->json(UMKM::take(10)->get());

        var_dump($etl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        if(Reporting::count() > 0)
        {
            Reporting::where('id', 'like', '%%')->delete();
            return response()->json(['response' => True]);
        }else{
            return response()->json(['response' => False]);
        }
    }
}
