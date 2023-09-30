@extends('layout')
@section('title', "Update transaction")
@section('content')
    {{-- 1. Form
    2. set the action and method
    3. add the token for security --}}

    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif --}}
<div class="card">
                    <div class="card-body">
                         <form action="/transactions/{{ $transaction->id }}" method="post" class="text-center mt-5 w-50 mx-auto">
        @csrf
        @method('PUT')

        {{-- Title
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input class="form-control mb-2 @error('title') is-invalid @enderror" type="text" name="title" value="{{ $book->title }}">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror --}}

        
        {{-- Borrower --}}
        <label for="exampleFormControlInput1" class="form-label">Borrower</label>
        <div class="control">
            <select
                class="select2-mekus"
                name="user_id"
            >
                @foreach ($users as $user)
                    <option {{ $user->id === $transaction->user_id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Book --}}
        <label for="exampleFormControlInput1" class="form-label">Book</label>
        <div class="control">
            <select
                class="select2-mekus"
                name="book_id"
            >
                @foreach ($books as $book)
                    <option {{ $book->id === $transaction->book_id ? 'selected' : '' }} value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Borrow Date --}}
        <label for="exampleFormControlInput1" class="form-label">Date Borrowed</label>
        <input class="form-control mb-2 @error('borrowed_at') is-invalid @enderror" type="text" name="borrowed_at" value="{{ $transaction->borrowed_at }}">
        @error('borrowed_at')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- Due Date --}}
        <label for="exampleFormControlInput1" class="form-label">Due Date</label>
        <input class="form-control mb-2 @error('due_date') is-invalid @enderror" type="text" name="due_date" value="{{ $transaction->due_date }}">
        @error('due_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- Return Date --}}
        <label for="exampleFormControlInput1" class="form-label">Date Returned</label>
        <input class="form-control mb-2 @error('returned_at') is-invalid @enderror" type="text" name="returned_at" value="{{ $transaction->returned_at }}">
        @error('returned_at')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @if ($errors->any())
             @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif

        <button class="btn btn-success mt-3" type="submit">Save</button>
    </form>
                    </div>
</div>
   
@endsection