<div class="modal fade" id="editModal{{$data->id_transportasi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Transportasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="transportasi/edittp" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="text" value="{{$data->id_transportasi}}" name="id_transportasi" style="visibility: hidden">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inkode">Kode</label>
                            <input type="text" value="{{$data->kode}}" name="kode" class="form-control" id="inkode"
                                placeholder="Kode Transportasi">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inketerangan">Keterangan</label>
                            <input type="text" value="{{$data->keterangan}}" name="keterangan" class="form-control" id="inketerangan"
                                placeholder="Keterangan / Nama Transportasi">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="injumlahkursi">Jumlah Kursi</label>
                            <input type="number" value="{{$data->jumlah_kursi}}" name="jumlah_kursi" class="form-control" id="injumlahkursi"
                                placeholder="Jumlah Kursi">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputtransport">Jenis Transportasi</label>
                            <select id="inputtransport" name="id_type_transportasi" class="form-control">
                                <option selected>Choose...</option>
                                @foreach($tdata as $tranport_datas)
                                    @if ($tranport_datas->nama_transportasi===$data->nama_transportasi)
                                    <option value="{{$tranport_datas->id_type_transportasi}}" selected>
                                            {{$tranport_datas->nama_transportasi}}</option>
                                    @else
                                    <option value="{{$tranport_datas->id_type_transportasi}}">
                                            {{$tranport_datas->nama_transportasi}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Edit</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="delModal{{$data->id_transportasi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Transportasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apa anda benar-benar ingin menghapus data ini?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                <a class="btn btn-primary" href="transportasi/deltp/{{$data->id_transportasi}}">Iya</a>
                </div>
            </div>
        </div>
    </div>