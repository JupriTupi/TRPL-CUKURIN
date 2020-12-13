<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataLayanan;
use App\User;
use Auth;
use Session;
use Hash;
use DB;


class DataLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalayanan = DataLayanan::all();
        return view('barber.dataLayanan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDataLayanan(Request $request)
    {   $user = \Auth::user()->id;
        request()->validate(
            [
                'namalayanan' => ['required', 'string', 'max:30'],
                'harga' => ['required', 'numeric', 'max:9999999999', 'min:20000'],
                'deskripsi' => ['required','string'],
            ],
            [
                'namalayanan.string' => 'Nama Layanan Harus berupa huruf',
                'namalayanan.required' => 'Data tidak boleh kosong, harap diisi',
                'namalayanan.max' => 'Nama Layanan Maksimal 30 karakter',
                'harga.numeric' => 'Harga Harus Berupa Angka',
                'harga.required' => 'Data tidak boleh kosong, harap diisi',
                'harga.max' => 'Harga Maksimal 10 digit',
                'deskripsi.required' => 'Data tidak boleh kosong, harap diisi',
                'deskripsi.string' => 'Deskripsi Harus Berupa Huruf'
            ]
        );
        $datalayanan = DataLayanan::create([
            'fotolayanan'=>$request->input('fotolayanan'),
            'namalayanan' => $request->input('namalayanan'),
            'harga' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi'),
            'pembuat' => $user,
        ]);
        // return $user;

        return redirect()->route('show.DataLayanan')->with('success', 'Data Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDataLayanan(DataLayanan $datalayanan)
    {
        $datalayanan = DataLayanan::where('pembuat', Auth::user()->id)->get();
        return view('barber.dataLayanan', compact('datalayanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editDataLayanan(DataLayanan $datalayanan)
    {
        return view('barber.editLayanan', compact('datalayanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDataLayanan(Request $request, $id)
    {
        $this->_layananValidation($request);
        DataLayanan::where('id', $id)->update([
            'fotolayanan'=> $request->fotolayanan,
            'namalayanan' => $request->namalayanan,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('show.DataLayanan')->with('success', 'Data Berhasil Disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyDataLayanan($id)
    {
        DataLayanan::destroy($id);
        return redirect()->back();
    }
    private function _layananValidation(Request $request)
    {
        $validation = $request->validate([
            'namalayanan' => ['required', 'string', 'max:30'],
            'harga' => ['required', 'numeric', 'max:9999999999', 'min:20000'],
            'deskripsi' => ['required','string'],
        ],
        [
            'namalayanan.string' => 'Nama Lengkap Harus berupa huruf',
            'namalayanan.required' => 'Data tidak boleh kosong, harap diisi',
            'namalayanan.max' => 'Nama Layanan Maksimal 30 karakter',
            'harga.numeric' => 'Harga Harus Berupa Angka',
            'harga.required' => 'Data tidak boleh kosong, harap diisi',
            'harga.max' => 'Harga Maksimal 10 digit',
            'deskripsi.required' => 'Data tidak boleh kosong, harap diisi',
            'deskripsi.string' => 'Deskripsi Harus Berupa Huruf'
        ]);
    }
    public function datalayanan_customer (){
        $datalayanan = \App\DataLayanan::all();
        $user = \App\User::where('id_role','=',2)->first();
        // $datalayanan= DB::table('layanan as ly')
        // ->join('users as us', 'us.id', '=', 'ly.pembuat')
        // ->select(DB::raw('ly.id as id,ly.namalayanan as namalayanan,ly.fotolayanan as fotolayanan,ly.harga as harga,ly.deskripsi as deskripsi,us.name as pembuat'))->get();
        // return $datalayanan;
        return view('customer.dataLayanan', compact('datalayanan','user'));
      }
}
