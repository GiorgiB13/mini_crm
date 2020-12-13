@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-body">
                <div class="card-header">Create</div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <th scope="row">{{$company->id}}</th>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td>
                                @if($company->getLogoThumbnail())
                                    <img src="{{ $company->getLogoThumbnail() }}" alt="..." class="rounded-circle"
                                         style="width: 30px; height: 30px">
                                @endif
                            </td>
                            <td>
                                <a type="button" href="{{route('companies.edit', $company->id)}}"
                                   class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <form method="post" action="{{route('companies.destroy', $company->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $companies->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
