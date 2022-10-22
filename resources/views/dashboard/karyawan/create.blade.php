@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Entri Data Karyawan Baru</h1>
</div>
    <div class="row">
        <div class="col-lg-6">
            <form action="{{url('/karyawan')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Karyawan</label>
                    <input type="text" class="form-control @error('nama')is-invalid
                    @enderror" id="nama" placeholder="Contoh: Muhammad Raihan Surya" name="nama" value="{{old('nama')}}">
                    @error('nama')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jabatan_id" class="form-label">Jabatan Karyawan</label> <br>
                    <select class="form-select" aria-label="Default select example" name="jabatan_id" id="jabatan_id">
                        <option selected>Pilih Jabatan</option>
                        @forelse ($jabatans as $jabatan)
                            <option value="{{$jabatan->id}}">{{$jabatan->nama}}</option>
                        @empty
                            <option>Tidak ada data jurusan</option>
                        @endforelse
                      </select>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Karyawan</label>
                    <textarea class="form-control ckeditor @error('deskripsi')is-invalid
                    @enderror" id="deskripsi" rows="3" name="deskripsi">{{old('deskripsi')}}</textarea>
                    @error('deskripsi')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Karyawan</label>
                    <input type="file" class="form-control  @error('foto')is-invalid
                    @enderror" name="foto" id="foto" value="{{old('foto')}}">
                    @error('foto')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
