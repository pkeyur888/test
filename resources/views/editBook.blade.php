@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   

                    <form action="{{route('updateBook',$book->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                       <div><label for="title">Title : </label>
                       <input type="text" name="title" value="{{$book->title}}" id="title"></div>

                       <div> <label for="title">Description : </label>
                       <textarea name="description" id="description" cols="30" rows="3">{{$book->description}}</textarea></div>

                       <div><label for="price">Price : </label>
                       <input type="number" name="price"value="{{$book->price}}" id="price"></div>
                       
                       <div><label for="author">Author : </label>
                       <input type="text" name="author" value="{{$book->author}}" id="author"></div>

                       <div>
                           <img src="{{asset('/storage/image/'.$book->image)}}" style="height: 100px; width:150px;" alt="image">
                       </div>
                       <div><label for="title">Upload Image :  </label>
                       <input type="file" name="image" id="image">
                       <div><input type="submit" value="Submit"></div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
