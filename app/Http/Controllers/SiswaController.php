<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Guru;
use Session;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $b = Siswa::with('Guru')->get();
        return view('siswa.index',compact('b'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        return view('siswa.create',compact('guru'));
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
            'nama' => 'required|',
            'nim' => 'required|unique:siswas',
            'guru_id' => 'required'
        ]);
        $b = new Siswa;
        $b->nama = $request->nama;
        $b->nim = $request->nim;
        $b->guru_id = $request->guru_id;
        $b->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$b->nama</b>"
        ]);
        return redirect()->route('siswa.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $b = Siswa::findOrFail($id);
        return view('siswa.show',compact('b'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $b = Siswa::findOrFail($id);
        $guru = Guru::all();
        $selectedGuru = Siswa::findOrFail($id)->guru_id;
        return view('siswa.edit',compact('b','guru','selectedGuru'));
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
            'nama' => 'required|',
            'nim' => 'required|unique:siswas',
            'guru_id' => 'required'
        ]);
        $b = Siswa::findOrFail($id);
        $b->nama = $request->nama;
        $b->nim = $request->nim;
        $b->guru_id = $request->guru_id;
        $b->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$b->nama</b>"
        ]);
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = Siswa::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('siswa.index');
    }
}
