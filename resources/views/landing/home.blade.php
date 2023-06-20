@extends('template.general', [
    'title' => 'Siapin - Home'
])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}" />
@endsection

@section('container')
    @include('template.navhome')

    <div class="container">
        <div class="row justify-content-center mt-3 mt-sm-5">
            <div class="col-sm-9 d-flex flex-column text-center">
                <div class="card shadow-none">
                    <div class="card-body py-0">
{{--                        <div class="mb-4 text-start">--}}
{{--                            <h5 class="card-title fw-medium mb-0">Pemetaan Satpen</h5>--}}
{{--                            <small>pemetaan jumlah satuan pendidikan tiap propinsi</small>--}}
{{--                        </div>--}}
{{--                        <img src="{{ asset('assets/images/backgrounds/colorful-indonesia-map-symbol-vector 1.png') }}" class="w-100" alt="Map Indonesia">--}}
                        <div id="map-indonesia"></div>
                    </div>
                </div>
            </div>
            <div class="col-11 col-sm-3">
                <div class="card mb-3 card-jml-perkab">
                    <div class="card-body px-0">
                        <div class="mx-3">
                            <h5 class="card-title fw-medium mb-0">Beranda Informasi</h5>
                            <small>update informasi terbaru</small>
                        </div>
                        <ol class="list-group mt-3">
                            @foreach($berandaInformasi as $row)
                                <a href="#">
                                    <li class="list-group-item list-group-item-action">
                                        <h6 class="fw-bold my-2">{{ $row->headline }}</h6>
                                        <div class="mt-3 d-flex justify-content-between">
                                            <span class="badge bg-primary rounded-pill">{{ $row->type }}</span>
                                            <small>{{ \App\Helpers\Date::tglIndo($row->tgl_upload) }}</small>
                                        </div>
                                    </li>
                                </a>
                            @endforeach
                        </ol>

                    </div>
                </div>
            </div>
        </div>
        <div class="mt-1 sum-satpen">
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
                    <div class="col-10 col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h2>{{ $row->jml_satpen }}</h2>
                                        <p class="text-uppercase">{{ $row->keterangan }}</p>
                                    </div>
                                    <h1>{{ $row->nm_jenjang }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php(++$num)
                    @if($num >= 4)
                        </div>
                        <div class="row justify-content-center justify-content-sm-start">
                        @php($num=0)
                    @endif
                @endforeach
            </div>
        </div>

{{--        <div class="row mt-3 mb-2 justify-content-center">--}}
{{--            <div class="col-10 col-sm-12">--}}
{{--                <div class="menu-title d-flex align-items-center justify-content-between">--}}
{{--                    <h4><span class="deff">Beranda</span> Informasi</h4>--}}
{{--                    <div class="line-title"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-10 col-sm-12">--}}
{{--                <div class="card card-beranda-informasi">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex flex-column flex-sm-row flex-card">--}}
{{--                            @foreach($berandaInformasi as $row)--}}
{{--                                <a href="#">--}}
{{--                                    <div class="card mx-3 mb-4 mb-sm-0">--}}
{{--                                        <img src="{{ asset("assets/images/products/". $row->image) }}" class="card-img-top" alt="...">--}}
{{--                                        <div class="card-body d-flex flex-column justify-content-between">--}}
{{--                                            <h5 class="card-title">{{ $row->headline }}</h5>--}}
{{--                                            <div class="d-flex justify-content-between mt-3">--}}
{{--                                                <p class="card-text mb-0">{{ \App\Helpers\Date::tglIndo($row->tgl_upload) }}</p>--}}
{{--                                                <p class="card-text text-dark">{{ $row->type }}</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>

    <div class="container-fluid login-side-right mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="py-6 px-6">
                    <p class="mb-0 fs-4 py-3"> Copyright &copy; {{ date('Y') }} Sistem Administrasi Pendidikan LP Ma'arif NU </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.highcharts.com/maps/highmaps.js"></script>
    <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
    <script>
        (async () => {

            const topology = await fetch(
                'https://code.highcharts.com/mapdata/countries/id/id-all.topo.json'
            ).then(response => response.json());

    // Prepare demo data. The data is joined to map using value of 'hc-key'
    // property by default. See API docs for 'joinBy' for more info on linking
    // data and map.
            const data = [
                ['id-3700', 10], ['id-ac', 11], ['id-jt', 12], ['id-be', 13],
                ['id-bt', 14], ['id-kb', 15], ['id-bb', 16], ['id-ba', 17],
                ['id-ji', 18], ['id-ks', 19], ['id-nt', 20], ['id-se', 21],
                ['id-kr', 22], ['id-ib', 23], ['id-su', 24], ['id-ri', 25],
                ['id-sw', 26], ['id-ku', 27], ['id-la', 28], ['id-sb', 29],
                ['id-ma', 30], ['id-nb', 31], ['id-sg', 32], ['id-st', 33],
                ['id-pa', 34], ['id-jr', 35], ['id-ki', 36], ['id-1024', 37],
                ['id-jk', 38], ['id-go', 39], ['id-yo', 40], ['id-sl', 41],
                ['id-sr', 42], ['id-ja', 43], ['id-kt', 44]
            ];

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
                    min: 0
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
