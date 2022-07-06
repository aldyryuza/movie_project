<?php

namespace App\Http\Controllers;

use App\Models\showMOdel;
use App\Models\studioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class showController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = showMOdel::all();
        // $show = studioModel::all();
        return view('content.show.show', compact('show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $shows = DB::table('show')
            ->join('audi', 'show.id_audi', '=', 'audi.id')
            ->join('movie', 'show.id_movie', '=', 'movie.id')
            ->get();

        return view('content.show.showMovies', [
            'shows'      => $shows
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
        $validate = request()->validate([
            'id_movie' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'id_audi' => 'required',
            'harga' => 'required',
        ]);
        showMOdel::create($validate);
        return redirect('/show')->with(['success' => 'Data Berhasil Ditambahkan']);
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
        $show = showMOdel::select('*')->where('id_show', $id)->get();


        return view('content.show.editShow', [
            'show' => $show
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
        $this->validate(
            $request,
            [
                'id_show' => 'required',
                'id_movie' => 'required',
                'jam_mulai' => 'required',
                'jam_selesai' => 'required',
                'id_audi' => 'required',
                'harga' => 'required',
            ]
        );

        showMOdel::where('id_show', $request->id)->update([
            'id_movie' => $request->id_movie,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'id_audi' => $request->id_audi,
            'harga' => $request->harga
        ]);
        return redirect('/show')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        showMOdel::where('id_show', $id)->delete();
        return redirect('/show')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
