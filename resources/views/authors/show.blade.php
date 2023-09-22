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
            
            <p class="body">Name: {{ $author->name }}</p>
            <p class="body">Birthday: {{ $author->birthdate }}</p>
            <p class="body">Nationality: {{ $author->nationality }}</p>
            <p class="body">Biography: {{ $author->biography }}</p>
            <p class="body">Books:</p>
        </h1>
        
    </article>
    <p style="margin-top: 1em">
        @foreach ($author->books as $book )
            <h1><a href="/books/{{ $book->id }}" style="color:black">{{ $book->title }}</a></h1>
        @endforeach
    </p>
    <a href="/authors">Back to Authors</a>
</body>
</html>