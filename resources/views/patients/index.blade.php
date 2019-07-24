@extends('layouts.app')

@section('content')
<div class="col-12">
    <h1>Patients</h1>
    <form action="{{ url('search')}}" method="POST" role="search">
        @csrf
        <div class="input-group">
            <div class="input-group mb-3">
            <input type="text" class="form-control" name ="search" value="{{ old('search', isset($search) ?  $search : null ) }}"placeholder="Search patient name or division name">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
            </div>
            </div>
        </div>
        @if(isset($search))
        <p> The Search results for your query <b> {{ $search }} </b> are :</p>
        @endif
    </form>
    <table class="table table-striped table-sm">
    <thead>
        <tr>
        <th><a href='{{ Request::fullUrlWithQuery(["sort" => "name"]) }}'>Patient Name</a></th>
        <th><a href='{{ URL::current(["sort" => "name"]) }}'>Patient Name</a></th>
        <th><a href="{{ url('/search?sort=dob')}}">DOB</a></th>
        <th><a href="{{ url('/search?sort=division_name')}}">Patient Name</a></th>
        <th><a href="{{ url('/search?sort=')}}">Last treatment datee</a></th>
        <th><a href="{{ url('/search?sort=first_name')}}">Last treatment name</a></th>
        <!-- <th scope="col">Patient Name</th>
        <th scope="col">DOB</th>
        <th scope="col">Division Name</th>
        <th scope="col">Last treatment date</th>
        <th scope="col">Last treatment name</th> -->
        </tr>
    </thead>
    <tbody>
        @foreach( $patients as $key => $patient)
        <tr>
            <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
            <td>{{ $patient->dob->format('M d, Y') }}</td>
            <td>{{ $patient->division->name }}</td>
            <td>{{ $patient->treatments->last()->created_at->format('M d, Y') }}</td>
            <td>{{ $patient->treatments->last()->name }}</td>
            <td></td>
        @endforeach
        </tr>
    </tbody>
    </table>
    <div class="pagination justify-content-center">
        {{ $patients->appends(['sort'=> 'name'])->links() }}
    </div>
</div>
@endsection