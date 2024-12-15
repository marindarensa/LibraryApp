@extends('layouts.app')
@section('title', $title)
@section('content')

    <div class="row">
        <div class="row">
            <div class="col-12">
                <div class="card" style="min-height:500px;">
                    <h5 class="card-header d-flex justify-content-between">
                        <a href="{{ route('dashboard.student.create') }}">
                            <button type="button" class="btn btn-primary ">Tambah Siswa</button>
                        </a>
                    </h5>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col" colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->date_of_birth }}</td>
                                        <td>{{ $student->grade }}</td>
                                        <td style="display:flex;gap:12px">
                                            <a href="{{ route('dashboard.student.edit', $student->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('dashboard.student.destroy', $student->id) }}" method="POST"
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
    </div>

@endsection
