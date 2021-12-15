@extends('layouts.app')

@section('content')

    <!-- Content Header -->
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Table</h3>
                    <p class="text-subtitle text-muted">For user to check they list</p>
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
                                <a href="{{ url('/umkm') }}" class="btn btn-info btn-sm"><strong>Kembali</strong></a>
                            </div>
                        </div>
                        <div class="card-content">
                            <form action="{{ url('/umkm') }}" method="POST" autocomplete="OFF">
                                <div class="card-body">
                                    <!-- Form -->
                                    {{ csrf_field() }}
                                    <!-- Record 1 -->
                                    <div class="row">
                                    
                                        <!-- Nama -->
                                        <div class="col-sm-4">
                                            <!-- Form  -->
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input type="text" class="form-control only-string" name="Nama" id="Nama" placeholder="Nama">
                                            </div>
                                        </div>

                                        <!-- Komditi -->
                                        <div class="col-sm-4">
                                            <!-- Form  -->
                                            <div class="form-group">
                                                <label for="">Komditi</label>
                                                <input type="text" class="form-control" name="Komditi" id="Komditi" placeholder="Komditi">
                                            </div>
                                        </div>

                                        <!-- Sektor -->
                                        <div class="col-sm-4">
                                            <!-- Form  -->
                                            <div class="form-group">
                                                <label for="">Sektor</label>
                                                <input type="text" class="form-control" name="Sektor" id="Sektor" placeholder="Sektor">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Record 2 -->
                                    <div class="row">

                                        <!-- Tahun_Berdiri -->
                                        <div class="col-sm-6">
                                            <!-- Form  -->
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Tahun Berdiri</label>
                                                        <input type="text" class="form-control only-number" name="Tahun_Berdiri" id="Tahun_Berdiri" placeholder="Tahun Berdiri">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Nomor Telepon -->
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Nomor Telepon</label>
                                                        <input type="text" class="form-control only-number" name="Telepon" id="Telepon" placeholder="Nomor Telepon">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Alamat -->
                                        <div class="col-sm-6">
                                            <!-- Form  -->
                                            <div class="form-group">
                                                <label for="">Alamat</label>
                                                <textarea name="Alamat" id="Alamat" class="form-control" cols="30" rows="5" placeholder="Alamat"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <!-- Record 3 -->
                                    <div class="row">
                                    
                                        <!-- Tenaga_Kerja -->
                                        <div class="col-sm-4">
                                            <!-- Form  -->
                                            <div class="form-group">
                                                <label for="">Tenaga Kerja</label>
                                                <input type="text" class="form-control only-number" name="Tenaga_Kerja" id="Tenaga_Kerja" placeholder="Tenaga Kerja">
                                            </div>
                                        </div>

                                        <!-- Aset -->
                                        <div class="col-sm-4">
                                            <!-- Form  -->
                                            <div class="form-group">
                                                <label for="">Aset</label>
                                                <input type="text" class="form-control only-number" name="Aset" id="Aset" placeholder="Aset">
                                            </div>
                                        </div>

                                        <!-- Omset -->
                                        <div class="col-sm-4">
                                            <!-- Form  -->
                                            <div class="form-group">
                                                <label for="">Omset</label>
                                                <input type="text" class="form-control only-number" name="Omset" id="Omset" placeholder="Omset">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Record 4 -->
                                    <div class="row">
                                    
                                        <!-- Tanggal -->
                                        <div class="col-sm-4">
                                            <!-- Form  -->
                                            <div class="form-group">
                                                <label for="">Tanggal</label>
                                                <input type="text" class="form-control datepicker" name="Form_Tanggal" id="Tanggal" placeholder="Tanggal">
                                            </div>
                                        </div>

                                        <!-- Jenis UMKM -->
                                        <div class="col-sm-4">
                                            <!-- Form  -->
                                            <div class="form-group">
                                                <label for="">Jenis UMKM</label>
                                                <select class="form-control" name="Jenis_ID" id="Jenis_ID">
                                                    <option selected="selected" disabled>-- Pilih --</option>
                                                    @foreach($data['jenis'] as $jenis)
                                                        <option value="{{ $jenis->Kode_Jenis }}">{{ $jenis->Nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Kecamatan -->
                                        <div class="col-sm-4">
                                            <!-- Form  -->
                                            <div class="form-group">
                                                <label for="">Kecamatan</label>
                                                <select class="form-control" name="Kecamatan_ID" id="Kecamatan_ID">
                                                    <option selected="selected" disabled>-- Pilih --</option>
                                                    @foreach($data['kecamatan'] as $kecamatan)
                                                        <option value="{{ $kecamatan->Kode_Kecamatan }}">{{ $kecamatan->Nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" style="height: 70px;">
                                    <!-- Button -->
                                    <div class="float-end">
                                        <button type="reset" class="btn btn-danger btn-sm"><strong>Reset</strong></button>
                                        <button type="submit" class="btn btn-success btn-sm"><strong>Submit</strong></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection 

@push('custom-js')

    <script>
        $('.datepicker').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: false
        });
    </script>

@endpush 