@extends('layout')
@section('title', 'Transactions')
@section('content')
    <h1><a href="transactions?returned_at=0"style="color:black">Filter unreturned books</a></h1>
    <h1><a href="transactions/create"style="color:black">+ Add a transaction record</a></h1>
    <table class="table table-hover">
        <thead>
            <tr>
                
                <th scope="col">Borrower</th>
                <th scope="col">Book Borrowed</th>
                <th scope="col">Date Borrowed</th>
                <th scope="col">Date Returned</th>
                <th scope="col">Due Date</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($transactions as $transaction)
                <tr>
                    
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->book->title }}</td>
                    <td>{{ $transaction->borrowed_at }}</td>
                    <td>{{ $transaction->returned_at }}</td>
                    <td>{{ $transaction->due_date }}</td>
                    <td> 
                        <button class="btn btn-success"><a class="text-light" href="/transactions/{{ $transaction->id }}">View</a></button>
                        <button class="btn btn-warning"><a class="text-light" href="/transactions/{{ $transaction->id }}/edit">Edit</a></button>
                        <form action="/transactions/{{ $transaction->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $transactions->links() }}
@endsection