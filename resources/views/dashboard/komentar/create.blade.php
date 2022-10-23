@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Entri Data Komentar baru</h1>
</div>
    <div class="row">
        <div class="col-lg-6">
            <form action="{{url('/komentar')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="isi" class="form-label">Deskripsi Komentar</label>
                    <textarea class="form-control @error('isi')is-invalid
                    @enderror" id="isi" rows="3" name="isi">{{old('isi')}}</textarea>
                    @error('isi')
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
