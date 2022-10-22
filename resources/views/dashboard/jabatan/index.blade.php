@extends('dashboard.layout.main')

@section('container')
<div class="content-wrapper">

    <section class="content-header mb-5 mt-2 border-bottom">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jabatan</h1>
                </div>
                <div class="col-6  d-flex flex-column justify-content-center align-items-end ">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">jabatan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
    @if (session()->has('pesan'))
        <div class="alert alert-success" role="alert">
            {{session('pesan')}}
        </div>
    @endif

<div class="mb-5">
    <a href="{{url('/jabatan/create')}}" class=" btn btn-primary">Tambah Jabatan Baru</a>
</div>


    <table class=" table table-bordered">
        <thead class=" table-dark">
            <tr>
                <th>No.</th>
                <th>Nama Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @forelse ($jabatans as $jabatan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$jabatan->nama}}</td>
                <td>
                    <a href="{{url('/jabatan/'.$jabatan->id.'/edit')}}" class="btn btn-success btn-sm">Edit</a>
                    <form action="{{url('/jabatan/'.$jabatan->id)}}" class="d-inline" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data ?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty

        @endforelse
    </table>
    {{$jabatans->links('pagination::bootstrap-5')}}
@endsection




