@extends('layouts.app')

@push('custom-css')

    <style>
        .vertical {
            border-left: 6px solid black;
            height: 100px;
            left: 50%;
        }
        
    </style>

@endpush

@section('content')

    <!-- Content Header -->
    <div class="page-heading">

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
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-lg datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Komoditi</th>
                                                <th>Sektor</th>
                                                <th>Tahun Berdiri</th>
                                                <th>Jenis</th>
                                                <th>Lokasi</th>
                                                <!-- <th>Aksi</th> -->
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

@endsection 

@push('custom-js')

    <script>

        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ url('/umkm') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'Nama', name: 'Nama' },
                { data: 'Komoditi', name: 'Komoditi' },
                { data: 'Sektor', name: 'Sektor' },
                { data: 'Tahun_Berdiri', name: 'Tahun_Berdiri' },
                { data: 'Jenis_ID', name: 'Jenis_ID' },
                { data: 'Kecamatan_ID', name: 'Kecamatan_ID' },
                // { data: 'Aksi', name: 'Aksi' },
            ]
        });

        function deleteData(id)
        {
            csrf_token = $('meta[name=csrf_token]').attr('content');

            Swal.fire({
                title: 'Perhatian!',
                text: 'Apakah anda ingin menghapus data ini ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) 
                {
                    $.ajax({
                        url: "{{ url('/umkm') }}" + "/" + id,
                        type: "POST",
                        data: {'_method' : 'DELETE', '_token' : csrf_token},
                        success: function(response)
                        {
                            setTimeout(function() 
                            {
                                $.bootstrapGrowl('Data berhasil dihapus', 
                                { 
                                    type: 'success',
                                    width: '300px;', 
                                });
                            }, 1000);
                            table.ajax.reload();
                        }
                    });
                    // alert('ok');
                }
            });
        }

        function show(id)
        {
            $('#modal').modal('show');
        }

        @if(session('message'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Data Berhasil Ditambahkan',
            });
        @endif 
        
    </script>

@endpush