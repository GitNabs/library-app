@extends('layout')
@section('title', 'Transaction')
@section('content')
<div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">Transaction No.</label>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $transaction->id }}"/>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">Borrower</label>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $transaction->user->name }}"/>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">Borrower E-Mail</label>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $transaction->user->email }}"/>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">Book Borrowed</label>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $transaction->book->title }}"/>
                </div>
            </div>
        </div>
         <div class="col-6">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">Date Borrowed</label>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $transaction->borrowed_at }}"/>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">Date Returned</label>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $transaction->returned_at === null ?
                "Not returned yet" : "$transaction->returned_at" }}"/>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">Due Date</label>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $transaction->due_date }}"/>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-warning"><a class="text-light" href="/transactions/{{ $transaction->id }}/edit">Edit</a></button>
                    @role('Administrator')
                     <form action="/transactions/{{ $transaction->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    @endrole
                        <br>
    <a href="/transactions">Back to Transactions</a>
@endsection