<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- Links for Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    {{-- 1. Form
    2. set the action and method
    3. add the token for security --}}

    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif --}}

    <form action="/books" method="post" class="text-center mt-5 w-50 mx-auto">
        @csrf

        {{-- Title --}}
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input class="form-control mb-2 @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- Author
        <label for="exampleFormControlInput1" class="form-label">Author</label>
        <input class="form-control @error('body') is-invalid @enderror" type="text" name="author" value="{{ old('author') }}">
        @error('author')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror --}}

        {{-- Publication Year --}}
        <label for="exampleFormControlInput1" class="form-label">Year Published</label>
        <input class="form-control @error('publication_year') is-invalid @enderror" type="text" name="publication_year" value="{{ old('publication_year') }}">
        @error('publication_year')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- ISBN --}}
        <label for="exampleFormControlInput1" class="form-label">ISBN</label>
        <input class="form-control @error('isbn') is-invalid @enderror" type="text" name="isbn" value="{{ old('isbn') }}">
        @error('isbn')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- Categories --}}
        <label for="exampleFormControlInput1" class="form-label">Categories</label>
        <div class="control">
            <select
                name="categories[]"
                multiple
            >
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('tags')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Author --}}
        <label for="exampleFormControlInput1" class="form-label">Author</label>
        <div class="control">
            <select
                name="author_id"
                
            >
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success mt-3" type="submit">Add to Library</button>
    </form>

    {{-- Scripts for Boostrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>