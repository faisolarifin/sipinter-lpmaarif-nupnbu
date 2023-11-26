@extends('template.layout', [
    'title' => 'Siapintar - Data Users'
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
                <li><a href="#"><span class=" fa fa-info-circle"> </span> Manajemen User</a></li>
                <li><a href="#"><span class="fa fa-snowflake-o"></span> Users</a></li>
            </ul>
        </nav>

        @include('template.alert')

        <div class="card w-100">
            <div class="card-body pt-3">

                <div class="d-flex justify-content-between align-items-sm-center mt-2 mb-3">
                    <div>
                        <h5 class="mb-0">Data Users</h5>
                        <small>list akun user satuan pendidikan</small>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover" id="mytable">
                        <thead>
                        <tr>
                            <th scope="col" width="40">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status Akun</th>
                            <th scope="col" width="150" class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no=0)
                        @foreach($satpenUsers as $row)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ strtoupper($row->role) }}</td>
                                <td><span class="badge {{ $row->status_active == 'active' ? 'bg-success' : 'bg-danger' }}">{{ $row->status_active }}</span></td>
                                <td>
                                    <a href="{{ route('users.reset', $row->id_user) }}" title="Reset Password"><button class="btn btn-sm btn-success resetBtn">
                                            <i class="ti ti-reload"></i></button>
                                    </a>
                                    <a href="{{ route('users.block', $row->id_user) }}" title="Block Akun"><button class="btn btn-sm btn-danger blockBtn">
                                            <i class="ti ti-lock"></i></button>
                                    </a>
                                    <a href="{{ route('users.unblock', $row->id_user) }}" title="Unblock Akun"><button class="btn btn-sm btn-warning unblockBtn">
                                            <i class="ti ti-lock-open"></i></button>
                                    </a>
                                    <form action="{{ route('users.destroy', $row->id_user) }}" method="post" class="d-inline deleteBtn" title="Hapus Akun">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection


@section('scripts')
<script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/dataTables.bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#mytable').DataTable();
    });

    $(".resetBtn").on('click', function () {
        if (confirm("apakah anda akan mereset akun?")) {
            return true;
        }
        return false;
    });

    $(".blockBtn").on('click', function () {
        if (confirm("benar anda akan memblokir akun?")) {
            return true;
        }
        return false;
    });

    $(".unblockBtn").on('click', function () {
        if (confirm("benar anda akan memblokir akun?")) {
            return true;
        }
        return false;
    });

    $(".deleteBtn").on('click', function () {
        if (confirm("benar anda akan menghapus akun, tindakan ini akan menghapus satuan pendidikan?")) {
            return true;
        }
        return false;
    });

</script>
@endsection
