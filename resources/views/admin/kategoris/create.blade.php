@extends('layouts.app')

@section('content')
    <h1 class="text-center">Create Kategori</h1>
    <div class="card">
        <div class="card-header">
            Create Movie
        </div>

        @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        
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
            <form action="{{route('kategori.store')}}" method="post" enctype="multipart/form-data">
                @csrf
            
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" name="kategori" class="form-control" placeholder="Masukan kategori">
                </div>

                
                <div class="form-group">
                    <label for="image">Image Kategori</label>
                    <input type="file" id="image" name="image" class="form-control"> </input>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection