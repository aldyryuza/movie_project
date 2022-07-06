<?php

namespace App\Http\Controllers;

use App\Models\movieModel;
use Illuminate\Http\Request;

class movieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = movieModel::orderBy('id', 'DESC')->get();

        return view('content.movie.movie', [
            'movies' => $movies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = movieModel::orderBy('id', 'DESC')->get();

        return view('admin.movie.dataMovie', [
            'movies' => $movies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_film' => 'required',
            'bahasa_film' => 'required',
            'durasi_film' => 'required',
            'tipe_film' => 'required',
            'tanggal_rilis' => 'required',
            'tanggal_tayang' => 'required',
            'tanggal_akhir' => 'required',
            'sinopsis' => 'required',
            'gambar_film' => 'mimes:img,jpg',

        ]);
        $dokumen = $request->file('gambar_film');
        $nama_file = $dokumen->getClientOriginalName();
        $dokumen->move('gambar/', $nama_file);

        // dd($nama_file);

        movieModel::create([
            'nama_film' => $request->nama_film,
            'bahasa_film' => $request->bahasa_film,
            'durasi_film' => $request->durasi_film,
            'tipe_film' => $request->tipe_film,
            'tanggal_rilis' => $request->tanggal_rilis,
            'tanggal_tayang' => $request->tanggal_tayang,
            'tanggal_akhir' => $request->tanggal_akhir,
            'gambar_film' => $nama_file,
            'sinopsis' => $request->sinopsis,
        ]);
        return redirect('/movie/data')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movieId = movieModel::select('*')->where('id', $id)->get();
        return view('content.movie.detail-movie', [
            'movieId' => $movieId
        ]);
    }

    public function beliTiket($id)
    {
        $tiketId = movieModel::select('*')->where('id', $id)->get();
        return view('user.pemesanan.pemesananTiket', [
            'tiketId' => $tiketId
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movieEdit = movieModel::select('*')->where('id', $id)->get();
        return view('admin.movie.editMovie', [
            'movieEdit' => $movieEdit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'nama_film' => 'required',
            'bahasa_film' => 'required',
            'durasi_film' => 'required',
            'tipe_film' => 'required',
            'tanggal_rilis' => 'required',
            'tanggal_tayang' => 'required',
            'tanggal_akhir' => 'required',
            'sinopsis' => 'required',
            // 'gambar_film' => 'mimes:img,jpg',

        ]);
        // $dokumen = $request->file('gambar_film');
        // $nama_file = $dokumen->getClientOriginalName();
        // $dokumen->move('gambar/', $nama_file);


        movieModel::where('id', $request->id)->update([
            'nama_film' => $request->nama_film,
            'bahasa_film' => $request->bahasa_film,
            'durasi_film' => $request->durasi_film,
            'tipe_film' => $request->tipe_film,
            'tanggal_rilis' => $request->tanggal_rilis,
            'tanggal_tayang' => $request->tanggal_tayang,
            'tanggal_akhir' => $request->tanggal_akhir,
            // 'gambar_film' => $nama_file,
            'sinopsis' => $request->sinopsis,
        ]);
        return redirect('/movie/data')->with(['success' => 'Data Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        movieModel::where('id', $id)->delete();
        return redirect('/movie/data')->with(['success' => 'Data Berhasil Di Hapus']);
    }
};
