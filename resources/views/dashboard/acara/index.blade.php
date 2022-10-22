@extends('dashboard.layout.main')

@section('container')



<section class="content-header mb-5 mt-2 border-bottom">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Acara</h1>
            </div>
            <div class="col-6  d-flex flex-column justify-content-center align-items-end ">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Acara</li>
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

    <div class="mb-5">


        <a href="{{url('/acara/create')}}" class=" btn btn-primary">Tambah Acara\Event Baru</a>
    </div>
    <table class=" table table-bordered">
        <thead class=" table-dark">
            <tr>
                <th>No.</th>
                <th>Nama Acara\Event</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @forelse ($acaras as $acara)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$acara->nama}}</td>
                <td>Rp. {{$acara->harga}}</td>
                <td>{!!$acara->deskripsi!!}</td>
                @empty($acara->gambar)
                    <td><img src="{{asset('img/noimage.png')}}" alt="{{$acara->nama}}" style="width: 125px; height: 100px;"></td>
                @else
                    <td><img src="{{asset('img/event/'.$acara->gambar)}}" alt="{{$acara->nama}}" style="width: 125px; height: 100px;"></td>
                @endempty
                <td>
                    <a href="{{url('/acara/'.$acara->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{url('/acara/'.$acara->id)}}" class="d-inline" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data ?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty

        @endforelse
    </table>
    {{$acaras->links('pagination::bootstrap-5')}}
@endsection
