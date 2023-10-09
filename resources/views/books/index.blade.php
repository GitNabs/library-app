@extends('layout')
@section('title', 'Books')
@section('content')
    @if(!request('category'))
        <h1>Filter by availability: <button type="button" class="btn btn-secondary btn-lg"><a href="books?available=1"style="color:black">Available</a></button> <button type="button" class="btn btn-secondary btn-lg"><a href="books?available=0"style="color:black">Unavailable</a></button></h1>
        <h1><button type="button" class="btn btn-info btn-lg"><a href="books/create"style="color:black">+ Add a book</a></button></h1>
    @endif
    @if(request('category'))
        <h1><strong> {{ request('category') }} </strong></h1>
    @endif
     <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Year Published</th>
                <th scope="col">ISBN</th>
                <th scope="col">Availability</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($books as $book)
                <tr>
                    <th scope="row">{{$book->title}}</th>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->publication_year }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>
                        
                        {{ $book->available ? 'This book is available' : 'This book is unavailable' }}
                         @if ($book->available)
                            <form action="/books/{{ $book->id }}/unavailable" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">Mark as unavailable</button>
                            </form>
                         @else
                            <form action="/books/{{ $book->id }}/available" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">Mark as available</button>
                            </form>
                        @endif
                    </td>
                    <td> 
                        <button class="btn btn-success"><a class="text-light" href="/books/{{ $book->id }}">View</a></button>
                        <button class="btn btn-warning"><a class="text-light" href="/books/{{ $book->id }}/edit">Edit</a></button>
                        @role('Administrator')
                        <form action="/books/{{ $book->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        @endrole
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
{{ $books->links() }}
    @if(filled(request('category')))
        <p><a href="/categories">Go to Categories</a></p>
        <p><a href="/books">Go to Books</a></p>
    @endif
    @if(filled(request('available')) && request()->boolean('available') || filled(request('available')) && !request()->boolean('available'))
    <p><a href="/books">Remove filter</a></p>
    @endif
@endsection