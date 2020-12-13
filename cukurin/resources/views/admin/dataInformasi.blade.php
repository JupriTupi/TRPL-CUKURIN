@extends('layouts.master')

@section('title', 'Data Informasi | Cukurin')
@section('header', 'Admin')
@section('content')
<div class="section-body">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Data Information</h4>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Data Information
            </button>
        </div>
        @if (session('success'))
        <div class="card-body">
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ session('success') }}
                </div>
            </div>
        </div>
        @endif
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Jenis Informasi</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Tanggal Publish</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($artikel as $no => $datainformasi)
                    <tr>
                        <th scope="row">{{ $no+1 }}</th>
                        <td>{{ $datainformasi->jenisInformasi }}</td>
                        <td><a href="{{ route('edit.DataInformasi', $datainformasi->id) }}">{{ $datainformasi->judul }}</a></td>
                        <td>{{ date('Y-m-d H:i:s', strtotime($datainformasi->created_at))}}</td>
                        <td class="text-center">
                            <a href="{{ route('edit.DataInformasi', $datainformasi->id) }}" class="badge badge-info btn-edit"><i class="fas fa-edit">Ubah</i></a>
                            <!-- <a href="#" data-id="{{ $datainformasi->id }}" class="badge badge-danger swal-confirm"><i class="fas fa-trash"></i>
                                <form action="{{ route('destroy.DataVoucher', $datainformasi->id) }}" id="delete{{ $datainformasi->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                </form>
                            </a> -->
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
    @section('modal')
        <!-- Modal Tambah Data Voucher-->
        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('show.DataInformasi') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>
                                            Jenis Informasi
                                        </label>
                                        <input type="text" name="jenisInformasi" value="{{ old('jenisInformasi') }}" class="form-control @error('jenisInformasi') is-invalid @enderror" autocomplete="off">
                                        @error('jenisInformasi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" name="judul" value="{{ old('judul') }}" class="form-control @error('judul') is-invalid @enderror" autocomplete="off">
                                        @error('judul')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Ulasan</label>
                                        <!-- <input type="textarea" name="ulasan" value="{{ old('ulasan') }}" class="form-control @error('ulasan') is-invalid @enderror" autocomplete="off"> -->
                                        <textarea class="form-control @error('ulasan') is-invalid @enderror"
                                                id="ulasan" col="40" name="ulasan">{{ old('ulasan') }}</textarea>
                                        @error('ulasan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Konfirmasi Password</label>
                                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Handphone</label>
                                        <input type="text" name="noHp" value="{{ old('noHp') }}" class="form-control @error('noHp') is-invalid @enderror" autocomplete="off">
                                        @error('noHp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea type="text" name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror" autocomplete="off"></textarea>
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="tentang" class="d-block">Tentang</label>
                                        <textarea id="tentang" type="text" class="form-control @error('tentang') is-invalid @enderror" name="tentang">{{ old('tentang') }}</textarea>
                                            @error('tentang')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="role" class="d-block mb-3">Pilih Role</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role" id="exampleRadios1" value="2" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Barber
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role" id="exampleRadios2" value="3">
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
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
@endsection

@push('page-scripts')
<script src="{{ asset('../assets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endpush



@push('after-scripts')
<script>
    $(".swal-confirm").click(function(e) {
        id = e.target.dataset.id;
        swal({
            title: 'Yakin hapus data?',
            text: 'Data yang sudah dihapus tidak bisa dikembalikan!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal('Poof! File anda berhasil dihapus!', {
                icon: 'success',
                });
                $(`#delete${id}`).submit();
            } else {
                // swal('Your imaginary file is safe!');
            }
        });
    });
</script>
@endpush