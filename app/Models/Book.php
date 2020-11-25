<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','description','author','price','image'
    ];
    public function orders()
    {   
       return $this->hasMany(Order::class);
    }
}
