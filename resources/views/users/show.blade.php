@extends('layout')
@section('title', $user->name)
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">Name</label>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $user->name }}"/>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" id="basic-addon1">Email</label>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ $user->email }}"/>
                </div>
            </div>
        </div>
    </div>
    Books borrowed:
    <div class="card">
        <div class="card-body">
               <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Date Borrowed</th>
                    <th scope="col">Date Returned</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($user->transactions as $transaction)
                    <tr>
                        
                        <td><a href="/books/{{ $transaction->book_id }}" style="color:black">{{ $transaction->book->title }}</a></td>
                        <td>{{ $transaction->borrowed_at }}</td>
                        <td>{{ $transaction->returned_at === null ?
                    "Date Returned: Not returned yet" : "Date Returned:  $transaction->returned_at" }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>         
        </div>
    </div>
    
    
    <button class="btn btn-warning"><a class="text-light" href="/users/{{ $user->id }}/edit">Edit</a></button>
                    @role('Administrator')
                     <form action="/users/{{ $user->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    @endrole
                        <br>
    <a href="/users">Back to Users</a>
@endsection