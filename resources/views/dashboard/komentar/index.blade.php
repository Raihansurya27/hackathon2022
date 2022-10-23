@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Komentar</h1>
</div>
<section class="content-header mb-5 mt-2 border-bottom">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Komentar</h1>
            </div>
            <div class="col-6  d-flex flex-column justify-content-center align-items-end ">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Komentar</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
    @if (session()->has('pesan'))
        <div class="alert alert-success" role="alert">
            {{session('pesan')}}
        </div>
    @endif

    <p>
        <a href="{{url('/komentar/create')}}" class=" btn btn-primary">Tambah Komentar Baru</a>
    </p>
    <table class=" table table-borderless">
        <thead class=" table-dark">
            <tr>
                <th>No.</th>
                <th>Nama User</th>
                <th>Isi Komentar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @forelse ($komentars as $komentar)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$komentar->user->name}}</td>
                <td>{{$komentar->ket}}</td>
                <td>{!!$komentar->isi!!}</td>
                <td>
                    <a href="{{url('/komentar/'.$komentar->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{url('/komentar/'.$komentar->id)}}" class="d-inline" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data ?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty

        @endforelse
    </table>
    {{$komentars->links('pagination::bootstrap-5')}}
@endsection
