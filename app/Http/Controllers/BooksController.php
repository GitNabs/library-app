<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;
use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $books = [];

        $search = $req->input('search');;

        if (!empty($search)) {
            $books = Book::where('title', 'LIKE', "%$search%")->get();
        }
        
        if (request('category')){
            $books = Category::where('name', request('category'))->firstorFail()->books;
        }

        else {
            $books = Book::all();
        }

        return view('books.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        return view('books.create', [
            'authors' => Author::get(['id', 'first_name', 'last_name']),
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //dd($request->validated()+['user_id' => 1]);
        // dd($request->validated());
        $book=Book::create($request->validated());
       
        // $task->user_id=1;
        // $task->save();

        $book->categories()->attach(request('categories'));
        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //dd($book);
        return view('books.edit', [
            'book' => $book,
            'authors' => Author::get(['id', 'first_name', 'last_name']),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Book $book)
    {
        $book->update($request->all());

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->back();
    }

    public function unavailable(Book $book)
    {
        
        $book->update(['available' => false]);
        
        return redirect('/books');
    }

    public function available(Book $book)
    {
    
        $book->update(['available' => true]);
        
        return redirect('/books');
    }
}
