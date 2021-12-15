@extends('layouts.app')

@section('content')

    <!-- Content Header -->
    <div class="page-heading">
        <!-- Row -->
        <div class="row">
            <!-- Mikro -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ asset('data-umkm/mikro-2020.csv') }}" download>
                                <i class="fas fa-file-csv" style="font-size: 40px;"></i>
                                <br>
                                <span>Data Usaha Mikro</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Kecil -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ asset('data-umkm/kecil-2020.csv') }}" download>
                                <i class="fas fa-file-csv" style="font-size: 40px;"></i>
                                <br>
                                <span>Data Usaha Kecil</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menengah -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ asset('data-umkm/menengah-2020.csv') }}">
                                <i class="fas fa-file-csv" style="font-size: 40px;"></i>
                                <br>
                                <span>Data Usaha Menengah</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 2 -->
        <div class="row" style="margin-top: 50px">
            <!-- Col 4 -->
            <div class="col-sm-4 offset-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ asset('data-umkm/umkm.csv') }}" download>
                                <i class="fas fa-database" style="font-size: 40px;"></i>
                                <br>
                                <span>Data Warehouse UMKM</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="table-div">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Table</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $data['title'] }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            
            <!-- Table -->
            <section class="section">
                <div class="row" id="basic-table">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-start">
                                    <h4 class="card-title">{{ $data['title'] }}</h4>
                                </div>
                                <div class="float-end">
                                    <button type="button" onclick="createData()" class="btn btn-success btn-sm"><strong><i class="fas fa-plug"></i> Proses ETL</strong></button>
                                    <button type="button" onclick="deleteData()" class="btn btn-danger btn-sm"><strong><i class="fas fa-trash"></i> Hapus Data Warehouse</strong></button>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- Table with outer spacing -->
                                    <div class="table-responsive">
                                        <table class="table table-lg datatable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode UMKM</th>
                                                    <th>Kode Jenis</th>
                                                    <th>Kode Kecamatan</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection 

@push('custom-js')

    <script>

        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ url('/datawarehouse') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'Kode_UMKM', name: 'Kode_UMKM' },
                { data: 'Jenis_ID', name: 'Jenis_ID' },
                { data: 'Kecamatan_ID', name: 'Kecamatan_ID' },
                { data: 'Tanggal', name: 'Tanggal' },
            ]
        });

        function createData()
        {
            csrf_token = $('meta[name=csrf_token]').attr('content');

            Swal.fire({
                title: 'Perhatian!',
                text: 'Apakah anda ingin melakukan proses ETL ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('/datawarehouse') }}",
                        type: "POST",
                        data: {'_method' : 'POST', '_token' : csrf_token},
                        success: function(response)
                        {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Proses ETL Berhasil Dilakukan!',
                            });
                            table.ajax.reload();
                        }
                    });
                }
            });
        }

        function deleteData()
        {
            csrf_token = $('meta[name=csrf_token]').attr('content');

            Swal.fire({
                title: 'Perhatian!',
                text: 'Apakah anda menghapus seluruh data warehouse ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('/datawarehouse') }}",
                        type: "POST",
                        data: {'_method' : 'DELETE', '_token' : csrf_token},
                        success: function(response)
                        {
                            if(response.response === true)
                            {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Data berhasil dihapus!',
                                });
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Success',
                                    text: 'Tidak ada data yang dihapus!',
                                });
                            }
                            table.ajax.reload();
                        }
                    });
                }
            });
        }

    </script>

@endpush 