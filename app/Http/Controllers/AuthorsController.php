<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\Author\StoreRequest;
use App\Http\Requests\Author\UpdateRequest;

class AuthorsController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $authors = [];

        $search = $req->input('search');;

        if (!empty($search)) {
            $authors = Author::where('first_name', 'LIKE', "%$search%")->get();
        }
        

        else {
            $authors = Author::paginate(5);
        }

        return view('authors.index', [
            'authors' => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //dd($request->validated()+['user_id' => 1]);
        //dd($request->validated());
        $author=Author::create($request->validated());
       
        // $task->user_id=1;
        // $task->save();

        //$book->author()->attach(request('authors'));
        return redirect('/authors');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {

        return view('authors.show', [
            'author' => $author
            //'book' => Book::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //dd($book);
        return view('authors.edit', [
            'author' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Author $author)
    {
        $author->update($request->all());

        return redirect('/authors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect('/authors');
    }
}