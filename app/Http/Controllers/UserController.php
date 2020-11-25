<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('showUser',compact('users'));
    }

    public function placeOrder($id)
    {
        Order::create([
            'user_id'=>auth()->id(),
            'book_id'=>$id,
        ]);   
        
        return redirect(route('home'))->with('msg','Your Order Placed..');
    }
}
