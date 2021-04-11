<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tugas = Tugas::all();
        return view('Guru/tugas', compact('tugas'));
    }
    public function indexs()
    {
        $tugas = Tugas::all();
        return view('Siswa/tugas', compact('tugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Guru/tugas_tambah');
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
            'nama_tugas' => 'required',
            'end_date' => 'required'
        ]);
        tugas::create([
            'nama_tugas' => $request->nama_tugas,
            'end_date' => $request->end_date
        ]);

        return redirect('/Guru/tugas')->with('status', 'Data berhasil diTambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tugas = Tugas::find($id); 
		return view('Siswa.lihat_tugas')-> with(array('tugas'=>$tugas));
        // $tugas = Tugas::where('id', $id)->first();
        // $tugas = Tugas::find($id);
        // return view('Siswa/tugas', compact('tugas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
