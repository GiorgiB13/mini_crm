@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create</div>

                    <div class="card-body">
                        <form action="{{ route("employees.update", $employee->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                <label for="name">First Name</label>
                                <input type="text" id="name" name="first_name"
                                       class="form-control  @error('first_name') is-invalid @enderror"
                                       value="{{ old('first_name', $employee->first_name) }}" required>
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
                                       value="{{ old('last_name', $employee->last_name) }}" required>
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
                                        @if($employee->company()->exists())
                                            <option value="{{$company->id}}" {{$company->id == $employee->company->id? 'selected':''}}>{{$company->name}}</option>
                                        @else
                                            <option hidden>Choose Company</option>
                                            <option value="{{$company->id}}">{{$company->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email"
                                       class="form-control  @error('email') is-invalid @enderror"
                                       value="{{ old('email', $employee->email) }}" required>
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
                                       value="{{ old('phone', $employee->phone) }}" required>
                                @error('phone')
                                <p class="text-danger">
                                    {{$errors->first('phone')}}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                                <label for="name">Logo</label>
                                <figure>
                                    <img src="{{ $employee->getLogo() }}" alt=""
                                         style="width: 400px; height: 400px">
                                </figure>
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
                                <input class="btn btn-primary" type="submit" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
