@extends('template.general', [
    'title' => "Siapinter - Sistem Administrasi Pendidikan Terpadu LP Ma'arif NU"
])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}" />
@endsection

@section('container')
    @include('template.navhome')

    <div class="container container-body">
        <div class="row justify-content-center py-4 px-2 mt-3 mt-sm-5 rounded">
            <div class="col-sm-9">
                <div class="card shadow-none">
                    <div class="card-body p-0">
                        <h5 class="card-title fw-medium mb-0">BREADCRUMB</h5>
                        <div class="card shadow-none bg-white border mt-3">
                            <div class="card-body">
                                <h4>{{ $readInfo->headline }}</h4>
                                <img src="" alt="..">
                                {{ $readInfo->content }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-11 col-sm-3">
                <div class="card mb-3 shadow-none">
                    <div class="card-body p-0">
                        <div class="mx-3">
                            <h5 class="card-title fw-medium mb-0">INFORMASI LAINNYA</h5>
                        </div>
                        <ol class="list-group mt-3">
                            @foreach($berandaInformasi as $row)
                                <a href="{{ route('informasi', $row->slug) }}">
                                    <li class="list-group-item list-group-item-action">
                                        <h6 class="fw-bold mt-2 mb-1">{{ $row->headline }}</h6>
                                        <p>{{ Str::limit($row->content, 70) }}</p>
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
    </div>


    @include('template.footer')

@endsection
