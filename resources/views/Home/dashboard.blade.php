@extends('layouts.app')

@section('content')

    <!-- Content Header -->
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $data['title'] }}</h3>
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
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <!-- UMKM Lembang -->
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldUser"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">UMKM Lembang</h6>
                                        <h6 class="font-extrabold mb-0">{{ $data['umkm_lembang'] }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- UMKM Padalarang -->
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldUser"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">UMKM Padalarang</h6>
                                        <h6 class="font-extrabold mb-0">{{ $data['umkm_padalarang'] }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- UMKM Batu Jajar -->
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldUser"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">UMKM Batu Jajar</h6>
                                        <h6 class="font-extrabold mb-0">{{ $data['umkm_batu_jajar'] }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Grafik total data UMKM per tahun</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </div>

@endsection 

@push('custom-js')

    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script>
        var optionsProfileVisit = {
            annotations: {
                position: 'back'
            },
            dataLabels: {
                enabled:false
            },
            chart: {
                type: 'bar',
                height: 300
            },
            fill: {
                opacity:1
            },
            plotOptions: {
            },
            series: [{
                name: 'Total Data UMKM Per tahun',
                data: [
                    parseInt("{{ $data['umkm_2017'] }}"),
                    parseInt("{{ $data['umkm_2018'] }}"),
                    parseInt("{{ $data['umkm_2019'] }}"),
                    parseInt("{{ $data['umkm_2020'] }}"),
                ]
            }],
            colors: '#435ebe',
            xaxis: {
                categories: ["2017","2018","2019","2020"],
            },
        }

        var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
        chartProfileVisit.render();

    </script>

@endpush 