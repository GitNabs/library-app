@extends('layout')
@section('title', 'Update book info')
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
                        <form action="/books/{{ $book->id }}" method="post" class="text-center mt-5 w-50 mx-auto">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input class="form-control mb-2 @error('title') is-invalid @enderror" type="text" name="title" value="{{ $book->title }}">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        
        {{-- Author --}}
        <label for="exampleFormControlInput1" class="form-label">Author</label>
        <div class="control">
            <select
                name="author_id"
            >
                @foreach ($authors as $author)
                    <option {{ $author->id === $book->author_id ? 'selected' : '' }} value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Categories --}}
        <label for="exampleFormControlInput1" class="form-label">Category</label>
        <div class="control">
            <select
                class="@if($errors->has('category_ids.0')) is-invalid @endif"
                name="category_ids[]"
                multiple
            >
                @foreach ($categories as $category)
                    <option
                        {{ $book->categories->where('id', '=', $category->id)->first() ? 'selected' : '' }}
                        value="{{ $category->id }}"
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('category_ids.0'))
                <div class="invalid-feedback">
                    {{ $errors->first('category_ids.0') }}
                </div>
            @endif
        </div>

        {{-- Publication --}}
        <label for="exampleFormControlInput1" class="form-label">Year Published</label>
        <input class="form-control mb-2 @error('publication_year') is-invalid @enderror" type="text" name="publication_year" value="{{ $book->publication_year }}">
        @error('publication_year')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- ISBN --}}
        <label for="exampleFormControlInput1" class="form-label">ISBN</label>
        <input class="form-control mb-2 @error('isbn') is-invalid @enderror" type="text" name="isbn" value="{{ str($book->isbn)->limit(10) }}">
        @error('isbn')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <button class="btn btn-success mt-3" type="submit">Save</button>
    </form>
                    </div>
                </div>
    


    

    {{-- Scripts for Boostrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@endsection