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
        </h1>
        
    </article>
    {{-- <p style="margin-top: 1em">
        @foreach ($task->tags as $tag)
            <a href="/tasks?tag={{ $tag->name }}">{{ $tag->name }}</a>
        @endforeach
    </p> --}}
    <a href="/authors">Back</a>
</body>
</html>