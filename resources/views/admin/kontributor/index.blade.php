@extends('layout.app')
@section('title', 'kontributor')
@section('content')

    <h1 class="h3 mb-2 text-gray-800">Kontributor</h1>
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('kontributor.insert')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>No_Telp</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no =1; ?>
                        @foreach ($kontributor as $row)
                            
                            <tr class="text-center">
                                <td>{{$no++}}</td>
                                <td>{{$row->nama}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->alamat}}</td>
                                <td>{{$row->no_telp}}</td>
                                <td>
                                    <a href="{{ route('kontributor.edit', ['id' => $row->id]) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('kontributor.delete', ['id' => $row->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
