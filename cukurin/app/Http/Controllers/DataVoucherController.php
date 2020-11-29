<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataVoucher;
use Auth;
use Session;
use Hash;

class DataVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datavoucher = DataVoucher::all();
        return view('admin.dataVoucher');
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
    public function store(Request $request)
    {
        request()->validate(
            [
                'jenisvoucher' => ['required', 'string', 'max:255'],
                'jumlahcoin' => ['required', 'numeric', 'max:100000', 'min:0'],
                'jumlahvoucher' => ['required', 'numeric', 'max:100000', 'min:0'],
            ],
            [
                'jenisvoucher.string' => 'Nama Lengkap Harus berupa huruf',
                'jenisvoucher.required' => 'Data tidak boleh kosong, harap diisi',
                'jumlahcoin.numeric' => 'Harga Harus Berupa Angka',
                'jumlahcoin.required' => 'Data tidak boleh kosong, harap diisi',
                'jumlahvoucher.numeric' => 'Harga Harus Berupa Angka',
                'jumlahvoucher.required' => 'Data tidak boleh kosong, harap diisi',
            ]
        );
        $datavoucher = DataVoucher::create([
            'jenisvoucher' => $request->input('jenisvoucher'),
            'jumlahcoin' => $request->input('jumlahcoin'),
            'jumlahvoucher' => $request->input('jumlahvoucher'),
        ]);
        // return $user;

        return redirect()->route('show.DataVoucher')->with('success', 'Data Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DataVoucher $datavoucher)
    {
        return view('admin.dataVoucher', [
            'voucher' => DataVoucher::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DataVoucher $datavoucher)
    {
        return view('admin.editVoucher', compact('datavoucher'));
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
        $this->_voucherValidation($request);
        DataVoucher::where('id', $id)->update([
            'jenisvoucher' => $request->jenisvoucher,
            'jumlahcoin' => $request->jumlahcoin,
            'jumlahvoucher' => $request->jumlahvoucher,
        ]);

        return redirect()->route('show.DataVoucher')->with('success', 'Data Berhasil Disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataVoucher::destroy($id);
        return redirect()->back();
    }
    private function _voucherValidation(Request $request)
    {
        $validation = $request->validate([
            'jenisvoucher' => ['required', 'string', 'max:255'],
            'jumlahcoin' => ['required', 'numeric', 'max:100000', 'min:0'],
            'jumlahvoucher' => ['required', 'numeric', 'max:100000', 'min:0'],
        ],
        [
            'jenisvoucher.string' => 'Nama Lengkap Harus berupa huruf',
            'jenisvoucher.required' => 'Data tidak boleh kosong, harap diisi',
            'jumlahcoin.numeric' => 'Harga Harus Berupa Angka',
            'jumlahcoin.required' => 'Data tidak boleh kosong, harap diisi',
            'jumlahvoucher.numeric' => 'Harga Harus Berupa Angka',
            'jumlahvoucher.required' => 'Data tidak boleh kosong, harap diisi',
        ]);
    }
}
