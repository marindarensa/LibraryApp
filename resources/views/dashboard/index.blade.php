@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')

    <div class="row">
        <div class="col-lg-3 col-md-6 col-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <span class="fw-semibold d-block mb-3">Total Buku</span>
                    <h3 class="card-title mb-2">{{ $amount_book }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <span class="fw-semibold d-block mb-3">Total Siswa</span>
                    <h3 class="card-title mb-2">{{ $amount_student }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <span class="fw-semibold d-block mb-3">Total Buku Dipinjam</span>
                    <h3 class="card-title mb-2">{{ $book_request }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <span class="fw-semibold d-block mb-3">Total Buku Belum Kembali</span>
                    <h3 class="card-title mb-2">{{ $book_return }}</h3>
                </div>
            </div>
        </div>
    </div>

@endsection
