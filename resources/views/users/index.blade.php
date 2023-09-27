<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link rel="stylesheet" href="post.css">
</head>
<body>
    <h1><a href="users/create"style="color:black">+ Add a user</a></h1>
        @foreach ($users as $user)
            <article style="margin-top: 16px;border-top:1px solid black;">
                <h1 class="title">
                    Name: <a href="/users/{{ $user->id }}">{{ $user->name }}</a>
                    <a href="/users/{{ $user->id }}/edit">Edit</a>
                    <form action="/users/{{ $user->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    </p>
                    <p class="body">E-mail: {{ $user->email }}</p>
                </h1>
            </article>
        @endforeach

    @if(request('category'))
        <p><a href="/categories">Go to Categories</a></p>
        <p><a href="/books">Go to Books</a></p>
    @endif
</body>
</html>