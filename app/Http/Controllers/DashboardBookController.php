<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Exports\BooksExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->user()->is_admin == 1) {
            $books = Book::all();
        } else {
            $books = Book::where('user_id', auth()->user()->id)->get();
        }
        
        return view('dashboard.books.index', [
            'books' => $books,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.books.create', [
            'categories'=>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cover'=>'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'title'=>'required|min:3|max:255|regex:/^[a-zA-Z\s]+$/',
            'slug'=>'required|unique:books',
            'quantity'=> 'required|min:1|numeric',
            'category_id'=>'required',
            'description'=>'required',
            'file'=>'required|mimes:pdf',
        ]);

        if($request->file('cover')){
            $validatedData['cover']=$request->file('cover')->store('book-covers');
        }
        if($request->file('file')){
            $validatedData['file']=$request->file('file')->store('pdf-files');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Book::create($validatedData);

        return redirect('/dashboard/books')->with('success', 'Book has been added!');
    }

    /**
     * Display the specified resource.
     *
    //  * @param  \App\Models\Book  $book
    //  * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('dashboard.books.show', [
            'book'=>$book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
    //  * @param  \App\Models\Book  $book
    //  * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('dashboard.books.edit', [
            'book'=>$book,
            'categories'=>Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Book  $book
    //  * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'cover'=>'image|mimes:jpeg,png,jpg,webp|max:2048',
            'title'=>'required|min:3|max:255|regex:/^[a-zA-Z\s]+$/',
            'quantity'=> 'required|min:1|numeric',
            'category_id'=>'required',
            'description'=>'required',
            'file'=>'mimes:pdf',
        ];

        if($request->slug != $book->slug){
            $rules['slug']='required|unique:books';
        }   

        $validatedData = $request->validate($rules);

        if($request->file('cover')){
            if($request->oldCover) {
                Storage::delete($request->oldCover);
            }
            
            $validatedData['cover']=$request->file('cover')->store('book-covers');
        }

        if($request->file('file')){
            if($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            
            $validatedData['file']=$request->file('file')->store('pdf-files');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Book::where('id', $book->id)->update($validatedData);

        return redirect('/dashboard/books')->with('success', 'Book has been updated!');
    }

    /**
     * Remove the specified resource from storage.
    //  *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if($book->cover) {
            Storage::delete($book->cover);
        }

        if($book->file) {
            Storage::delete($book->file);
        }

        Book::destroy($book->id);
        return redirect('/dashboard/books')->with('success', 'Book has been deleted!');
    }

    // public function checkSlug(Request $request){
    //     $slug = SlugService::createSlug(Book::class, 'slug', $request->title);
    //     return response()->json(['slug'=>$slug]);
    // }

    public function export() 
    {
        return Excel::download(new BooksExport, 'books.xlsx');
    }
}
