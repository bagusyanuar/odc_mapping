@extends('base')

@section('content')
    @if (\Illuminate\Support\Facades\Session::has('success'))
        <script>
            Swal.fire("Berhasil!", '{{\Illuminate\Support\Facades\Session::get('success')}}', "success")
        </script>
    @endif
    <div class="container-fluid pt-3">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <p class="font-weight-bold mb-0" style="font-size: 20px">Halaman ODC</p>
            <ol class="breadcrumb breadcrumb-transparent mb-0">
                <li class="breadcrumb-item">
                    <a href="/dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">ODC
                </li>
            </ol>
        </div>
        <div class="w-100 p-2">
            <div class="text-right mb-2 pr-3">
                <a href="/odc/tambah" class="btn btn-primary"><i class="fa fa-plus mr-1"></i><span class="font-weight-bold">Tambah</span></a>
            </div>
            <table id="table-data" class="display w-100 table table-bordered">
                <thead>
                <tr>
                    <th width="5%" class="text-center">#</th>
                    <th width="15%">Nama</th>
                    <th width="15%">Wilayah</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th width="20%">Deskripsi</th>
                    <th width="10%" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td width="10%" class="text-center">{{ $loop->index + 1 }}</td>
                        <td>{{ $v->nama }}</td>
                        <td>{{ $v->wilayah->nama }}</td>
                        <td>{{ $v->latitude }}</td>
                        <td>{{ $v->longitude }}</td>
                        <td>{{ $v->deskripsi }}</td>
                        <td class="text-center">
                            <a href="/odc/edit/{{ $v->id }}" class="btn btn-sm btn-warning btn-edit" data-id="{{ $v->id }}"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table-data').DataTable();
        });
    </script>
@endsection
