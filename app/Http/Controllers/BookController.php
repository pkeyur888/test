<?php

namespace App\Http\Controllers;

use App\Http\Requests\bookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::all();
        return view('showBook',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addBook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(bookRequest $request)
    {
        if($request->hasFile('image')){
              
            $filename=$request->image->getClientOriginalName();
            
            $request->image->storeAs('image',$filename,'public');
     
            Book::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'price'=>$request->price,
                'author'=>$request->author,
                'image'=>$filename,
    
            ]);
        }
        
        return redirect(route('addBook'))->with('msg',"Book Successfully Added");
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('editBook',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->title=$request->title;
        $book->description=$request->description;
        $book->price=$request->price;
        $book->author=$request->author;
        if($request->hasFile('image')){ 
            $filename=$request->image->getClientOriginalName();
            Storage::delete('/public/image/'.$book->image);
            $request->image->storeAs('image',$filename,'public');
            $book->image=$filename;  
            } 
         
            $book->save();
            return redirect(route('book'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Book::where('id',$book->id)->delete();
        return redirect(route('book'));
    }
}
