<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/post.css">
</head>
<body>
    <article>
        <h1 class="title">
            
            <p class="body">Borrower: {{ $transaction->user->name }}</p>
            <p class="body">E-mail: {{ $transaction->user->email }}</p>
            <p class="body">Date Borrowed: {{ $transaction->borrowed_at }}</p>
            <p class="body">{{ $transaction->returned_at === null ?
                "Date Returned: Not returned yet" : "Date Returned:  $transaction->returned_at" }}
            </p>
            <p class="body">Book Borrowed: {{ $transaction->book->title }}</p>
        </h1>
        
    </article>
    {{-- <p style="margin-top: 1em">
        @foreach ($transaction->books as $book )
            <h1><a href="/books/{{ $book->id }}" style="color:black">{{ $book->title }}</a></h1>
        @endforeach
    </p> --}}
    <a href="/transactions">Back to Transactions</a>
</body>
</html>