@extends('template.general', [
    'title' => "Informasi - Sistem Administrasi Pendidikan Terpadu LP Ma'arif NU PBNU"
])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}" />
@endsection

@section('container')
    @include('template.navhome')

    <div class="container container-body">
        <div class="row mt-3 mt-sm-5">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ul id="breadcrumb" class="m-0">
                        <li><a href="#"><i class="ti ti-home"></i></a></li>
                        <li><a href="#"><span class="fa fa-snowflake-o"></span> Semua Informasi </a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-11 col-sm-12">
                <div class="card-group">
                    @foreach($listInformasi as $row)
                    <a href="{{ route('informasi', $row->slug) }}">
                    <div class="card mx-auto me-sm-4" style="width:13.6rem">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($row->image) }}" class="card-img-top" alt="...">
                        <div class="card-body px-3 pt-3 pb-3">
                            <h6 class="card-title mb-3 fs-4">{{ $row->headline }}</h6>
                            <p class="mb-0 text-dark">{!! strip_tags(Str::limit($row->content , 50)) !!}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between px-2">
                            <p class="card-text fs-2 mb-0">{{ Date::hariIni($row->tgl_upload). ", ". Date::tglIndo($row->tgl_upload) }}</p>
                            <span class="badge py-1 px-1 bg-coksu fs-2">{{ $row->type }}</span>
                        </div>
                    </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('template.footer')

@endsection
