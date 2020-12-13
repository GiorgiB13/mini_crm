@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create</div>

                    <div class="card-body">
                        <form action="{{ route("companies.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name"
                                       class="form-control  @error('logo') is-invalid @enderror"
                                       value="{{ old('name', isset($role) ? $role->name : '') }}" required>
                                @error('name')
                                <p class="text-danger">
                                    {{$errors->first('email')}}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="name">Email</label>
                                <input type="email" id="name" name="email"
                                       class="form-control  @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" required>
                                @error('email')
                                <p class="text-danger">
                                    {{$errors->first('email')}}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                                <label for="name">Logo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('logo') is-invalid @enderror"
                                           id="customFileLang" name="logo" value="{{ old('logo') }}">
                                    <label class="custom-file-label" for="customFileLang">Upload Logo</label>
                                </div>
                                @error('logo')
                                <p class="text-danger">
                                    {{$errors->first('logo')}}
                                </p>
                                @enderror
                            </div>
                            <div>
                                <input class="btn btn-primary" type="submit" value="Store">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
