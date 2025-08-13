@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-selectpicker.css') }}" />
@endsection

<select class="selectpicker" data-show-subtext="false" data-live-search="true" name="{{ $name }}">
    @foreach ($data as $item)
        <option value="{{ $item[$val] }}">{{ $prefix . $item[$label] }}</option>
    @endforeach
</select>

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>
        $("select[name='wilayah']").on('change', function() {
            const selectedValue = this.value;
            const currentUrl = new URL(window.location.href);
            const params = currentUrl.searchParams;

            // Tambahkan atau update query param
            params.set('wilayah', selectedValue);

            // Buat URL baru dengan parameter yang sudah diperbarui
            currentUrl.search = params.toString();

            // Redirect ke URL baru
            window.location.href = currentUrl.toString();
        });
    </script>
@endsection
