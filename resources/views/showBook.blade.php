@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
<table> 
    <tr>
        <td>Title</td>
        <td>Author</td>
        <td>Description</td>
        <td>Price</td>
        <td>image</td>
        <td>Action</td>
    </tr>
    @foreach ($books as $book)
    <tr>
        
    <td>{{$book->title}}</td>
        <td>{{$book->author}}</td>
        <td>{{$book->description}}</td>
        <td>{{$book->price}}</td>
    <td><img src=" {{asset('/storage/image/'.$book->image)}}" style="height: 100px; width:100px" alt="Image"></td>
    <td><a href="{{route('editBook',$book->id)}}">Edit</a></td>
    <td><div onclick="event.preventDefault();
        document.getElementById('delete-book-{{$book->id}}').submit();">Delete</div></td>
     
    <form id='delete-book-{{$book->id}}' action="{{route('deleteBook',$book->id)}}" method="POST" class="d-none">
    @csrf
</form>
    

    </tr>
    @endforeach
</table>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
