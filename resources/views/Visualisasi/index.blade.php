@extends('layouts.app')

@section('content')

    <!-- Content Header -->
    <div class="page-heading">
        
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Visualisasi</h3>
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
            <!-- Row 1 -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <!-- UMKM Lembang -->
                        <div class="col-6 col-lg-4 col-md-6">
                            <!-- Card Record Data -->
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

                            <!-- Record -->
                            <div class="card">
                                <div class="card-header">
                                    <h4>Presentase Jumlah UMKM Lembang</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Card Record Data -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="umkm-lembang"></div>
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
                            
                            <!-- Record -->
                            <div class="card">
                                <div class="card-header">
                                    <h4>Presentase Jumlah UMKM Padalarang</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Card Record Data -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="umkm-padalarang"></div>
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

                            <!-- Record -->
                            <div class="card">
                                <div class="card-header">
                                    <h4>Presentase Jumlah UMKM Batu Jajar</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Card Record Data -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="umkm-batu-jajar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row 2 -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pertumbuhan Pendapatan UMKM per-wilayah</h4>
                        </div>
                        <div class="card-body">
                            <div id="area"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row 3 -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kenaikan Level Indikator UMKM</h4>
                        </div>
                        <div class="card-body">
                            <div id="bar"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row 4 -->
            <div class="row">
                <!-- Card -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kesimpulan</h4>
                        </div>
                        <div class="card-body">
                            <ul>
                                <!-- Lembang -->
                                <li>
                                    <strong>Lembang</strong>
                                    <ul>
                                        <li>2017 sebesar {{ rupiah($data['umkm_lembang_2017']) }}</li>
                                        <li>2018 sebesar {{ rupiah($data['umkm_lembang_2018']) }}</li>
                                        <li>2019 sebesar {{ rupiah($data['umkm_lembang_2019']) }}</li>
                                        <li>2020 sebesar {{ rupiah($data['umkm_lembang_2020']) }}</li>
                                    </ul>
                                </li>
                                <!-- Padalarang -->
                                <li>
                                    <strong>Padalarang</strong>
                                    <ul>
                                        <li>2017 sebesar {{ rupiah($data['umkm_padalarang_2017']) }}</li>
                                        <li>2018 sebesar {{ rupiah($data['umkm_padalarang_2018']) }}</li>
                                        <li>2019 sebesar {{ rupiah($data['umkm_padalarang_2019']) }}</li>
                                        <li>2020 sebesar {{ rupiah($data['umkm_padalarang_2020']) }}</li>
                                    </ul>
                                </li>
                                <!-- Batu Jajar -->
                                <li>
                                    <strong>Batu Jajar</strong>
                                    <ul>
                                        <li>2017 sebesar {{ rupiah($data['umkm_batu_jajar_2017']) }}</li>
                                        <li>2018 sebesar {{ rupiah($data['umkm_batu_jajar_2018']) }}</li>
                                        <li>2019 sebesar {{ rupiah($data['umkm_batu_jajar_2019']) }}</li>
                                        <li>2020 sebesar {{ rupiah($data['umkm_batu_jajar_2020']) }}</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Table -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>UMKM Unggulan</h4>
                        </div>
                        <div class="card-body">
                            <ul>
                                <!-- Padalarang -->
                                <li>
                                    <strong>Padalarang</strong>
                                    <ul>
                                        <strong>2017</strong>
                                        <ol>
                                            @foreach($data['max_padalarang_2017'] as $pd_2017)
                                                <li>{{ $pd_2017->Nama }}</li>
                                            @endforeach
                                        </ol>
                                    </ul> 
                                    <ul>
                                        <strong>2018</strong>
                                        <ol>
                                            @foreach($data['max_padalarang_2018'] as $pd_2018)
                                                <li>{{ $pd_2018->Nama }}</li>
                                            @endforeach
                                        </ol>
                                    </ul>
                                    <ul>
                                        <strong>2019</strong>
                                        <ol>
                                            @foreach($data['max_padalarang_2019'] as $pd_2019)
                                                <li>{{ $pd_2019->Nama }}</li>
                                            @endforeach
                                        </ol>
                                    </ul>
                                    <ul>
                                        <strong>2020</strong>
                                        <ol>
                                            @foreach($data['max_padalarang_2020'] as $pd_2020)
                                                <li>{{ $pd_2020->Nama }}</li>
                                            @endforeach
                                        </ol>
                                    </ul>
                                </li>

                                <!-- Lembang -->
                                <li>
                                    <strong>Lembang</strong>
                                    <ul>
                                        <strong>2017</strong>
                                        <ol>
                                            @foreach($data['max_lembang_2017'] as $lm_2017)
                                                <li>{{ $lm_2017->Nama }}</li>
                                            @endforeach
                                        </ol>
                                    </ul> 
                                    <ul>
                                        <strong>2018</strong>
                                        <ol>
                                            @foreach($data['max_lembang_2018'] as $lm_2018)
                                                <li>{{ $lm_2018->Nama }}</li>
                                            @endforeach
                                        </ol>
                                    </ul>
                                    <ul>
                                        <strong>2019</strong>
                                        <ol>
                                            @foreach($data['max_lembang_2019'] as $lm_2019)
                                                <li>{{ $lm_2019->Nama }}</li>
                                            @endforeach
                                        </ol>
                                    </ul>
                                    <ul>
                                        <strong>2020</strong>
                                        <ol>
                                            @foreach($data['max_lembang_2020'] as $lm_2020)
                                                <li>{{ $lm_2020->Nama }}</li>
                                            @endforeach
                                        </ol>
                                    </ul>
                                </li>
                                
                                <!-- Batu Jajar -->
                                <li>
                                    <strong>Batu Jajar</strong>
                                    <ul>
                                        <strong>2017</strong>
                                        <ol>
                                            @foreach($data['max_batu_jajar_2017'] as $bj_2017)
                                                <li>{{ $bj_2017->Nama }}</li>
                                            @endforeach
                                        </ol>
                                    </ul> 
                                    <ul>
                                        <strong>2018</strong>
                                        <ol>
                                            @foreach($data['max_batu_jajar_2018'] as $bj_2018)
                                                <li>{{ $bj_2018->Nama }}</li>
                                            @endforeach
                                        </ol>
                                    </ul>
                                    <ul>
                                        <strong>2019</strong>
                                        <ol>
                                            @foreach($data['max_batu_jajar_2019'] as $bj_2019)
                                                <li>{{ $bj_2019->Nama }}</li>
                                            @endforeach
                                        </ol>
                                    </ul>
                                    <ul>
                                        <strong>2020</strong>
                                        <ol>
                                            @foreach($data['max_batu_jajar_2020'] as $bj_2020)
                                                <li>{{ $bj_2020->Nama }}</li>
                                            @endforeach
                                        </ol>
                                    </ul>
                                </li>

                            </ul>
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
        function convertToRupiah(angka)
        {
            var rupiah = '';		
            var angkarev = angka.toString().split('').reverse().join('');
            for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
        }

        // UMKM Terbanyak per Kecamatan lembang
        let lembang  = {
            series: [
                parseInt("{{ $data['mikro_lembang'] }}"),
                parseInt("{{ $data['kecil_lembang'] }}"),
                parseInt("{{ $data['menengah_lembang'] }}"),
            ],
            labels: ['Mikro', 'Kecil', 'Menengah'],
            colors: ['#435ebe','#55c6e8','#c65dd9'],
            chart: {
                type: 'donut',
                width: '100%',
                height:'250px'
            },
            legend: {
                position: 'bottom'
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '30%'
                    }
                }
            }
        }

        // UMKM Terbanyak per Kecamatan Padalarang
        let padalarang  = {
            series: [
                parseInt("{{ $data['mikro_padalarang'] }}"),
                parseInt("{{ $data['kecil_padalarang'] }}"),
                parseInt("{{ $data['menengah_padalarang'] }}"),
            ],
            labels: ['Mikro', 'Kecil', 'Menengah'],
            colors: ['#435ebe','#55c6e8','#c65dd9'],
            chart: {
                type: 'donut',
                width: '100%',
                height:'250px'
            },
            legend: {
                position: 'bottom'
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '30%'
                    }
                }
            }
        }

        // UMKM Terbanyak per Kecamatan Batu Jajar
        let batu_jajar  = {
            series: [
                parseInt("{{ $data['mikro_batu_jajar'] }}"),
                parseInt("{{ $data['kecil_batu_jajar'] }}"),
                parseInt("{{ $data['menengah_batu_jajar'] }}"),
            ],
            labels: ['Mikro', 'Kecil', 'Menengah'],
            colors: ['#435ebe','#55c6e8','#c65dd9'],
            chart: {
                type: 'donut',
                width: '100%',
                height:'250px'
            },
            legend: {
                position: 'bottom'
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '30%'
                    }
                }
            }
        }

        var barOptions = {
            series: [
                {
                    name: "Belum Berkembang",
                    data: [
                        parseInt("{{ $data['belum_berkembang_2017'] }}"),
                        parseInt("{{ $data['belum_berkembang_2018'] }}"),
                        parseInt("{{ $data['belum_berkembang_2019'] }}"),
                        parseInt("{{ $data['belum_berkembang_2020'] }}"),
                    ],
                },
                {
                    name: "Sedang Berkembang",
                    data: [
                        parseInt("{{ $data['sedang_berkembang_2017'] }}"),
                        parseInt("{{ $data['sedang_berkembang_2018'] }}"),
                        parseInt("{{ $data['sedang_berkembang_2019'] }}"),
                        parseInt("{{ $data['sedang_berkembang_2020'] }}"),
                    ],
                },
                {
                    name: "Sudah Berkembang",
                    data: [
                        parseInt("{{ $data['sudah_berkembang_2017'] }}"),
                        parseInt("{{ $data['sudah_berkembang_2018'] }}"),
                        parseInt("{{ $data['sudah_berkembang_2019'] }}"),
                        parseInt("{{ $data['sudah_berkembang_2020'] }}"),
                    ],
                },
            ],
            chart: {
                type: "bar",
                height: 350,
            },
            plotOptions: {
                bar: {
                horizontal: false,
                columnWidth: "55%",
                endingShape: "rounded",
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                show: true,
                width: 2,
                colors: ["transparent"],
            },
            xaxis: {
                categories: ["2017", "2018", "2019", "2020"],
            },
            yaxis: {
                title: {
                    text: "Jumlah",
                },
            },
            fill: {
                opacity: 1,
            },
            // tooltip: {
            //     y: {
            //         formatter: function(val) {
            //             return "$ " + val + " thousands";
            //         },
            //     },
            // },
        };
        // Visitor Render
        var umkmLembang = new ApexCharts(document.getElementById('umkm-lembang'), lembang)
        var umkmPadalarang = new ApexCharts(document.getElementById('umkm-padalarang'), padalarang)
        var umkmBatuJajar = new ApexCharts(document.getElementById('umkm-batu-jajar'), batu_jajar)

        // Render
        umkmLembang.render()
        umkmPadalarang.render()
        umkmBatuJajar.render()

        
        // Omzet
        var areaOptions = {
            series: [
                {
                    name: "Lembang",
                    data: [
                        parseInt("{{ $data['umkm_lembang_2017'] }}"),
                        parseInt("{{ $data['umkm_lembang_2018'] }}"),
                        parseInt("{{ $data['umkm_lembang_2019'] }}"),
                        parseInt("{{ $data['umkm_lembang_2020'] }}"),
                    ],
                },
                {
                    name: "Padalarang",
                    data: [
                        parseInt("{{ $data['umkm_padalarang_2017'] }}"),
                        parseInt("{{ $data['umkm_padalarang_2018'] }}"),
                        parseInt("{{ $data['umkm_padalarang_2019'] }}"),
                        parseInt("{{ $data['umkm_padalarang_2020'] }}"),
                    ],
                },
                {
                    name: "Batu Jajar",
                    data: [
                        parseInt("{{ $data['umkm_batu_jajar_2017'] }}"),
                        parseInt("{{ $data['umkm_batu_jajar_2018'] }}"),
                        parseInt("{{ $data['umkm_batu_jajar_2019'] }}"),
                        parseInt("{{ $data['umkm_batu_jajar_2020'] }}"),
                    ],
                },
            ],
            chart: {
                height: 350,
                type: "area",
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
            },
            xaxis: {
                type: "date",
                categories: [
                    "2017",
                    "2018",
                    "2019",
                    "2020",
                ],
            },
            yaxis: {
                title: {
                    text: "Jumlah (dalam rupiah)",
                },
            },
            tooltip: {
                x: {
                    format: "dd/MM/yy",
                },
                y: {
                    formatter: function(val) {
                        return convertToRupiah(val);
                    },
                },
            },
        };

        // Render
        var area = new ApexCharts(document.querySelector("#area"), areaOptions);
        area.render();


        // Render
        var bar = new ApexCharts(document.querySelector("#bar"), barOptions);
        bar.render();

    </script>

@endpush 