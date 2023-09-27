<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
    <link rel="stylesheet" href="post.css">
</head>
<body>
    <h1><a href="authors/create"style="color:black">+ Add an author</a></h1>
    @foreach ($authors as $author)
        <article>
            <h1 class="title">
                 Name: <a href="/authors/{{ $author->id }}">{{ $author->name }}</a>
                <a href="/authors/{{ $author->id }}/edit">Edit</a>
                <form action="/authors/{{ $author->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                <p class="body">Birthday: {{ $author->birthdate}}</p>
                <p class="body">Nationality: {{ $author->nationality }}</p>
                <p class="body">Biography: {{ $author->biography }}</p>
            </h1>
        </article>
    @endforeach
</body>
</html>