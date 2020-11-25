@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All User Data') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
<table class="table"> 
    <tr>
        <td>Name</td>
        <td>age</td>
        <td>Gender</td>
        <td>Email</td>
        <td>User Type</td>
        
    </tr>
    @foreach ($users as $user)
    <tr>
        
    <td>{{$user->name}}</td>
        <td>{{$user->age}}</td>
        <td>@if($user->gender==0)
            Male
        @elseif($user->gender==1)
            Female
        @else
            Other
    @endif</td>
        <td>{{$user->email}}</td>
    <td>{{$user->userType}}</td>
    {{-- <td><a href="{{route('editBook',$book->id)}}">Edit</a></td> --}}

    

    </tr>
    @endforeach
</table>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
