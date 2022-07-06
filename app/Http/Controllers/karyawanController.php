<?php

namespace App\Http\Controllers;

use App\Models\karyawanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = karyawanModel::orderBy('id', 'DESC')->get();

        return view('admin.karyawan.karyawan', [
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_karyawan' => 'required',
            'username' => 'required|min:5|max:255|unique:karyawan',
            'password' => 'required|min:5|max:255',


        ]);

        $password = Hash::make($request->password);

        // dd($password);

        karyawanModel::create([
            'nama_karyawan' => $request->nama_karyawan,
            'username' => $request->username,
            'password' => $password,
        ]);

        return redirect('/karyawan')->with(['success' => 'Data Berhasil Ditambahkan']);
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
        $karyawan = karyawanModel::find($id);

        return view('admin.karyawan.editKaryawan', [
            'karyawan' => $karyawan
        ]);
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
        $this->validate($request, [
            'nama_karyawan' => 'required',
            'username' => 'required|min:5|max:255|unique:karyawan',
            'password' => 'required|min:5|max:255',
        ]);

        $password = Hash::make($request->password);

        karyawanModel::where('id', $id)->update([
            'nama_karyawan' => $request->nama_karyawan,
            'username' => $request->username,
            'password' => $password,
        ]);

        return redirect('/karyawan')->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        karyawanModel::destroy($id);

        return redirect('/karyawan')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
