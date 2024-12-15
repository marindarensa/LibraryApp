@extends('layouts.app')
@section('title', $title)
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card" style="min-height:500px;">
                <h5 class="card-header d-flex justify-content-between">
                    <a href="{{ route('dashboard.book.create') }}">
                        <button type="button" class="btn btn-primary ">Tambah Buku</button>
                    </a>
                </h5>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Covers</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col" colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $book->code }}</td>
                                    <td>
                                        <img src="{{ asset($book->cover) }}" alt="" style="height:30px">
                                    </td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td style="display:flex;gap:12px">
                                        <a href="{{ route('dashboard.book.edit', $book->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('dashboard.book.destroy', $book->id) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete-item">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
