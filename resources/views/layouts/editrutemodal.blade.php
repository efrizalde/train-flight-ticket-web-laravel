<div class="modal fade" id="editRouteModal{{$rutes->id_rute}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Rute</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="rute/editrute" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <input value="{{$rutes->id_rute}}" name="id_rute" class="form-control" id="inid" style="visibility: hidden">
                        <div class="form-group col-md-6">
                            <label for="inkode">Kode</label>
                            <input type="text" value="{{$rutes->kode}}" name="kode" class="form-control" id="inkode" placeholder="Kode Rute">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="intujuan">Tujuan</label>
                            <input type="text" value="{{$rutes->tujuan}}" name="tujuan" class="form-control" id="intujuan"
                                placeholder="Tujuan Rute">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inruteawal">Rute Awal</label>
                        <input type="text" value="{{$rutes->rute_awal}}" name="rute_awal" class="form-control" id="inruteawal"
                                placeholder="Pemberangkatan">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inruteakhir">Rute Akhir</label>
                            <input type="text" value="{{$rutes->rute_akhir}}" name="rute_akhir" class="form-control" id="inruteakhir"
                                placeholder="Kedatangan">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inharga">Harga</label>
                            <input type="number" value="{{$rutes->harga}}" name="harga" class="form-control" id="inharga"
                                placeholder="Harga Travel">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputtransport">Transportasi</label>
                            <select id="inputtransport" name="id_transportasi" class="form-control">
                                @foreach($tranport_data as $tranport_datas)
                                    @if ($rutes->id_transportasi===$tranport_datas->id_transportasi)  
                                    <option value="{{$tranport_datas->id_transportasi}}" selected>{{$tranport_datas->kode}} (
                                        {{$tranport_datas->keterangan}})</option>
                                    @else
                                    <option value="{{$tranport_datas->id_transportasi}}">{{$tranport_datas->kode}} (
                                        {{$tranport_datas->keterangan}})</option>
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

<div class="modal fade" id="delModal{{$rutes->id_rute}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus  Rute</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apa anda benar-benar ingin menghapus data ini?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <a class="btn btn-primary" href="rute/delrute/{{$rutes->id_rute}}">Iya</a>
                </div>
            </div>
        </div>
    </div>