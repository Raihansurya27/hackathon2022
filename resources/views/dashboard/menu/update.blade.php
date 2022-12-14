@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update Menu</h1>
</div>
    <div class="row">
        <div class="col-lg-6">
            <form action="{{url('/menu/'.$menus->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Menu</label>
                    <input type="text" class="form-control @error('nama')is-invalid
                    @enderror" id="nama" placeholder="Contoh: Rendang Ikan" name="nama" value="{{old('nama',$menus->nama)}}">
                    @error('nama')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Menu</label>
                    <input type="text" class="form-control @error('harga')is-invalid
                    @enderror" id="harga" placeholder="Contoh: 15000" name="harga" value="{{old('harga',$menus->harga)}}">
                    @error('harga')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tipemenu_id" class="form-label">Tipe Menu</label> <br>
                    <select class="form-select" aria-label="Default select example" name="tipemenu_id" id="tipemenu_id">
                        <option selected>Pilih Tipe Menu</option>
                        @forelse ($tipes as $tipe)
                        @if(old('tipemenu_id',$menus->tipemenu_id)==$tipe->id)
                            <option value="{{$tipe->id}}" selected>{{$tipe->nama}}</option>
                        @else
                            <option value="{{$tipe->id}}">{{$tipe->nama}}</option>
                        @endif
                        @empty
                            <option>Tidak ada data jurusan</option>
                        @endforelse
                      </select>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Menu</label>
                    <textarea class="form-control @error('deskripsi')is-invalid
                    @enderror" id="deskripsi" rows="3" placeholder="Contoh: Menu ini enak" name="deskripsi">{{old('deskripsi',$menus->deskripsi)}}</textarea>
                    @error('deskripsi')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Menu</label>
                    <input type="file" class="form-control  @error('gambar')is-invalid
                    @enderror" name="gambar" id="gambar" placeholder="Gambar Menu" value="{{old('gambar',$menus->gambar)}}">
                    @error('gambar')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
