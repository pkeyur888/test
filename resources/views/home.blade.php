@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Books') }}</div>

                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif

                    <table class="table"> 
                        <tr>
                            <td>Title</td>
                            <td>Author</td>
                            <td>Description</td>
                            <td>Price</td>
                            <td>image</td>
                            @if( Auth::user()->userType=='user')
                            <td>Action</td>
                            @endif
                        </tr>
                        @foreach ($books as $book)
                        <tr>
                            
                        <td>{{$book->title}}</td>
                            <td>{{$book->author}}</td>
                            <td>{{$book->description}}</td>
                            <td>{{$book->price}}</td>
                        <td><img src=" {{asset('/storage/image/'.$book->image)}}" style="height: 100px; width:100px" alt="Image"></td>
                        @if(Auth::user()->userType=='user')
                        <td><a href="{{route('order',$book->id)}}">Order</a></td>
                        @endif                    
                        </tr>
                        @endforeach
                    </table>



                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
