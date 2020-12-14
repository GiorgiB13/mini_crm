@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-body">
            Company Name: {{$company->name}}
        </div>
        <div class="row justify-content-center">

            <div class="card-body">
                <div class="card-header">Employees</div>
                @if(!$employees->isEmpty())
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Company</th>
                        <th scope="col">Logo</th>
                        <th scope="col">View</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>

                    @foreach($employees as $employee)
                        <tbody>
                        <tr>
                            <th scope="row">{{$employee->id}}</th>
                            <td>{{$employee->first_name}}</td>
                            <td>{{$employee->last_name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->phone}}</td>
                            <td>{{$employee->company->name}}</td>
                            <td>
                                @if($employee->getLogoThumbnail())
                                    <img src="{{ $employee->getLogoThumbnail() }}" alt="..." class="rounded-circle"
                                         style="width: 30px; height: 30px">
                                @endif
                            </td>
                            <td>
                                <a type="button" href="{{$employee->path()}}"
                                   class="btn btn-info"><i class="fa fa-eye"></i></a>
                            </td>
                            <td>
                                <a type="button" href="{{route('companies.edit', $employee->id)}}"
                                   class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <form method="post" action="{{route('companies.destroy', $employee->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        </tbody>

                    @endforeach
                </table>

                <div class="d-flex justify-content-center">
                    {!! $employees->links() !!}
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
