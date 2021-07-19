@section('content')

<div class="modal fade" id="ruangModal" tabindex="-1" aria-labelledby="ruangModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="ruangModalLabel">Tambah Ruang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="{{route('pegawai.pegawai')}}" method="post">
                @csrf
                
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama" 
                    name="nama" value="{{ old('nama') }}" id="nama">
                </div>
                <div class="form-group">
                    <label for="fakultas">Fakultas</label>
                    <input type="text" class="form-control" placeholder="Masukkan Fakultas" 
                    name="fakultas" value="{{ old('fakultas') }}" id="fakultas">
                </div>
                <div class="form-group">
                    <label for="pangkat">Pangkat</label>
                    <input type="text" class="form-control" placeholder="Masukkan Pangkat" 
                    name="pangkat" value="{{ old('pangkat') }}" id="pangkat">
                </div>
                <div class="form-group">
                    <label for="golongan">Golongan</label>
                    <input type="text" class="form-control" placeholder="Masukkan Golongan" 
                    name="golongan" value="{{ old('golongan') }}" id="golongan">
                </div>
                <div class="form-group">
                    <label for="jabfung">Jabatan Fungsional</label>
                    <input type="text" class="form-control" placeholder="Masukkan Jabatan Fungsional" 
                    name="jabfung" value="{{ old('jabfung') }}" id="jabfung">
                </div>
                <div class="form-group">
                    <label for="jabstruk">Jabatan Struktural</label>
                    <input type="text" class="form-control" placeholder="Masukkan Jabatan Struktural" 
                    name="jabstruk" value="{{ old('jabstruk') }}" id="jabstruk">
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" placeholder="Masukkan Jabatan" 
                    name="jabatan" value="{{ old('jabatan') }}" id="jabatan">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
        </div>
    </div>



    <section class="content">
<h2 class="mt-0">Data Ruang</h2>
  <div class="jumbotron">
  <div class="row">
  <div class="float-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ruangModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Ruang</button>
    </div>

      <table class="table table-bordered table-sm">
        <thead class="thead-dark">
          <tr class="text-center">
          
          <th scope="col">Nama</th>
          <th scope="col">Fakultas</th>
          <th scope="col">Pangkat</th>
          <th scope="col">Golongan</th>
          <th scope="col">Jabatan Fungsional</th>
          <th scope="col">Jabatan Struktural</th>
          <th scope="col">Jabatan</th>
          <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pegawai as $item)
          <tr class="text-center">
         
          <td>{{ $item->nip}}</td>
          <td>{{ $item->nama}}</td>
          <td>{{ $item->pangkat}}</td>
          <td>{{ $item->golongan}}</td>
          <td>{{ $item->jabstruk}}</td>
          <td>{{ $item->jabfung}}</td>
          <td>{{ $item->jabatan}}</td>
          <td>{{ $item->fakultas}}</td>
            <td>
            <form action="" method="POST" class="d-inline">
                        @method('Delete')
                        @csrf
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModal"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></button>
                        </form>
              </td>
          </tr>
          @endforeach
                    </tbody>
                </table>
                </div>

            </div>
            </section>

            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="updateModalLabel">Update Data Bank</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="">
            @method('PATCH')
            @csrf
                <div class="mb-3">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control" 
                    id="nip" placeholder="Masukkan NIP" name="nip" value="{{ $item->nip }}">
                </div>

                <div class="mb-3">
                    <label for="nama">Nama Pegawai</label>
                    <input type="text" class="form-control" 
                    id="nama" placeholder="Masukkan Nama Pegawai" name="nama" value="{{ $item->nama }}">
                  
                </div>

                <div class="mb-3">
                    <label for="kapasitas">Kapasitas</label>
                    <input type="text" class="form-control" 
                    id="kapasitas" placeholder="Masukkan Kapasitas" name="kapasitas" value="{{ $item->pangkat }}">
                    
                </div>

                <div class="mb-3">
                    <label for="golongan">Golongan</label>
                    <input type="text" class="form-control" 
                    id="golongan" placeholder="Masukkan golongan" name="golongan" value="{{ $item->golongan }}">
                    
                </div>
                <div class="mb-3">
                    <label for="jabstruk">jabstruk</label>
                    <input type="text" class="form-control" 
                    id="jabstruk" placeholder="Masukkan jabstruk" name="jabstruk" value="{{ $item->jabstruk }}">
                    
                </div>
                <div class="mb-3">
                    <label for="jabfung">jabfung</label>
                    <input type="text" class="form-control" 
                    id="jabfung" placeholder="Masukkan jabfung" name="jabfung" value="{{ $item->jabfung }}">
                    
                </div>
                <div class="mb-3">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" 
                    id="jabatan" placeholder="Masukkan jabatan" name="jabatan" value="{{ $item->jabatan }}">
                    
                </div>
                </div>
                <div class="mb-3">
                    <label for="fakultas">Fakultas</label>
                    <input type="text" class="form-control" 
                    id="fakultas" placeholder="Masukkan Fakultas" name="fakultas" value="{{ $item->fakultas }}">
                    
                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            
            </div>
            </form>
        </div>
        </div>
</div>
@endsection