@extends('index')
@section('title', 'Home')

@section('isihalaman')
    <div class="title pb-20">
        <h2 class="h3 mb-0">Data Pengaduan</h2>
    </div>

    <div class="row pb-10">
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{ $semua }}</div>
                        <div class="font-14 text-secondary weight-500">
                            Jumlah Pengaduan
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#00eccf">
                            <i class="icon-copy bi bi-clipboard"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{ $baru }}</div>
                        <div class="font-14 text-secondary weight-500">
                            Belum diverifikasi
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#ff5b5b">
                            <i class="icon-copy bi bi-clipboard-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{ $proses }}</div>
                        <div class="font-14 text-secondary weight-500">
                            diproses
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon">
                            <i class="icon-copy bi bi-clipboard-minus"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{ $selesai }}</div>
                        <div class="font-14 text-secondary weight-500">Selesai</div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#09cc06">
                            <i class="icon-copy bi bi-clipboard2-check"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-box pb-10">
        <div class="h5 pd-20 mb-0">Jumlah Pengaduan</div>

        <div id="pengaduan-chart"></div>
    </div>
    @push('custom-scripts')
        <script>
            const d = new Date();
            let month = d.getMonth();
            let dataPengaduan = Array((month + 1));
            let i = 0;
        </script>
        @foreach ($data as $da)
            <script>
                dataPengaduan[i] = {{ $da }};
                i += 1;
                console.log({{ $da }});
            </script>
        @endforeach
        <script>
            console.log(dataPengaduan);

            var options12 = {
                series: [{
                        name: "Pengaduan",
                        data: dataPengaduan
                    }
                    // {
                    // 	name: "Consultations",
                    // 	data: [15, 10, 17, 15, 23, 21, 30, 20, 26, 20, 28, 25]
                    // }
                ],
                chart: {
                    height: 300,
                    type: 'line',
                    zoom: {
                        enabled: false,
                    },
                    dropShadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 16,
                        opacity: 0.2
                    },
                    toolbar: {
                        show: false
                    }
                },
                colors: ['#255cd3'],
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: [3, 3],
                    curve: 'smooth'
                },
                grid: {
                    show: false,
                },
                markers: {
                    colors: ['#255cd3'],
                    size: 5,
                    strokeColors: '#ffffff',
                    strokeWidth: 2,
                    hover: {
                        sizeOffset: 2
                    }
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    labels: {
                        style: {
                            colors: '#8c9094'
                        }
                    }
                },
                yaxis: {
                    min: 0,
                    max: 250,
                    labels: {
                        style: {
                            colors: '#8c9094'
                        }
                    }
                }
            };
            var chart9 = new ApexCharts(document.querySelector("#pengaduan-chart"), options12);
            chart9.render();
        </script>
    @endpush
@endsection
