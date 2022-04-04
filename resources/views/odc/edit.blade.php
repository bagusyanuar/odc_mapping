@extends('base')

@section('css')
@endsection

@section('content')
    @if (\Illuminate\Support\Facades\Session::has('success'))
        <script>
            Swal.fire("Berhasil!", '{{\Illuminate\Support\Facades\Session::get('success')}}', "success")
        </script>
    @endif

    @if (\Illuminate\Support\Facades\Session::has('failed'))
        <script>
            Swal.fire("Gagal", '{{\Illuminate\Support\Facades\Session::get('failed')}}', "error")
        </script>
    @endif
    <div class="container-fluid pt-3">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <p class="font-weight-bold mb-0" style="font-size: 20px">Halaman ODC</p>
            <ol class="breadcrumb breadcrumb-transparent mb-0">
                <li class="breadcrumb-item">
                    <a href="/dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/odc">ODC</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit
                </li>
            </ol>
        </div>
        <div class="w-100 p-2">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-11">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="/odc/patch">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class="form-group w-100 mb-1">
                                    <label for="wilayah">Wilayah</label>
                                    <select class="form-control" id="wilayah" name="wilayah">
                                        @foreach($wilayah as $v)
                                            <option value="{{ $v->id }}" {{ $v->id === $data->wilayah_id ? 'selected' :'' }}>{{ $v->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-100 mb-1">
                                    <label for="name" class="form-label">Nama ODC</label>
                                    <input type="text" class="form-control" id="name" placeholder="Nama ODC"
                                           name="name" value="{{ $data->nama }}">
                                </div>
                                <div class="w-100 mb-1">
                                    <label for="latitude" class="form-label">Latitude</label>
                                    <input type="number" class="form-control" id="latitude" placeholder="Latitude"
                                           name="latitude" step="any" value="{{ $data->latitude }}">
                                </div>
                                <div class="w-100 mb-1">
                                    <label for="longitude" class="form-label">Longitude</label>
                                    <input type="number" class="form-control" id="longitude" placeholder="longitude"
                                           name="longitude" step="any" value="{{ $data->longitude }}">
                                </div>
                                <div class="w-100 mb-1">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea  class="form-control" id="deskripsi" placeholder="deskripsi"
                                               name="deskripsi" rows="3">{{ $data->deskripsi }}</textarea>
                                </div>
                                <div class="w-100 mb-2 mt-3 text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
