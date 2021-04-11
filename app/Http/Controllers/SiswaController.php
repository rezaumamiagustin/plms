<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('Admin/a_siswa', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/siswa_tambah');
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
            'nama_siswa' => 'required',
            'kelas' => 'required'
        ]);
        siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas
        ]);

        return redirect('/Admin/a_siswa')->with('status', 'Data berhasil diTambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return view('Admin/detail_siswa', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('Admin/edit_siswa', ['siswa' => $siswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $this->validate($request, [
            'nama_siswa' => 'required',
            'kelas' => 'required'
        ]);
        Siswa::where('id', $siswa->id)
            ->update([
                'nama_siswa' => $request->nama_siswa,
                'kelas' => $request->kelas
            ]);

        return redirect('/Admin/a_siswa')->with('status', 'Data berhasil diEdit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Siswa::where('id', $id);
        Siswa::where('id', $id)->delete();
        return redirect('/Admin/a_siswa')->with('status', 'Data berhasil di Hapus !! ');
    }
}
