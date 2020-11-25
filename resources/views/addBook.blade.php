@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif

                    <form action="{{route('storeBook')}}" method="post" enctype="multipart/form-data">
                    @csrf
                       <div><label for="title">Title : </label>
                       <input type="text" name="title" id="title"></div>

                       <div> <label for="title">Description : </label>
                       <textarea name="description" id="description" cols="30" rows="3"></textarea></div>

                       <div><label for="price">Price : </label>
                       <input type="number" name="price" id="price"></div>
                       
                       <div><label for="author">Author : </label>
                       <input type="text" name="author" id="author"></div>

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
