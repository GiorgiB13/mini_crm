@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card-body">
                <div>
                    <a href="{{route('companies.create')}}" type="button" class="btn btn-primary">Create</a>
                </div>
                <div class="card-header">Companies</div>
                @if(!$companies->isEmpty())
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Employee Count</th>
                        <th scope="col">Logo</th>
                        <th scope="col">View</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $company)
                        <tr data>
                            <th scope="row">{{$company->id}}</th>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td>{{$company->employees->count()}}</td>
                            <td>
                                @if($company->getLogoThumbnail())
                                    <img src="{{ $company->getLogoThumbnail() }}" alt="..." class="rounded-circle"
                                         style="width: 30px; height: 30px">
                                @endif
                            </td>
                            <td>
                                <a type="button" href="{{$company->path()}}"
                                   class="btn btn-info"><i class="fa fa-eye"></i></a>
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
                @else
                    <div class="d-flex justify-content-center">
                        No Records Found!
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
