@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">

            <div class="col-sm-9">
                <h1>Kategori</h1>
            </div>

            <div class="col-sm-3">
                <a href="{{route('kategori.create')}}" class="btn btn-primary">Create Kategori</a>
            </div>

        </div>
    </div>

    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">

                <table class="table table-bordered table-hover">
                    <thead>
                        <th>Nama Kategori</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @if ($kategoris->count() > 0)
                            @foreach($kategoris as $kategori)
                                <tr>
                                    <td>{{$kategori->kategori}}</td>
                                    <td><a href="{{route('kategori.edit',['id' => $kategori->id])}}" class="btn btn-xs btn-success">Edit</a></td>
                                    {{--  <td><a href="{{route('kategori.edit',$kategori->id)}}" class="btn btn-xs btn-success">Edit</a></td>  --}}
                                    <td><a href="{{route('kategori.delete',['id' => $kategori->id])}}" class="btn btn-xs btn-danger">Hapus</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th class="text-center">Tidak Ada Data Kategori</th>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection