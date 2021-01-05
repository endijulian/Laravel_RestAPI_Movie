<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Movie;
use File;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $movies = Movie::all(); 
        // return view('admin.movies.index')->with('movies', $movies);

        // return view('admin.movies.index')->with('movies', Movie::all());

        $movies = Movie::with('kategoris')->get(); 
        return view('admin.movies.index')->with('movies', $movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all(); 
        return view('admin.movies.create')->with('kategoris', $kategoris);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'star' => 'required',
            'price' => 'required',
            'imageUrl' => 'required|image'
        ]);

        $imageUrlName = time().$request->imageUrl->getClientOriginalName();
        $request->imageUrl->move('uploads/movieImages', $imageUrlName);

        $movie = Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'star' => $request->star,
            'price' => $request->price,
            'imageUrl' => $imageUrlName,
        ]);
        // dd($request->all());

        $movie->kategoris()->attach($request->kategoris);

        return redirect()->back()->with('message', 'Data Berhasil di Simpan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $kategoris = Kategori::all();
        // return view('admin.movies.edit')->with('movie', $movie)->with('kategoris', $kategoris);
        return view('admin.movies.edit')->with(compact('movie', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'star' => 'required',
            'price' => 'required',
            'kategoris' => 'required'
        ]);

        $movie = Movie::find($id); 

        if($request->hasFile('imageUrl')){

            //delete gambar jika ada sebelum di update
            File::delete($movie->imageUrl); 

            //upload gambar yang baru
            $imageUrlName = time().$request->imageUrl->getClientOriginalName(); 
            $request->imageUrl->move('uploads/movieImages', $imageUrlName);

            $movie->imageUrl = $imageUrlName;
        }

        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->star = $request->star;
        $movie->price = $request->price;
        
        //save data movie di database table movie
        $movie->save();

        //mensinkronkan data pivot table sesui data yang di centang pada kategori
        $movie->kategoris()->sync($request->kategoris);

        return redirect()->route('movie')->with('message', 'Data Berhasil di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        // dd($kategori->image);
        $movie->kategoris()->detach();
        File::delete($movie->imageUrl);
        $movie->delete();

        // return redirect()->route('kategori');
        return redirect()->route('movie')->with('message', 'Data Berhasil di Delete');
    }
}
