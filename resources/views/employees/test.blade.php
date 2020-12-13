@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Applicants') }}</div>
                    <div class="card-body">
                        @if(!$employees->isEmpty())
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Surname</th>
{{--                                    <th scope="col">Number</th>--}}
{{--                                    <th scope="col">Is Employed</th>--}}
{{--                                    <th scope="col">Created At</th>--}}
{{--                                    <th scope="col">Action</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                {{--                            @php /** @var Role $role */use App\Models\Role; @endphp--}}
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->last_name }}</td>
{{--                                        <td>{{ $employee->number }}</td>--}}
{{--                                        <td>{{ $employee->is_employed }}</td>--}}
{{--                                        <td>{{ $employee->created_at }}</td>--}}
{{--                                        <td>--}}
{{--                                            @if($employee->is_employed == false)--}}
{{--                                                <a href="{{ route('applicants.hire', $employee->id) }}" class="btn btn-sm btn-warning">Hire</a>--}}
{{--                                            @else--}}
{{--                                                <a href="#" class="btn btn-sm btn-success">Hired</a>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                                @else
                                    <p>No Records Found!</p>
                                @endif
                            </table>
                            <div class="d-flex justify-content-center">
                                {!! $employees->links() !!}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
