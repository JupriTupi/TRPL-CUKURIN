@extends('layouts.master')

@section('header', 'Edit Layanan')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('update.DataVoucher', $datavoucher) }}" class="needs-validation" novalidate="">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $datavoucher->id }}">
            <div class="card-body">
                <div class="row">                               
                    <div class="form-group col-md-6 col-12">
                        <label>Jenis Voucher</label>
                        <input type="text" class="form-control" name="jenisvoucher" value="{{ $datavoucher->jenisvoucher }}" required="">
                        <div class="invalid-feedback">
                            Data tidak boleh kosong, harap diisi.
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Jumlah Coin</label>
                        <input type="text" class="form-control" name="jumlahcoin" value="{{ $datavoucher->jumlahcoin }}" required="">
                        <div class="invalid-feedback">
                            Data tidak boleh kosong, harap diisi.
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Jumlah Voucher</label>
                    <input type="text" class="form-control" name="jumlahvoucher" value="{{ $datavoucher->jumlahvoucher }}" required="">
                    <div class="invalid-feedback">
                        Data tidak boleh kosong, harap diisi.
                    </div>
                </div>
                <!-- <div class="form-group col-md-6 col-12">
                    <label>Phone</label>
                    <input type="tel" class="form-control" name="noHp" value="{{ $datavoucher->noHp }}">
                    <div class="invalid-feedback">
                        Data tidak boleh kosong, harap diisi.
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control summernote-simple">{{ $datavoucher->alamat }}</textarea>
                        <div class="invalid-feedback">
                            Data tidak boleh kosong, harap diisi.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Tentang</label>
                        <textarea name="tentang" class="form-control summernote-simple">{{ $datavoucher->tentang }}</textarea>
                        <div class="invalid-feedback">
                            Data tidak boleh kosong, harap diisi.
                        </div>
                    </div>
                </div> -->
                <!-- <div class="row">
                    <label for="role" class="d-block mb-3">Role</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="exampleRadios1" value="$user->role" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Barber
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="exampleRadios2" value="$user->role">
                        <label class="form-check-label" for="exampleRadios2">
                            Customer
                        </label>
                    </div>
                    <div>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> -->
            </div>
            <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
@endsection