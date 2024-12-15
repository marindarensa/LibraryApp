@extends('layouts.app')
@section('title', $title)
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('dashboard.transaction.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="student_id">Nama Siswa</label>
                        <select id="student_id" class="form-control select2" name="student_id" required>
                            <option selected disabled value="">Pilih Siswa</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                        @error('student_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="start_date">Tanggal Pinjam</label>
                        <input 
                            type="date" 
                            id="start_date" 
                            name="start_date" 
                            class="form-control @error('start_date') is-invalid @enderror" 
                            required
                        >
                        @error('start_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="end_date">Tanggal Kembali</label>
                        <input 
                            type="date" 
                            id="end_date" 
                            name="end_date" 
                            class="form-control @error('end_date') is-invalid @enderror" 
                            required
                        >
                        @error('end_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="book_id">Buku yang Dipinjam</label>

                        <div id="book-list-container" class="mt-2">
                            <div class="list-request-book row mb-2">
                                <div class="col-11">
                                    <select class="form-control select2" name="book_id[]" required>
                                        <option selected disabled value="">Pilih Buku</option>
                                        @foreach ($books as $book)
                                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-1">
                                    <button type="button" class="remove-book btn btn-danger">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary mt-2 clone-book">
                            <i class="bx bx-plus"></i> Tambah Buku
                        </button>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="list-request-clone row mb-2" style="display: none">
    <div class="col-11">
        <select class="form-control" required>
            <option selected disabled value="">Pilih Buku</option>
            @foreach ($books as $book)
                <option value="{{ $book->id }}">{{ $book->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-1">
        <button type="button" class="remove-book btn btn-danger">
            <i class="bx bx-trash"></i>
        </button>
    </div>
</div>

<script>
    $(document).on('click', '.clone-book', function() {
        let clone = $('.list-request-clone').clone();
        clone.removeClass('list-request-clone');
        clone.addClass('list-request-book');
        clone.removeAttr('style');
        clone.find('select').attr('name', 'book_id[]');
        clone.find('select').select2();
        clone.find('.remove-book').on('click', function() {
            $(this).closest('.list-request-book').remove();
        })
        $('#book-list-container').append(clone);
    });
 </script>
 

@endsection
