@extends('layouts.app')
@section('title', $title)
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('dashboard.student.store') }}" method="POST">
                        @csrf
                    
                        <div class="form-group mb-3 @error('name') has-error @enderror">
                            <label for="name">
                                Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   value="{{ isset($data) && $data ? $data['name'] : old('name') }}">
                            @error('name')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group mb-3 @error('date_of_birth') has-error @enderror">
                            <label for="date_of_birth">
                                Date of Birth <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" 
                                   value="{{ isset($data) && $data ? $data['date_of_birth'] : old('date_of_birth') }}">
                            @error('date_of_birth')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group mb-3 @error('grade') has-error @enderror">
                            <label for="grade">
                                Grade <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="grade" name="grade" 
                                   value="{{ isset($data) && $data ? $data['grade'] : old('grade') }}">
                            @error('grade')
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
