<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Pengeluaran;
use App\Models\Credit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreditController extends Controller
{
    /**
     * CreditController constructor.
     */
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
       $credits = DB::table('credits')
            ->select('credits.id', 'credits.category_id', 'credits.user_id', 'credits.nominal', 'credits.credit_date', 'credits.description', 'pengeluarans.id as id_category', 'pengeluarans.name')
            ->join('pengeluarans', 'credits.category_id', '=', 'pengeluarans.id', 'LEFT')
            ->where('credits.user_id', Auth::user()->id)
            ->orderBy('credits.created_at', 'DESC')
            ->paginate(10);
        return view('halaman_credit.index', compact('credits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Pengeluaran::where('user_id', Auth::user()->id)
        ->get();
        return view('halaman_credit.create', compact('categories'));
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
        'nominal'       => 'required',
        'credit_date'    => 'required',
        'category_id'   => 'required',
        'description'   => 'required'
    ],
        //set message validation
        [
            'nominal.required' => 'Masukkan Nominal / Uang Keluar!',
            'credit_date.required' => 'Silahkan Pilih Tanggal!',
            'category_id.required' => 'Silahkan Pilih Kategori!',
            'description.required' => 'Masukkan Keterangan!',
        ]
    );

    //Eloquent simpan data
    $save = Credit::create([
        'user_id'       => Auth::user()->id,
        'credit_date'   => $request->input('credit_date'),
        'category_id'   => $request->input('category_id'),
        'nominal'       => str_replace(",", "", $request->input('nominal')),
        'description'   => $request->input('description'),
    ]);
     //cek apakah data berhasil disimpan
     if($save){
        //redirect dengan pesan sukses
        Session::flash('tersimpan', 'Data berhasil ditambahkan');
        return redirect()->route('uang_keluar.index');
    }else{
        //redirect dengan pesan error
        return redirect()->route('uang_keluar.index')->with(['error' => 'Data Gagal Disimpan!']);
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
    public function edit(Request $request, Credit $uang_keluar)
    {
        $categories = Pengeluaran::where('user_id', Auth::user()->id)
        ->get();
        return  view('halaman_credit.edit', compact('uang_keluar', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credit $uang_keluar)
    {
        //set validasi required
        $this->validate($request, [
            'nominal'       => 'required',
            'credit_date'    => 'required',
            'category_id'   => 'required',
            'description'   => 'required'
        ],
            //set message validation
            [
                'nominal.required' => 'Masukkan Nominal Debit / Uang Keluar!',
                'credit_date.required' => 'Silahkan Pilih Tanggal!',
                'category_id.required' => 'Silahkan Pilih Kategori!',
                'description.required' => 'Masukkan Keterangan!',
            ]
        );

        //Eloquent simpan data
        $update = Credit::whereId($uang_keluar->id)->update([
            'user_id'       => Auth::user()->id,
            'category_id'   => $request->input('category_id'),
            'credit_date'    => $request->input('credit_date'),
            'nominal'       => str_replace(",", "", $request->input('nominal')),
            'description'   => $request->input('description'),
        ]);
        //cek apakah data berhasil disimpan
        if($update){
            //redirect dengan pesan sukses
            Session::flash('tersimpan', 'Kategori baru berhasil diupdate');
            return redirect()->route('uang_keluar.index');
            // return redirect()->route('halaman_credit.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('uang_keluar.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        Credit::find($id)->delete();
        return back();
    }
}
