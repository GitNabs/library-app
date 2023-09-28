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
            
            <p class="body">Name: {{ $user->name }}</p>
            <p class="body">E-mail: {{ $user->email }}</p>
            {{-- <p class="body">Date Borrowed: {{ $transaction->borrowed_at }}</p> --}}
            {{-- <p class="body">{{ $transaction->returned_at === null ?
                "Date Returned: Not returned yet" : "Date Returned:  $transaction->returned_at" }}
            </p> --}}
            <p class="body">Books Borrowed: </p>
        </h1>
        
    </article>
    <p style="margin-top: 1em">
        @foreach ( $user->transactions as $transaction )
            <h1><a href="/books/{{ $transaction->book_id }}" style="color:black">{{ $transaction->book->title }}</a></h1>
            <p class="body">Date Borrowed: {{ $transaction->borrowed_at }}</p>
            <p class="body">{{ $transaction->returned_at === null ?
                "Date Returned: Not returned yet" : "Date Returned:  $transaction->returned_at" }}
            </p>
        @endforeach
    </p>
    <a href="/users/{{ $user->id }}/edit">Edit</a>
                    <form action="/users/{{ $user->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
    <a href="/users">Back to Users</a>
</body>
</html>