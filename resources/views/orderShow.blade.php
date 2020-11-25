@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="{{route('home')}}">Back</a>
            <div class="card">
                
                <div class="card-header">{{ __('View All your Order') }}</div>

                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif

                    <table class="table"> 
                        <tr>
                            <td>Book Title</td> 
                            <td>Book Price</td>
                            
                            <td>image</td>
                        </tr>
                        @foreach ($orders as $order)
                        <tr>
                            
                        <td>{{$order->book->title}}</td>
                        <td>{{$order->book->price}}</td>
                            
                        <td><img src=" {{asset('/storage/image/'.$order->book->image)}}" style="height: 100px; width:100px" alt="Image"></td>
                                      
                        </tr>
                        @endforeach
                    </table>



                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
