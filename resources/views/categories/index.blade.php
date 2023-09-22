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
    <strong> CATEGORIES </strong>
    @foreach ($categories as $category)
        <article>
            <h1 class="title">
                <a href="/books?category={{ $category->name }}">{{ $category->name }}</a>
                
                </form>
            </h1>
        </article>
    @endforeach
</body>
</html>