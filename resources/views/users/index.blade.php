@extends('layout')
@section('title', 'Users')
@section('content')
    <h1><a href="users/create"style="color:black">+ Add a user</a></h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($users as $user)
                <tr>
                    
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td> 
                        <button class="btn btn-success"><a class="text-light" href="/users/{{ $user->id }}">View</a></button>
                        <button class="btn btn-warning"><a class="text-light" href="/users/{{ $user->id }}/edit">Edit</a></button>
                        <form action="/users/{{ $user->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@endsection
