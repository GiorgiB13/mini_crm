@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create</div>

                    <div class="card-body">
                        <form action="{{ route("employees.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                <label for="name">First Name</label>
                                <input type="text" id="name" name="first_name"
                                       class="form-control  @error('first_name') is-invalid @enderror"
                                       value="{{ old('first_name') }}" required>
                                @error('first_name')
                                <p class="text-danger">
                                    {{$errors->first('first_name')}}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name"
                                       class="form-control  @error('last_name') is-invalid @enderror"
                                       value="{{ old('last_name') }}" required>
                                @error('last_name')
                                <p class="text-danger">
                                    {{$errors->first('email')}}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                <label for="name">Company</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="company_id">
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email"
                                       class="form-control  @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" required>
                                @error('email')
                                <p class="text-danger">
                                    {{$errors->first('email')}}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                <label for="phone">Phone</label>
                                <input type="phone" id="phone" name="phone"
                                       class="form-control  @error('phone') is-invalid @enderror"
                                       value="{{ old('phone') }}" required>
                                @error('phone')
                                <p class="text-danger">
                                    {{$errors->first('phone')}}
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
