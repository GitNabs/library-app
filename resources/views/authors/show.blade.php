@extends('layout')
@section('title', $author->name)
@section('content')
<div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">Name</label>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $author->name }}"/>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">Birthday</label>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $author->birthdate }}"/>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">Nationality</label>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $author->nationality }}"/>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">Biography</label>
                <div class="form-outline mb-4">
                    <textarea class="form-control" id="form6Example7" rows="4" disabled>{{$author->biography}}</textarea>
                </div>
            </div>
        </div>
    </div>
        
    <label class="form-label" id="basic-addon1">Books written:</label>
    <div class="card">
        <div class="card-body">
               <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Year Published</th>
                    <th scope="col">ISBN</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($author->books as $book)
                    <tr>
                        <td><a href="/books/{{ $book->id }}" style="color:black">{{ $book->title }}</a></td>
                        <td>{{ $book->publication_year }}</td>
                        <td>{{ $book->isbn }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>         
        </div>
    </div>
    
    
    <button class="btn btn-warning"><a class="text-light" href="/authors/{{ $author->id }}/edit">Edit</a></button>
                     <form action="/authors/{{ $author->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        <br>
    <a href="/authors">Back to Authors</a>
@endsection