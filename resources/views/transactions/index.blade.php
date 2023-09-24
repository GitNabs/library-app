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
    @if(request('category'))
        <h1><strong> {{ request('category') }} </strong></h1>
    @endif
        @foreach ($transactions as $transaction)
            <article style="margin-top: 16px;border-top:1px solid black;">
                <h1 class="title">
                    Borrower: {{ $transaction->user->name }}
                    <a href="/transactions/{{ $transaction->id }}/edit">Edit</a>
                    <form action="/transactions/{{ $transaction->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <p class="body">Book Borrowed: <a href="books/{{ $transaction->book_id }}" style="color:black">{{ $transaction->book->title }}</a></p>
                    <p class="body">Date Borrowed: {{ $transaction->borrowed_at }}</p>
                    {{-- {{ $book->available ? 'This book is available' : 'This book is unavailable' }}
                    @if ($book->available)
                        <form action="/books/{{ $book->id }}/unavailable" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit">Mark as unavailable</button>
                        </form>
                    @else
                    <form action="/books/{{ $book->id }}/available" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit">Mark as available</button>
                    </form>
                    @endif --}}
                </h1>
            </article>
        @endforeach

    @if(request('category'))
        <p><a href="/categories">Go to Categories</a></p>
        <p><a href="/books">Go to Books</a></p>
    @endif
</body>
</html>