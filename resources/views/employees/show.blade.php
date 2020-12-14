@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-header">Edit</div>
                <img class="card-img-top" src="{{$employee->getLogo()}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Name: {{$employee->first_name.' '.$employee->last_name}}</h5>
                    <div>
                        <small class="text-muted">Email: {{$employee->email}}</small>
                    </div>
                    <div>
                        <small class="text-muted">Phone: {{$employee->phone}}</small>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-9"><p>Company:</p></div>
                            <div class="col-md-9">
                                <a href="{{$employee->company->path()}}">
                                    {{$employee->company->name}}
                                </a>
                            </div>
                            <div class="col-md-3">
                                <img src="{{ $employee->getCompanyLogoThumbnail() }}" alt="..."
                                     class="rounded-circle"
                                     style="width: 30px; height: 30px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
