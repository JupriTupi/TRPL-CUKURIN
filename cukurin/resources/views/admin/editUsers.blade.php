@extends('layouts.master')

@section('header', 'Edit User')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('update.users-management', $user) }}" class="needs-validation" novalidate="">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="card-body">
                <div class="row">                               
                    <div class="form-group col-md-6 col-12">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required="">
                        <div class="invalid-feedback">
                            Data tidak boleh kosong, harap diisi.
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="{{ $user->username }}" required="">
                        <div class="invalid-feedback">
                            Data tidak boleh kosong, harap diisi.
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" required="">
                    <div class="invalid-feedback">
                        Data tidak boleh kosong, harap diisi.
                    </div>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label>Phone</label>
                    <input type="tel" class="form-control" name="noHp" value="{{ $user->noHp }}">
                    <div class="invalid-feedback">
                        Data tidak boleh kosong, harap diisi.
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control summernote-simple">{{ $user->alamat }}</textarea>
                        <div class="invalid-feedback">
                            Data tidak boleh kosong, harap diisi.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Tentang</label>
                        <textarea name="tentang" class="form-control summernote-simple">{{ $user->tentang }}</textarea>
                        <div class="invalid-feedback">
                            Data tidak boleh kosong, harap diisi.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                            <option>Pilih Status</option>
                            <option value="Terverifikasi {{ old('status') == 'Terverifikasi' ? 'selected' : '' }}">Terverifikasi
                            </option>
                            <option value="BelumTerverifikasi {{ old('status') == 'BelumTerverifikasi' ? 'selected' : '' }}">
                                Belum Terverifikasi</option>
                        </select>
                        <div class="invalid-feedback">
                            Data tidak boleh kosong, harap diisi.
                        </div>
                    </div>
                </div>
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
            <a href="{{ route('show.users-management') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
@endsection