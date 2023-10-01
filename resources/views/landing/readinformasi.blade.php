@extends('template.general', [
    'title' => "Sipinter - ". $readInfo->headline
])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}" />
@endsection

@section('container')
    @include('template.navhome')

    <div class="container container-body">
        <div class="row justify-content-center py-4 px-2 mt-3 mt-sm-5 rounded">
            <div class="col-sm-9">
                <div class="card shadow-none card-read-info">
                    <div class="card-body p-0">

                        <nav aria-label="breadcrumb">
                            <ul id="breadcrumb" class="m-0">
                                <li><a href="#"><i class="ti ti-home"></i></a></li>
                                <li><a href="#"><span class=" fa fa-info-circle"> </span> Informasi</a></li>
                                <li><a href="#"><span class="fa fa-snowflake-o"></span> {{ \Illuminate\Support\Str::limit($readInfo->headline, 60) }}</a></li>
                            </ul>
                        </nav>

                        <div class="card shadow-none bg-white border mt-1">
                            <div class="card-body">
                                <h4>{{ $readInfo->headline }}</h4>
                                <small>{{ Date::tglMasehi($readInfo->tgl_upload) }}</small>

                                <div class="text-center mt-3 mb-4">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($readInfo->image) }}" alt="..." width="70%">
                                </div>

                                {!! $readInfo->content !!}

                                <div class="mt-2">
                                    @foreach(explode(" ", $readInfo->tag) as $row)
                                        <span class="badge bg-coksu me-1">{{ $row }}</span>
                                    @endforeach
                                </div>

                                <div class="file-info d-flex mt-3">
                                    @foreach($readInfo->file as $row)
                                        <div class="d-flex justify-content-between align-items-center py-3 px-2 slip-file">
                                            <h6 class="mb-0">{{ substr($row->fileupload, 14) }}</h6>
                                            <div class="ms-sm-2">
                                                <a href="{{ route('informasi.download', substr($row->fileupload, 14)) }}" class="btn btn-sm"><i class="ti ti-download"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

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
                                        {!! Str::limit($row->content, 70) !!}
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
