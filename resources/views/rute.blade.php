@extends('dashboard')

@section('contents')
<!-- Add Modal-->
<div class="modal fade" id="addRouteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Rute</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="rute/addrute" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inkode">Kode</label>
                            <input type="text" name="kode" class="form-control" id="inkode" placeholder="Kode Rute">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="intujuan">Tujuan</label>
                            <input type="text" name="tujuan" class="form-control" id="intujuan"
                                placeholder="Tujuan Rute">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inruteawal">Rute Awal</label>
                            <input type="text" name="rute_awal" class="form-control" id="inruteawal"
                                placeholder="Pemberangkatan">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inruteakhir">Rute Akhir</label>
                            <input type="text" name="rute_akhir" class="form-control" id="inruteakhir"
                                placeholder="Kedatangan">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inharga">Harga</label>
                            <input type="number" name="harga" class="form-control" id="inharga"
                                placeholder="Harga Travel">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputtransport">Transportasi</label>
                            <select id="inputtransport" name="id_transportasi" class="form-control">
                                <option selected>Choose...</option>
                                @foreach($tranport_data as $tranport_datas)
                                <option value="{{$tranport_datas->id_transportasi }}">{{$tranport_datas->kode}} (
                                    {{$tranport_datas->keterangan}} )</option>
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
    <h1 class="h3 mb-2 text-gray-800">Rute</h1>
    <p class="mb-4">Detail data rute yang tersedia di aplikasi Travelijal</p>

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
            <h6 class="m-0 font-weight-bold text-primary">Rute Travel</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="90vw" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Rute</th>
                            <th>Kode</th>
                            <th>Tujuan</th>
                            <th>Rute Awal</th>
                            <th>Rute Akhir</th>
                            <th>Harga</th>
                            <th>Jenis Transportasi</th>
                            <th>Jumlah Kursi</th>
                            <th>Keterangan</th>
                            @if (Auth::user()->id_level === 1)
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Rute</th>
                            <th>Kode</th>
                            <th>Tujuan</th>
                            <th>Rute Awal</th>
                            <th>Rute Akhir</th>
                            <th>Harga</th>
                            <th>Jenis Transportasi</th>
                            <th>Jumlah Kursi</th>
                            <th>Keterangan</th>
                            @if (Auth::user()->id_level === 1)
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($bulk as $rutes)
                        <tr>
                            <td>{{$rutes->id_rute}}</td>
                            <td>{{$rutes->kode}}</td>
                            <td>{{$rutes->tujuan}}</td>
                            <td>{{$rutes->rute_awal}}</td>
                            <td>{{$rutes->rute_akhir}}</td>
                            <td>Rp @money($rutes->harga)</td>
                            <td>{{$rutes->nama_transportasi}}</td>
                            <td>{{$rutes->jumlah_kursi}}</td>
                            <td>{{$rutes->keterangan}}</td>
                            @if (Auth::user()->id_level === 1)
                            <td>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editRouteModal{{$rutes->id_rute}}">Edit</a>&nbsp;&nbsp;
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delModal{{$rutes->id_rute}}">Hapus</a>&nbsp;&nbsp;
                            </td>
                            @include('layouts.editrutemodal')
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
