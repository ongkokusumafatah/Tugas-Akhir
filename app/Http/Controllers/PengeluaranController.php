<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Pengeluaran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('halaman_kategori.index');
        $categories = Pengeluaran::where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'DESC')
        ->paginate(10);
        return view('halaman_kategori.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman_kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //set validasi required
         $this->validate($request, [
            'name'  => 'required'
        ],
            //set message validation
            [
                'name.required' => 'Masukkan Nama Kategori !',
            ]
        );

        //Eloquent simpan data
        $save = Pengeluaran::create([
            'user_id'       => Auth::user()->id,
            'name'          => $request->input('name')
        ]);
        //cek apakah data berhasil disimpan
        if($save){
            //redirect dengan pesan sukses
            Session::flash('tersimpan', 'Kategori baru berhasil ditambahkan');
            return redirect()->route('kategori.index');
        }else{
            //redirect dengan pesan error
            return redirect()->route('kategori.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
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
    public function edit(Request $request, Pengeluaran $kategori)
    {
        return view('halaman_kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengeluaran $kategori)
    {
        //set validasi required
        $this->validate($request, [
            'name'  => 'required'
        ],
            //set message validation
            [
                'name.required' => 'Masukkan Nama Kategori !',
            ]
        );

        //Eloquent simpan data
        $update = Pengeluaran::whereId($kategori->id)->update([
            'user_id'       => Auth::user()->id,
            'name'          => $request->input('name')
        ]);
        //cek apakah data berhasil disimpan
        if($update){
            //redirect dengan pesan sukses
            Session::flash('tersimpan', 'Kategori baru berhasil diupdate');
            return redirect()->route('kategori.index');
        }else{
            //redirect dengan pesan error
            return redirect()->route('kategori.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengeluaran::find($id)->delete();
        return back();
    }
}
