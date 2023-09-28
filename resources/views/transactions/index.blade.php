<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transactions</title>
    <link rel="stylesheet" href="post.css">
</head>
<body>
    <h1><a href="transactions?returned_at=0"style="color:black">Filter unreturned books</a></h1>
    <h1><a href="transactions/create"style="color:black">+ Add a transaction record</a></h1>
        @foreach ($transactions as $transaction)
            <article style="margin-top: 16px;border-top:1px solid black;">
                <h1 class="title">
                    <p class="body">Transaction No.:<a href='/transactions/{{ $transaction->id }}'>{{$transaction->id}}</a></p>
                    <p class="body">Borrower: <a href="/users/{{ $transaction->user->id }}" style="color:black">{{ $transaction->user->name }} </a></p>
                    <a href="/transactions/{{ $transaction->id }}/edit">Edit</a>
                    <form action="/transactions/{{ $transaction->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <p class="body">Book Borrowed: <a href="books/{{ $transaction->book_id }}" style="color:black">{{ $transaction->book->title }}</a></p>
                    <p class="body">Date Borrowed: {{ $transaction->borrowed_at }}</p>
                    <p class="body">Due Date: {{ $transaction->due_date }}</p>
                    {{-- @if($transaction->returned_at === null)
                    <p class="body">Date Returned: Not returned yet</p>
                    @else
                    <p class="body">Date Returned: {{ $transaction->returned_at }}</p>
                    @endif --}}
                    <p class="body">{{ $transaction->returned_at === null ?
                     "Date Returned: Not returned yet" : "Date Returned:  $transaction->returned_at" }}
                    </p>
                </h1>
            </article>
        @endforeach

    @if(request('category'))
        <p><a href="/categories">Go to Categories</a></p>
        <p><a href="/books">Go to Books</a></p>
    @endif
</body>
</html>