@extends('layouts.app')
@section('title', $title)
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('dashboard.book.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3 @error('title') has-error @enderror">
                            <label for="title">
                                Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ isset($data) && $data ? $data['title'] : old('title') }}">
                            @error('title')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3 @error('author') has-error @enderror">
                            <label for="author">
                                Author <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="author" name="author"
                                value="{{ isset($data) && $data ? $data['author'] : old('author') }}">
                            @error('author')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3 @error('cover') has-error @enderror">
                            <label for="cover">
                                Cover (External URL) <span class="text-danger">*</span>
                            </label>
                            <input type="url" class="form-control" id="cover" name="cover"
                                placeholder="https://example.com/cover.jpg"
                                value="{{ isset($data) && $data ? $data['cover'] : old('cover') }}">
                            @error('cover')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3 @error('code') has-error @enderror">
                            <label for="code">
                                Code <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="code" name="code"
                                value="{{ isset($data) && $data ? $data['code'] : old('code') }}">
                            @error('code')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
