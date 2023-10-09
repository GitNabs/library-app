@extends('layout')
@section('title', 'Authors')
@section('content')
    <h1><button type="button" class="btn btn-info btn-lg"><a href="authors/create"style="color:black">+ Add an author</a></button></h1>
    <table class="table table-hover">
        <thead>
            <tr>
                
                <th scope="col">Name</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Nationality</th>
                <th scope="col">Biography</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($authors as $author)
                <tr>
                    
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->birthdate }}</td>
                    <td>{{ $author->nationality }}</td>
                    <td>{{ $author->biography }}</td>
                    <td> 
                        <button class="btn btn-success"><a class="text-light" href="/authors/{{ $author->id }}">View</a></button>
                        <button class="btn btn-warning"><a class="text-light" href="/authors/{{ $author->id }}/edit">Edit</a></button>
                        @role('Administrator')
                        <form action="/authors/{{ $author->id }}" method="post">
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
    {{ $authors->links() }}
@endsection