@extends('dashboard')

@section('contents')
<!-- Add Modal-->
<div class="modal fade" id="addRouteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Transportasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="transportasi/addtp" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inkode">Kode</label>
                            <input type="text" name="kode" class="form-control" id="inkode"
                                placeholder="Kode Transportasi">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inketerangan">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="inketerangan"
                                placeholder="Keterangan / Nama Transportasi">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="injumlahkursi">Jumlah Kursi</label>
                            <input type="number" name="jumlah_kursi" class="form-control" id="injumlahkursi"
                                placeholder="Jumlah Kursi">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputtransport">Jenis Transportasi</label>
                            <select id="inputtransport" name="id_type_transportasi" class="form-control">
                                <option selected>Choose...</option>
                                @foreach($tdata as $tranport_datas)
                                <option value="{{$tranport_datas->id_type_transportasi }}">
                                    {{$tranport_datas->nama_transportasi}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Tambah</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Transportasi</h1>
    <p class="mb-4">Data Transportasi yang tersedia pada aplikasi travelijal</p>

    @if (Auth::user()->id_level === 1)
    <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#addRouteModal">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah</span>
    </a>
    <br><br>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Trasnportasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Transportasi</th>
                            <th>Kode</th>
                            <th>Keterangan</th>
                            <th>Jumlah Kursi</th>
                            <th>Jenis Transportasi</th>
                            @if (Auth::user()->id_level === 1)
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Transportasi</th>
                            <th>Kode</th>
                            <th>Keterangan</th>
                            <th>Jumlah Kursi</th>
                            <th>Jenis Transportasi</th>
                            @if (Auth::user()->id_level === 1)
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($bulk as $data)
                        <tr>
                            <td>{{$data->id_transportasi}}</td>
                            <td>{{$data->kode}}</td>
                            <td>{{$data->keterangan}}</td>
                            <td>{{$data->jumlah_kursi}}</td>
                            <td>{{$data->nama_transportasi}}</td>
                            @if (Auth::user()->id_level === 1)
                            <td>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$data->id_transportasi}}">Edit</a>&nbsp;&nbsp;
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delModal{{$data->id_transportasi}}">Hapus</a>&nbsp;&nbsp;
                            </td>
                            @include('layouts.transportmodal')
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
