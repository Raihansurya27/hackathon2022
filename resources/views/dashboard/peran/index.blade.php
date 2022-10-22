@extends('dashboard.layout.main')

@section('container')

<section class="content-header mb-5 mt-2 border-bottom">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Peran</h1>
            </div>
            <div class="col-6  d-flex flex-column justify-content-center align-items-end ">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Peran</li>
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
        <a href="{{url('/peran/create')}}" class=" btn btn-primary">Tambah Peran/Role Baru</a>
    </p>
    <table class=" table table-borderless">
        <thead class=" table-dark">
            <tr>
                <th>No.</th>
                <th>Nama Peran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @forelse ($perans as $peran)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$peran->nama}}</td>
                <td>
                    <a href="{{url('/peran/'.$peran->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{url('/peran/'.$peran->id)}}" class="d-inline" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data ?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty

        @endforelse
    </table>
    {{$perans->links('pagination::bootstrap-5')}}
@endsection
