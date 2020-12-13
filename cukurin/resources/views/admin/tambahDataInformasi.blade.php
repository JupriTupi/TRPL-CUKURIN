@extends('layouts.master')

@section('title', 'Data Informasi | Cukurin')
@section('header', 'Admin')

@section('css')
<link rel="stylesheet" href="{{ asset('../assets/modules/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('../assets/modules/jquery-selectric/selectric.css') }}">
@endsection
@section('content')
<div class="section-body">
<div class="card-header d-flex justify-content-between align-items-center">
            <h4>Data Information</h4> </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('store.DataInformasi') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Artikel</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control @error('jenisInformasi') is-invalid @enderror" name="jenisInformasi" value="{{ old('jenisInformasi') }}">
                            </div>
                            @error('jenisInformasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}">
                            </div>
                            @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ulasan</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control @error('ulasan') is-invalid @enderror" id="ulasan" rows="50" name="ulasan">{{ old('ulasan') }}</textarea>
                            </div>
                            @error('ulasan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <a href="{{ route('show.DataInformasi') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')
<script src="{{ asset('../assets/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('../assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('../assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
@endpush

@push('page-spesific-scripts')
<script src="{{ asset('../assets/js/page/features-post-create.js') }}"></script>
@endpush