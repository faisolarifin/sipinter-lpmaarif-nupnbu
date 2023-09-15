@extends('template.layout', [
    'title' => 'Siapinter - Posting Informasi'
])
@section('navbar')
    @include('template.navadmin')
@endsection

@section('container')
<!--  Row 1 -->
<div class="row container-begin">
    <div class="col-sm-12">

        <nav class="mt-2 mb-4" aria-label="breadcrumb">
            <ul id="breadcrumb" class="mb-0">
                <li><a href="#"><i class="ti ti-home"></i></a></li>
                <li><a href="#"><span class=" fa fa-info-circle"> </span> Artikel</a></li>
                <li><a href="#"><span class="fa fa-snowflake-o"></span> Posting Informasi</a></li>
            </ul>
        </nav>

        @include('template.alert')

        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Posting Informasi</h5>
                <form action="{{ route('informasi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="headline" class="form-label">Headline</label>
                        <input type="text" class="form-control form-control-sm @error('headline') is-invalid @enderror" id="headline" name="headline" value="{{ old('headline') }}">
                        <div class="invalid-feedback">
                            @error('headline') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <select name="type" id="type" class="form-select form-select-sm @error('type') is-invalid @enderror">
                                    <option value="SK">SK</option>
                                    <option value="Piagam">Piagam</option>
                                    <option value="Berita">Berita</option>
                                    <option value="Pengumuman">Pengumuman</option>
                                </select>
                                <div class="invalid-feedback">
                                    @error('type') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" class="form-control form-control-sm @error('image') is-invalid @enderror" id="image" name="image">
                                <div class="invalid-feedback">
                                    @error('image') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="3" name="contents"></textarea>
                        <div class="invalid-feedback">
                            @error('content') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="tag" class="form-label">Tag</label>
                            <input type="text" class="form-control form-control-sm" id="tag" name="tag">
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="fileuploads" class="form-label">File Attachment</label>
                                <input type="file" class="form-control form-control-sm" id="fileuploads" name="fileuploads[]" multiple>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Posting</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
    <!--ckeditor editor-->
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
