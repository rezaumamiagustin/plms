<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Tugas;
use App\Models\NilaiTugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //untuk guru
    public function index()
    {
        $tugas = Tugas::all();
        $nilai_tugas= NilaiTugas::all();
        return view('Guru/tugas', compact('tugas','nilai_tugas'));
    }
    //untuk siswa
    public function indexs()
    {
        $tugas = Tugas::all();
        return view('Siswa/tugas', compact('tugas'));
    }
    //untuk deklarsi nilai tugas pada halaman lihat tugas
    public function indexkumpul()
    {       
        // $data = array(            
        //     'id' => "nilai_tugas",            
        //     'file' => Nilai_Tugas::all(),
        //     'url' => Nilai_Tugas::all()        
        //     );        
        // return view('Siswa/lihat_tugas')->with($data);    
        
        $nilai_tugas = Nilai_Tugas::latest()->get;
        return view('Siswa/lihat_tugas', compact('nilai_tugas'));
    }

    // public function cek(Request $request)
    // {
    //     if (NilaiTugas::where('active', 1)->exists()) {
    //         // do something
    //     }
    //     // $hasil = NilaiTugas::where('file', 'LIKE', '%');

    //     // return view('result', compact('hasil'));
    //     // $this->id_nilai_tugas = $file;
    //     // $data = NilaiTugas::where($file)->first();
    //     // $this->file = $data->file;
    //     // $this->pengumpulan = $data->pengumpulan;
    // }

    
    public function create()
    {
        return view('Guru/tugas_tambah');
    }

    //buat tugas untuk guru
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_tugas' => 'required',
            'end_date' => 'required'
        ]);
        Tugas::create([
            'nama_tugas' => $request->nama_tugas,
            'end_date' => $request->end_date
        ]);

        return redirect('/Guru/tugas')->with('status', 'Data berhasil diTambah');
    }

    //siswa mengumpulkan tugas via file dan link
    public function uploadTugas(Request $request)
    {
        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone));
        $pengumpulan = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        if($request->file)
        {
            $ut = $request->file;
            $namafile=$ut->getClientOriginalName();
            $dtUpload = new NilaiTugas;
            $dtUpload->file=$namafile;
            $dtUpload->url=$request->url;
            $dtUpload->nilai=$request->nilai;
            $dtUpload->pengumpulan=$pengumpulan;
            $dtUpload->jamPengumpulan=$localtime;

            $ut->move(public_path().'/temp/tugas', $namafile);
            $dtUpload->save();

            return redirect('/Siswa/tugas')->with('status', 'Tugas sudah terupload');
        }
        else 
        {
            $this->validate($request, [
                'url' => 'required',
                'nilai' => 'required',
                'pengumpulan' => 'required',
                'jamPengumpulan' => 'required'
            ]);
            NilaiTugas::create([
                'url' => $request->url,
                'nilai' => $request->nilai,
                'pengumpulan' => $pengumpulan,
                'jamPengumpulan' => $localtime
            ]);
    
            return redirect('/Siswa/tugas')->with('status', 'Tugas sudah terupload');
        }
    }

    
    //detail untuk guru
    public function detail($id){
        $tugas = Tugas::find($id);
        return view('Guru/tugas_detail', compact('tugas'));
    }

    //lihat tugas untuk siswa
    public function show($id)
    {
        $tugas = Tugas::find($id); 
		return view('Siswa.lihat_tugas')-> with(array('tugas'=>$tugas));
    }

    
    public function edit(Tugas $tugas)
    {
        return view('Guru/tugas_edit', ['tugas' => $tugas]);
    }

    
    public function update(Request $request, Tugas $tugas)
    {
        $this->validate($request, [
            'nama_tugas' => 'required',
            'end_date' => 'required'
        ]);
        Tugas::where('id', $tugas->id)
            ->update([
                'nama_tugas' => $request->nama_tugas,
                'end_date' => $request->end_date
            ]);

        return redirect('/Guru/tugas')->with('status', 'Data berhasil diEdit');
    }

    
    public function destroy($id)
    {
        $data = Tugas::where('id', $id);
        Tugas::where('id', $id)->delete();
        return redirect('/Guru/tugas')->with('status', 'Data berhasil di Hapus !! ');
    }
}
