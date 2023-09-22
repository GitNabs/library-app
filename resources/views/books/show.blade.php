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
            <p class="body">Book ID: {{ $book->id }}</p>
            <p class="body">Title: {{ $book->title }}</p>
            <p class="body">Author: {{ $book->author->first_name ." ". $book->author->last_name }}</p>
            <p class="body">Year Published: {{ $book->publication_year }}</p>
            <p class="body">ISBN: {{ $book->isbn }}</p>
        </h1>
        
    </article>
    <p style="margin-top: 1em">
        @foreach ($book->categories as $category)
            <a href="/tasks?tag={{ $category->name }}">{{ $category->name }}</a>
        @endforeach
    </p>
    <a href="/books">Back</a>
</body>
</html>