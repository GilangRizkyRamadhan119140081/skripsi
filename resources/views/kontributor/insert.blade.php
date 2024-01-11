@extends('layout.app')
@section('title', 'tambah kontributor')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Tambah Kontributor</h1>

    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kontributor</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('kontributor.add.insert')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control">
                            @error('nama')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                            @error('email')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control"></textarea>
                            @error('alamat')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>No_Telp</label>
                            <input type="number" name="no_telp" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas da-save">Simpan</i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

@endsection
