@extends('list_hp.layout')
  
@section('content')
   
<div class="container mt-5">
   
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Tambah Data
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                <strong>Maaf!</strong> Mohon lengkapi data!<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('list_hp.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="merk_hp">Merk HP</label>
                    <input type="text" name="merk_hp" class="form-control" id="merk_hp" aria-describedby="merk_hp" placeholder="Masukkan Merk HP">
                </div>
                <div class="form-group">
                    <label for="tipe_hp">Tipe HP</label>
                    <input type="text" name="tipe_hp" class="form-control" id="tipe_hp" aria-describedby="tipe_hp" placeholder="Masukkan Tipe HP">
                </div>
                <div class="form-group">
                    <label for="thn_produksi">Tahun Produksi</label>
                    <input type="number" name="thn_produksi" class="form-control" id="thn_produksi" aria-describedby="thn_produksi" placeholder="Masukkan Tahun Produksi">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" placeholder="image">
                </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('list_hp.index') }}"> Kembali</a>
            </div>
            </form>
            </div>
        </div>
    </div>
    </div>
@endsection