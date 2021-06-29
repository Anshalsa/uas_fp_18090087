@extends('list_hp.layout')
<br>
<div class="container">
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Kelola Data HP</h3>
            </div>
            <br>
            <div class="text-center">
                <h5>Selamat datang di halaman dashboard, <strong>{{ Auth::user()->name }}</strong></h5>
            </div>
@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb mt-3 mb-3">
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('list_hp.create') }}">Tambah Barang</a>
                <a href="/exportpdf" class="btn btn-info">Export PDF</a>
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
    <br>
   
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><p>{{ $message }}</p></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Merk HP</th>
            <th>Tipe HP</th>
            <th>Tahun Produksi</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($list_hp as $datahp)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/image/{{ $datahp->image }}" width="100px"></td>
            <td>{{ $datahp->merk_hp }}</td>
            <td>{{ $datahp->tipe_hp }}</td>
            <td>{{ $datahp->thn_produksi }}</td>
            <td>
                <form action="{{ route('list_hp.destroy',$datahp->id) }}" method="POST">
    
                    <a class="btn btn-primary btn-sm" href="{{ route('list_hp.edit',$datahp->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $list_hp->links() !!}
      
@endsection