@extends('dashboard')

@section('contents')
    <!-- Add Modal-->
    <div class="modal fade" id="addRouteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Petugas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <form action="petugas/register" method="POST" autocomplete="off">
              {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="innama">Nama Petugas</label>
                        <input type="name" name="name" class="form-control" id="innama" placeholder="Nama Petugas" required autofocus>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inusername">Username</label>
                        <input autocomplete="off" type="text" name="username" class="form-control" id="inusername" placeholder="Username Petugas" required autofocus>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inpass">Password</label>
                        <input autocomplete="off" type="password" name="password" class="form-control" id="inpass" placeholder="Password" required autofocus>
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
        <h1 class="h3 mb-2 text-gray-800">Petugas</h1>
        <p class="mb-4">Data Petugas yang membantu mengurus Travelijal</p>

        
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
            <h6 class="m-0 font-weight-bold text-primary">Petugas</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID Petugas</th>
                    <th>Nama Petugas</th>
                    <th>Username</th>
                    <th>Level</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID Petugas</th>
                    <th>Nama Petugas</th>
                    <th>Username</th>
                    <th>Level</th>
                  </tr>
                </tfoot>
                <tbody>
                    @foreach($data as $datas)
                    <tr>
                      <td>{{$datas->id_petugas}}</td>
                      <td>{{$datas->name}}</td>
                      <td>{{$datas->username}}</td>
                      <td>{{$datas->nama_level}}</td>
                    </tr>
                    @endforeach 
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
@endsection
