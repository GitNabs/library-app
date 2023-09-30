@extends('layout')
@section('title', $book->title)
@section('content')
<div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">Title</label>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $book->title }}"/>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">Author</label>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $book->author->name }}"/>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">Year Published</label>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $book->publication_year }}"/>
                </div>
            </div>
        </div>
         <div class="col-6">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">ISBN</label>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $book->isbn }}"/>
                </div>
            </div>
        </div>
    </div>
     <p style="margin-top: 1em">
        @foreach ($book->categories as $category)
            <button type="button" class="btn btn-primary">
                <a class="text-light" href="/books?category={{ $category->name }}">
                    {{ $category->name }}
                </a>
            </button>
        @endforeach
    </p>

    <button class="btn btn-warning"><a class="text-light" href="/books/{{ $book->id }}/edit">Edit</a></button>
                     <form action="/books/{{ $book->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        <br>
    <a href="/books">Back to Books</a>
@endsection