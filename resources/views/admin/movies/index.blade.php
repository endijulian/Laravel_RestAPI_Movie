@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">

            <div class="col-sm-9">
                <h1>Movie</h1>
            </div>

            <div class="col-sm-3">
                <a href="{{route('movie.create')}}" class="btn btn-primary">Create Movie</a>
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
                        <th>Nama Movie</th>
                        <th>Description</th>
                        <th>Rating</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Kategori</th>

                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @if ($movies->count() > 0)
                            @foreach($movies as $movie)
                                <tr>
                                    <td>{{$movie->title}}</td>
                                    <td>{{$movie->description}}</td>
                                    <td>{{$movie->star}}</td>
                                    <td>Rp. {{$movie->price}}</td>
                                    {{-- <td class="text-center"><img src="http://127.0.0.1:8001/{{$movie->imageUrl}}" alt="" width="80px" height="90px"></td> --}}
                                    <td><img src="{{asset($movie->imageUrl)}}" alt="" width="80px" height="90px"></td> 
                                    <td>
                                        @foreach ($movie->kategoris as $kategoris)
                                            {{$kategoris->kategori}},
                                        @endforeach
                                    </td>

                                    <td><a href="{{route('movie.edit', ['id' => $movie->id])}}" class="btn btn-xs btn-success">Edit</a></td>
                                    {{--  <td><a href="{{route('movie.edit',$movie->id)}}" class="btn btn-xs btn-success">Edit</a></td>  --}}
                                    <td><a href="{{route('movie.delete',['id' => $movie->id])}}" class="btn btn-xs btn-danger">Hapus</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th class="text-center">Tidak Ada Data Movie</th>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection