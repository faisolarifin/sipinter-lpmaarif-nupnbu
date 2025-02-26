@extends('template.general', [
    'title' => "Dashboard - Sistem Administrasi Pendidikan Terpadu LP Ma'arif NU PBNU"
])

@section('style')
  <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/custom-selectpicker.css') }}" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <style>
    .swiper {
      width: 100%;
      padding-bottom: 50px;
    }
    .swiper-pagination {
      margin-top: 20px;
    }
    .swiper-slide .card {
        height: 100%;
        display: flex;
        flex-direction: column;
    }
   </style>
@endsection

@section('container')
    @include('template.navhome')

    <div class="container-fluid px-0">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('assets/images/backgrounds/maarif-pbnu1.jpg') }}" width="100%" height="100%" class="bd-placeholder-img" alt="...">
                <div class="container">
                    <div class="carousel-caption text-center">
                        <div class="carousel-caption-bg">
                            <h2 style="color:#327B32;">SELAMAT DATANG DI LAYANAN SIPINTER</h2>
                            <p class="mb-1">Sistem administrasi pendidikan terpadu lembaga pendidikan Ma'arif NU PBNU</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/images/backgrounds/maarif-pbnu1.jpg') }}" width="100%" height="100%" class="bd-placeholder-img" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/images/backgrounds/maarif-pbnu1.jpg') }}" width="100%" height="100%" class="bd-placeholder-img" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container container-body">
        <div class="row justify-content-center" style="margin-top:-20rem">
            <div class="col-sm-10 d-flex flex-column text-center row-slide-map py-4 px-5 row-swipe-up rounded" style="z-index:999;">
                <div class="card shadow-none">
                    <div class="card-body py-0 px-1">
                        <div id="map-indonesia"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 sum-satpen">
            <div class="row mb-3 justify-content-center">
                <div class="col-11 col-sm-12">
                    <div class="menu-title d-flex align-items-center justify-content-between">
                        <h4><span class="deff">Rekap Data</span> Pendidikan</h4>
                        <div class="line-title"></div>
                    </div>
                </div>
            </div>
            <div class="row px-3 px-sm-0 justify-content-center justify-content-sm-start">
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

        <div class="mt-5 sum-satpen">
            <div class="row mb-3 justify-content-center">
                <div class="col-11 col-sm-12">
                    <div class="menu-title d-flex align-items-center justify-content-between">
                        <h4>SEKOLAH?? DI MA'ARIF AJA</h4>
                    </div>
                </div>
            </div>
            <div class="row px-3 px-sm-0 justify-content-center justify-content-sm-start border">
                <div class="col-12 col-sm-3">
                    <div class="my-2 my-sm-4">
                        <select class="selectpicker" data-show-subtext="false" data-live-search="true" title="Pronvisi" name="provinsi">
                            @foreach($provinsi as $row)
                                <option value="{{ $row->id_prov }}">{{ $row->nm_prov }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="my-2 my-sm-4">
                        <select class="selectpicker" data-show-subtext="false" data-live-search="true" title="Kabupaten/Kota" name="kabupaten">
                            <!-- DIISI OTOMATIS DENGAN AJAX -->
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="my-2 my-sm-4">
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan" required>
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="d-flex flex-column gap-sm-3 flex-sm-row">
                        <div class="my-2 my-sm-4">
                            <select class="selectpicker" data-show-subtext="false" data-live-search="true" title="Jenjang Pendidikan" name="jenjang">
                                @foreach($jenjang as $row)
                                    <option value="{{ $row->id_jenjang }}">{{ $row->nm_jenjang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-2 my-sm-4">
                            <button type="submit" class="btn btn-primary"><i class="ti ti-search"></i> Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 sum-satpen">
            <div class="row mb-3 justify-content-center">
                <div class="col-11 col-sm-12">
                    <div class="menu-title d-flex align-items-center justify-content-between">
                        <h4>BERANDA INFORMASI</h4>
                    </div>
                </div>
            </div>
            <div class="row px-3 px-sm-0 justify-content-center justify-content-sm-start">
                  <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($berandaInformasi as $row)
                        <div class="swiper-slide">
                            <a href="{{ route('informasi', $row->slug) }}">
                            <div class="card mx-auto me-sm-4" style="width:13.6rem">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($row->image) }}" class="card-img-top" alt="...">
                                <div class="card-body px-3 pt-3 pb-3">
                                    <h6 class="card-title mb-3 fs-4">{{ $row->headline }}</h6>
                                    <p class="mb-0 text-dark fs-3">{!! strip_tags(Str::limit($row->content , 50)) !!}</p>
                                </div>
                                <div class="card-footer d-flex justify-content-between px-2">
                                    <p class="card-text fs-2 mb-0">{{ Date::hariIni($row->tgl_upload). ", ". Date::tglIndo($row->tgl_upload) }}</p>
                                    <span class="badge py-1 px-1 bg-coksu fs-2">{{ $row->type }}</span>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </div>

    </div>

    @include('template.footer')

@endsection

@section('scripts')
    <script src="https://code.highcharts.com/maps/highmaps.js"></script>
    <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>
        $('.selectpicker').selectpicker();

        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 5,
            spaceBetween: 10,
            loop: true,
            loopFillGroupWithBlank: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

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
                    name: 'Jumlah Satpen',
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

        $("select[name='provinsi']").on('change', function() {
            const provId = $(this).val();

            $.ajax({
                url: "{{ route('api.kabupatenbyprov', ['provId' => ':param']) }}".replace(':param', provId),
                type: "GET",
                dataType: 'json',
                success: function(res) {

                    let $select = $("select[name='kabupaten']");
                    $select.empty();
                    $.each(res,function(key, value) {
                        $select.append('<option value=' + value.id_kab + '>' + value.nama_kab + '</option>');
                    });

                    $('.selectpicker').selectpicker('refresh');
                }
            })
        });
    </script>
@endsection
