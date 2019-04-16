<table class="table table-bordered" id="dataTablePesanan" cellspacing="0" style="width: 120vw">
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
              <td>Rp {{$data->total_bayar}}</td>
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
                  <a target="_blank" href="{{action('PemesananController@downloadPDF', $data->id_pesanan)}}" class="btn btn-warning">Generate Report</a>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>