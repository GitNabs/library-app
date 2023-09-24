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

        {{-- Borrower
        <label for="exampleFormControlInput1" class="form-label">Borrower</label>
        <input class="form-control mb-2 @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- Author
        <label for="exampleFormControlInput1" class="form-label">Author</label>
        <input class="form-control @error('body') is-invalid @enderror" type="text" name="author" value="{{ old('author') }}">
        @error('author')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror --}}

        {{-- Publication Year
        <label for="exampleFormControlInput1" class="form-label">Year Published</label>
        <input class="form-control @error('publication_year') is-invalid @enderror" type="text" name="publication_year" value="{{ old('publication_year') }}">
        @error('publication_year')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- ISBN
        <label for="exampleFormControlInput1" class="form-label">ISBN</label>
        <input class="form-control @error('isbn') is-invalid @enderror" type="text" name="isbn" value="{{ old('isbn') }}">
        @error('isbn')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror --}}

        {{-- Categories
        <label for="exampleFormControlInput1" class="form-label">Categories</label>
        <div class="control">
            <select
                name="categories[]"
                multiple
            >
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('tags')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> --}}

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

        <button class="btn btn-success mt-3" type="submit">Add to Records</button>
    </form>
@endsection
