@extends('template.general', [
    'title' => "Dashboard - Sistem Administrasi Pendidikan Terpadu LP Ma'arif NU PBNU"
])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}" />
@endsection

@section('container')
    @include('template.navhome')

    <div class="container container-body">
        <div class="row justify-content-center row-slide-map py-4 px-2 mt-3 mt-sm-5 row-swipe-up rounded">
            <div class="col-sm-9 d-flex flex-column text-center">
                <div class="card shadow-none">
                    <div class="card-body py-0 px-1">
                        <div id="map-indonesia"></div>
                    </div>
                </div>
            </div>
            <div class="col-11 col-sm-3">
                <div class="card mb-3 shadow-none card-infomasi">
                    <div class="card-body p-0">
                        <div class="mx-3">
                            <h5 class="card-title fw-medium mb-0">BERANDA INFORMASI</h5>
                            <small>update informasi terbaru</small>
                        </div>
                        <ol class="list-group mt-3">
                            @foreach($berandaInformasi as $row)
                                <a href="{{ route('informasi', $row->slug) }}">
                                    <li class="list-group-item list-group-item-action">
                                        <h6 class="fw-bold mt-2 mb-1">{{ $row->headline }}</h6>
                                        {!! Str::limit($row->content, 70)  !!}
                                        <div class="mt-3 d-flex justify-content-between">
                                            <span class="badge bg-coksu fs-1 rounded">{{ $row->type }}</span>
                                            <small>{{ \App\Helpers\Date::tglReverse($row->tgl_upload) }}</small>
                                        </div>
                                    </li>
                                </a>
                            @endforeach
                        </ol>

                    </div>
                </div>
            </div>
        </div>


        <div class="mt-5">
            <div class="row">
                <div class="col text-center">
                    <div class="border rounded py-4 px-3">
                        <h2 style="color:#327B32;">SELAMAT DATANG DI LAYANAN SIAPINTER</h2>
                        <small>Sistem pelayanan administrasi pendidikan terpadu dalam naungan lembaga pendidikan Ma'arif NU PBNU</small>
                        <hr class="w-60 mx-auto">
                        <a href="{{ route('verify') }}" class="btn btn-primary mb-1"><i class="ti ti-camera"></i> VALIDASI DOKUMEN</a>
                    </div>

                </div>
            </div>
        </div>

        <div class="mt-5 sum-satpen">
            <div class="row mb-3 justify-content-center">
                <div class="col-10 col-sm-12">
                    <div class="menu-title d-flex align-items-center justify-content-between">
                        <h4><span class="deff">Rekap Data</span> Pendidikan</h4>
                        <div class="line-title"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center justify-content-sm-start">
                @php($num=0)
                @foreach($jmlSatpenByJenjang as $row)
                    <div class="col-3 col-sm-1 px-0 pe-1">
                        <div class="card mb-1">
                            <div class="card-body">
                                <div class="d-flex flex-column justify-content-start">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="num">{{ $row->jml_satpen }}</h5>
                                        <h5 class="mb-0">{{ $row->nm_jenjang }}</h5>
                                    </div>
                                    <p class="text-uppercase">{{ $row->keterangan }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php(++$num)
                    @if($num >= 8)
                        </div>
                        <div class="row justify-content-center justify-content-sm-start">
                        @php($num=0)
                    @endif
                @endforeach
                <div class="col-3 col-sm-1 px-0 pe-1">
                    <div class="card mb-1">
                        <div class="card-body">
                            <div class="d-flex flex-column justify-content-start">
                                <div class="d-flex justify-content-between">
                                    <h5 class="num">{{ $countSatpen }}</h5>
                                    <h5 class="mb-0">ALL</h5>
                                </div>
                                <p class="text-uppercase">Total Satpen</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('template.footer')

@endsection

@section('scripts')
    <script src="https://code.highcharts.com/maps/highmaps.js"></script>
    <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
    <script>
        (async () => {

            const topology = await fetch(
                'https://code.highcharts.com/mapdata/countries/id/id-all.topo.json'
            ).then(response => response.json());

            const apiUrl = "{{ route('provcount') }}";

            let data = [];
            await fetch(apiUrl)
                .then(response => {
                    // Check if the response is successful (status code 2xx)
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    // Parse the JSON data from the response
                    return response.json();
                })
                .then(resdata => {
                    // Process the JSON data
                    resdata.map((item, index) => {
                        data.push([item.map, item.record_count]);
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });

            // Create the chart
            Highcharts.mapChart('map-indonesia', {
                chart: {
                    map: topology
                },

                title: {
                    text: 'Pemetaan Satuan Pendidikan'
                },

                subtitle: {
                    text: 'pemetaan jumlah satuan pendidikan tiap propinsi'
                },

                mapNavigation: {
                    enabled: true,
                    buttonOptions: {
                        verticalAlign: 'bottom'
                    }
                },

                colorAxis: {
                    min: 0,
                    max: 100,
                    stops: [
                        [0, '#EFEFFF'], // Color at 0 value
                        [0.5, '#327B32'], // Color at 50% value
                        [1, '#1d601d'] // Color at 100% value
                    ]
                },

                series: [{
                    data: data,
                    name: 'Random data',
                    states: {
                        hover: {
                            color: '#BADA55'
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    }
                }]
            });

        })();
    </script>
@endsection
