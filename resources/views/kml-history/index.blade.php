@extends('base')

@section('css')
@endsection

@section('content')
    @if (\Illuminate\Support\Facades\Session::has('success'))
        <script>
            Swal.fire("Berhasil!", '{{\Illuminate\Support\Facades\Session::get('success')}}', "success")
        </script>
    @endif
    <div class="container-fluid pt-3">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <p class="font-weight-bold mb-0" style="font-size: 20px">Halaman KML History</p>
            <ol class="breadcrumb breadcrumb-transparent mb-0">
                <li class="breadcrumb-item">
                    <a href="/dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">KML History
                </li>
            </ol>
        </div>
        <div class="w-100 p-2">
            <div class="text-right mb-2 pr-3">
                <a href="/kml-history/tambah" class="btn btn-primary"><i class="fa fa-plus mr-1"></i><span class="font-weight-bold">Tambah</span></a>
            </div>
            <table id="table-data" class="display w-100 table table-bordered">
                <thead>
                <tr>
                    <th width="10%" class="text-center">#</th>
                    <th>Nama ODC</th>
                    <th>Wilayah</th>
                    <th>File</th>
                    <th width="20%" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td width="10%" class="text-center">{{ $loop->index + 1 }}</td>
                        <td>{{ $v->odc->nama }}</td>
                        <td>{{ $v->odc->wilayah->nama }}</td>
                        <td>
                            <a href="{{ asset($v->url) }}" target="_blank">Download</a>
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="{{ $v->id }}"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('/js/helper.js') }}"></script>
    <script type="text/javascript">
        function destroy(id) {
            AjaxPost('/kml-history/destroy', {id}, function () {
                window.location.reload();
            });
        }

        function eventDelete() {
            $('.btn-delete').on('click', function (e) {
                e.preventDefault();
                let id = this.dataset.id;
                AlertConfirm('Yakin Ingin Menghapus Data', 'Data yang di hapus tidak dapat di kembalikan', function () {
                    destroy(id);
                })
            });
        }
        $(document).ready(function () {
            $('#table-data').DataTable({
                "fnDrawCallback": function (setting) {
                    eventDelete();
                }
            });
            eventDelete();
        });
    </script>
@endsection
