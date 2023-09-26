@extends('layout')
@section('title', "Create Transaction")
@section('content')
{{-- 1. Form
    2. set the action and method
    3. add the token for security --}}

    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif --}}

    <form action="/transactions" method="post" class="text-center mt-5 w-50 mx-auto">
        @csrf


        {{-- Borrower --}}
        <label for="exampleFormControlInput1" class="form-label">Borrower</label>
        <div class="control">
            <select
                class="select2-mekus"
                name="user_id"
                
            >
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user')
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
                    
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                    
                @endforeach
            </select>
            @error('book')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Due Date --}}
        <label for="exampleFormControlInput1" class="form-label">Due Date</label>
        <input class="form-control mb-2 @error('due_date') is-invalid @enderror" type="text" name="due_date" value="{{ old('due_date') }}">
        @error('due_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <button class="btn btn-success mt-3" type="submit">Add to Records</button>
    </form>
@endsection
