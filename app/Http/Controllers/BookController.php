<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        
        return view('home', [
            'title'=>'Home',
            'active'=>'home',
            'books'=> Book::latest()->filter(request(['search']))->paginate(18)->withQueryString()
        ]); 
    }

    public function show(Book $book){
        return view('book', [
            'title'=>'The Outsider',
            'active'=>'home',
            'book'=>$book
        ]);
    }
}
