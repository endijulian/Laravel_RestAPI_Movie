@extends('layouts.app')

@section('content')
    <h1 class="text-center">Edit Kategori</h1>
    <div class="card">
        <div class="card-header">
            Edit Movie
        </div>

        @if (count($errors) > 0)
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item text-danger">
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        @endif


        <div class="card-body">
            <form action="{{route('kategori.update', ['id' => $kategori->id])}}" method="post">
                @csrf
            
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" name="kategori" class="form-control" value="{{$kategori->kategori}}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection