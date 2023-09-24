<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\Transaction\StoreRequest;
use App\Http\Requests\Transaction\UpdateRequest;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $transactions = [];
        // $search = $req->input('search');

        // if (!empty($search)) {
        //     // select * from `authors` where `authors`.`id` in (1, 3, 4, 5, 6, 7, 8, 9, 10)
        //     $books = Book::with('author')->where('title', 'LIKE', "%$search%")->get();
        // }

        // if (request('category')){
        //     // select * from `books` where `books`.`id` in (1, 3, 4, 5, 6, 7, 8, 9, 10)
        //     $books = Category::with('books')->where('name', request('category'))->firstorFail()->books;
        // } else {
        //     // select * from `authors` where `authors`.`id` in (1, 3, 4, 5, 6, 7, 8, 9, 10)
        //     $transactions=Transaction::all();
        //     // $transactions = Book::with('author')->get();
        // }
        $transactions = Transaction::with(['book', 'user'])->get();
        return view('transactions.index', [
            'transactions' => $transactions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        return view('transactions.create', [
            'users' => User::all(),
            'books' => Book::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //dd($request->validated()+['user_id' => 1]);
        // dd($request->validated());
        $transaction = Transaction::create($request->validated());

        // $task->user_id=1;
        // $task->save();

        //$book->categories()->attach(request('categories'));
        return redirect('/transactions');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show', [
            'transaction' => $transaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //dd($book);
        return view('transactions.edit', [
            'transaction' => $transaction,
            'users' => User::all(),
            'books' => Book::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Transaction $transaction)
    {
        $transaction->update($request->except('category_ids'));

        // attach()
        // detach([1, 2]) - remvoe category with ids of 1, 2
        // detach() - remove all associated categories
        // sync

        // sync - remove all existing category ids then attach all selected category ids
        // $book->categories()->sync($request->category_ids);

        return redirect('/transactions');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->back();
    }
}
