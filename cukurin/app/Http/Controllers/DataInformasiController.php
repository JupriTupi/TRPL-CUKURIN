<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataInformasi;
use Auth;
use Session;
use Hash;

class DataInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datainformasi = DataInformasi::all();
        return view('admin.dataInformasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambahDataInformasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(
            [
                'jenisInformasi' => ['required'],
                'judul' => ['required'],
                'ulasan' => ['required'],
            ],
            [
                'jenisInformasi.required' => 'Data tidak boleh kosong, harap diisi',
                'judul.required' => 'Data tidak boleh kosong, harap diisi',
                'ulasan.required' => 'Data tidak boleh kosong, harap diisi'
            ]
        );
        $datainformasi = DataInformasi::create([
            'jenisInformasi'=>$request->input('jenisInformasi'),
            'judul' => $request->input('judul'),
            'ulasan' => $request->input('ulasan'),
        ]);
        // return $user;

        return redirect()->route('show.DataInformasi')->with('success', 'Data Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DataInformasi $datainformasi)
    {
        return view('admin.dataInformasi', [
            'artikel' => DataInformasi::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DataInformasi $datainformasi)
    {
        return view('admin.editInformasi', compact('datainformasi'));
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
        $this->_informasiValidation($request);
        DataInformasi::where('id', $id)->update([
            'jenisInformasi'=> $request->jenisInformasi,
            'judul' => $request->judul,
            'ulasan' => $request->ulasan,
        ]);

        return redirect()->route('show.DataInformasi')->with('success', 'Data Berhasil Disimpan.');
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
    private function _informasiValidation(Request $request)
    {
        $validation = $request->validate([
            'jenisInformasi' => ['required'],
            'judul' => ['required'],
            'ulasan' => ['required'],
        ],
        [
            'jenisInformasi.required' => 'Data tidak boleh kosong, harap diisi',
            'judul.required' => 'Data tidak boleh kosong, harap diisi',
            'ulasan.required' => 'Data tidak boleh kosong, harap diisi'
        ]);
    }
    public function datainformasi_customer (){
        $datainformasi = \App\DataInformasi::all();
        // $user = \App\User::where('id_role','=',2)->first();
        // $datalayanan= DB::table('layanan as ly')
        // ->join('users as us', 'us.id', '=', 'ly.pembuat')
        // ->select(DB::raw('ly.id as id,ly.namalayanan as namalayanan,ly.fotolayanan as fotolayanan,ly.harga as harga,ly.deskripsi as deskripsi,us.name as pembuat'))->get();
        // return $datalayanan;
        return view('customer.dataInformasi', compact('datainformasi'));
      }
    public function detaildatainformasi_customer (){
        $datainformasi = \App\DataInformasi::all();
        // $user = \App\User::where('id_role','=',2)->first();
        // $datalayanan= DB::table('layanan as ly')
        // ->join('users as us', 'us.id', '=', 'ly.pembuat')
        // ->select(DB::raw('ly.id as id,ly.namalayanan as namalayanan,ly.fotolayanan as fotolayanan,ly.harga as harga,ly.deskripsi as deskripsi,us.name as pembuat'))->get();
        // return $datalayanan;
        return view('customer.detailDataInformasi', compact('datainformasi'));
      }
}
