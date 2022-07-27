<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Credit;

class LaporanCreditController extends Controller
{
    /**
     * LaporanCreditController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('laporan_credit.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function check(Request $request)
    {
        //set validasi required
        $this->validate($request, [
            'tanggal_awal'     => 'required',
            'tanggal_akhir'    => 'required',
        ],
            //set message validation
            [
                'tanggal_awal.required'  => 'Silahkan Pilih Tanggal Awal!',
                'tanggal_akhir.required' => 'Silahkan Pilih Tanggal Akhir!',
            ]
        );

        $tanggal_awal  = $request->input('tanggal_awal');
        $tanggal_akhir = $request->input('tanggal_akhir');

        $credits = Credit::select('credits.id', 'credits.category_id', 'credits.user_id', 'credits.nominal', 'credits.credit_date', 'credits.description', 'pengeluarans.id as id_category', 'pengeluarans.name')
            ->join('pengeluarans', 'credits.category_id', '=', 'pengeluarans.id', 'LEFT')
            ->whereDate('credits.credit_date', '>=', $tanggal_awal)
            ->whereDate('credits.credit_date', '<=', $tanggal_akhir)
            ->paginate(10)
            ->appends(request()->except('page'));

        return view('laporan_credit.index', compact('credits', 'tanggal_awal', 'tanggal_akhir'));
    }
}
