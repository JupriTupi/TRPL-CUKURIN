@extends('layouts.master-user')
@section('header', 'Detail Informasi')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @foreach ($datainformasi as $if)

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <h3>{{ $if->judul }}</h3>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jenisInformasi">Jenis Informasi</label>
                                <p>{{ $if->jenisInformasi }}</p>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tanggal">Diunggah pada</label>
                                <p>{{ date('Y-m-d H:i:s', strtotime($if->created_at))}}</p>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ulasan">Ulasan</label>
                                {!! $if->ulasan !!}
                            </div>
                        </div>

                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection