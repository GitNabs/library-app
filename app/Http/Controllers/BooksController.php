<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;
use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use Illuminate\Database\Eloquent\Builder;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $req)
    // {
    //     $books = [];
    //     $search = $req->input('search');

    //     if (!empty($search)) {
    //         // select * from `authors` where `authors`.`id` in (1, 3, 4, 5, 6, 7, 8, 9, 10)
    //         $books = Book::with('author')->where('title', 'LIKE', "%$search%")->get();
    //     }

    //     if (request('category')){
    //         // select * from `books` where `books`.`id` in (1, 3, 4, 5, 6, 7, 8, 9, 10)
    //         $books = Category::with('books')->where('name', request('category'))->firstorFail()->books;
    //     } else {
    //         // select * from `authors` where `authors`.`id` in (1, 3, 4, 5, 6, 7, 8, 9, 10)
    //         $books = Book::with('author')->get();
    //     }

    //     return view('books.index', [
    //         'books' => $books,
    //     ]);
    // }

    // Notification     -> mail or sms
    // Queues or Jobs   -> run the process in the background in queue
    // Scheduler        -> every day at 12:00 p.m delete all products inactive

    public function index(Request $req)
    {
        // availability
        // nationality

        // 
        $books = Book::query()
            ->with(['categories', 'author']) // (['categories'])
            // gets only the books with categories relation who's not empty
            ->when($req->filled('category'), function (Builder $q) use ($req) {
                return $q->whereHas('categories', function (Builder $q) use ($req) {
                    $q->where('name', 'LIKE', "%{$req->input('category')}%");
                });
            })

            ->when($req->filled('nationality'), function (Builder $q) use ($req) {
                return $q->whereHas('author', function (Builder $q) use ($req) {
                    $q->where('nationality', 'LIKE', "%{$req->input('nationality')}%");
                });
            })
            // if true, implement the filter in the query
            // if false, ignore the filter
            ->when(
                $req->filled('search'), // true or false
                fn (Builder $q) => $q->where('title', 'LIKE', "%{$req->input('search')}%") // filter
                // function ($q) { return $q->where('title', 'LIKE', "%$search%"); }
            )

            ->when(
                $req->filled('available'), // true or false
                fn (Builder $q) => $q->where('available', '=', $req->input('available')) // filter
                // function ($q) { return $q->where('title', 'LIKE', "%$search%"); }
            )
            ->get();

        return view('books.index', [
            'books' => $books,
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
        $book->update($request->except('category_ids'));

        // attach()
        // detach([1, 2]) - remvoe category with ids of 1, 2
        // detach() - remove all associated categories
        // sync

        // sync - remove all existing category ids then attach all selected category ids
        $book->categories()->sync($request->category_ids);

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/books');
    }

    public function unavailable(Book $book)
    {
        
        $book->update(['available' => false]);
        
        return redirect()->back();
    }

    public function available(Book $book)
    {
    
        $book->update(['available' => true]);
        
        return redirect()->back();
    }
}
