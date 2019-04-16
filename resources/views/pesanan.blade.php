@extends('dashboard')

@section('contents')
<div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Pesanan</h1>
        <p class="mb-4">List Data pesanan travel pada aplikasi Travelijal</p>
        <a onclick="doPrintTable();" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-print"></i>
            </span>
            <span class="text text-white">Print</span>
          </a>
          <br><br>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rute Travel</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTablePesanan" cellspacing="0" style="width: 100vw">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Kode</th>
                    <th>Nama Penumpang</th>
                    <th>Tujuan</th>
                    <th>Tanggal Pesanan</th>
                    <th>Tanggal Berangkat</th>
                    <th>Harga</th>
                    <th>Transportasi</th>
                    <th>Kode Transportasi</th>
                    <th>Petugas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th colspan="2">Total Pendapatan</th>
                    <th colspan="8"></th>
                  </tr>
                </tfoot>
                <tbody>
                    @foreach($bulk as $data)
                    <tr>
                      <td>{{$data->id_pesanan}}</td>
                      <td>{{$data->kode_pemesanan}}</td>
                      <td>{{$data->nama_penumpang}}</td>
                      <td>{{$data->tujuan}}</td>
                      <td>{{$data->tanggal_pemesanan}}</td>
                      <td>{{$data->tanggal_berangkat}}</td>
                      <td>Rp @money($data->total_bayar)</td>
                      <td>{{$data->keterangan}}</td>
                      <td>{{$data->kode_tp}}</td>
                      <td>
                          @if ($data->id_petugas === 0)
                            <a href="{{action('PemesananController@validasi', $data->id_pesanan)}}" class="btn btn-success">Terima</a>&nbsp;&nbsp;
                            {{-- <button class="btn btn-danger">Tolak</button>&nbsp;&nbsp; --}}
                          @else
                              {{$data->name}}
                          @endif
                        </td>
                      <td>
                          <a target="_blank" href="{{action('PemesananController@downloadPDF', $data->id_pesanan)}}" class="btn btn-warning">Report</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
@endsection
