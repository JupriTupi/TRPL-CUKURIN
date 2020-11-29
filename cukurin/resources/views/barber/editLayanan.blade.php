@extends('layouts.master')

@section('header', 'Edit Layanan')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('update.DataLayanan', $datalayanan) }}" class="needs-validation" novalidate="">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $datalayanan->id }}">
            <div class="card-body">
                <div class="row">                               
                    <div class="form-group col-md-6 col-12">
                        <label>Nama Layanan</label>
                        <input type="text" class="form-control" name="namalayanan" value="{{ $datalayanan->namalayanan }}" required="">
                        <div class="invalid-feedback">
                            Data tidak boleh kosong, harap diisi.
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="harga" value="{{ $datalayanan->harga }}" required="">
                        <div class="invalid-feedback">
                            Data tidak boleh kosong, harap diisi.
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" value="{{ $datalayanan->deskripsi }}" required="">
                    <div class="invalid-feedback">
                        Data tidak boleh kosong, harap diisi.
                    </div>
                </div>
                <!-- <div class="form-group col-md-6 col-12">
                    <label>Phone</label>
                    <input type="tel" class="form-control" name="noHp" value="{{ $datalayanan->noHp }}">
                    <div class="invalid-feedback">
                        Data tidak boleh kosong, harap diisi.
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control summernote-simple">{{ $datalayanan->alamat }}</textarea>
                        <div class="invalid-feedback">
                            Data tidak boleh kosong, harap diisi.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Tentang</label>
                        <textarea name="tentang" class="form-control summernote-simple">{{ $datalayanan->tentang }}</textarea>
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