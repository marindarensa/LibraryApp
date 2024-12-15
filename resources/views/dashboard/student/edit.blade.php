@extends('layouts.app')
@section('title', $title)
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('dashboard.student.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3 @error('name') has-error @enderror">
                            <label for="name">
                                Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ isset($student) ? $student->name : old('name') }}">
                            @error('name')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3 @error('date_of_birth') has-error @enderror">
                            <label for="date_of_birth">
                                Date of Birth <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                value="{{ isset($student) ? $student->date_of_birth : old('date_of_birth') }}">
                            @error('date_of_birth')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3 @error('grade') has-error @enderror">
                            <label for="grade">
                                Grade <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="grade" name="grade"
                                value="{{ isset($student) ? $student->grade : old('grade') }}">
                            @error('grade')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
