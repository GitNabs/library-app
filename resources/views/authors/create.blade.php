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

    <form action="/authors" method="post" class="text-center mt-5 w-50 mx-auto">
        @csrf

        {{-- first name --}}
        <label for="exampleFormControlInput1" class="form-label">First Name</label>
        <input class="form-control mb-2 @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ old('first_name') }}">
        @error('first_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- last name --}}
        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
        <input class="form-control mb-2 @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ old('last_name') }}">
        @error('last_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- birthday --}}
        <label for="exampleFormControlInput1" class="form-label">Date of Birth</label>
        <input class="form-control @error('birthdate') is-invalid @enderror" type="text" name="birthdate" value="{{ old('birthdate') }}">
        @error('birthdate')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- nationality --}}
        <label for="exampleFormControlInput1" class="form-label">Nationality</label>
        <input class="form-control @error('nationality') is-invalid @enderror" type="text" name="nationality" value="{{ old('nationality') }}">
        @error('nationality')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- biography --}}
        <label for="exampleFormControlInput1" class="form-label">Biography</label>
        <input class="form-control @error('biography') is-invalid @enderror" type="text" name="biography" value="{{ old('biography') }}">
        @error('biography')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- Categories
        <label for="exampleFormControlInput1" class="form-label">Tags</label>
        <div class="control">
            <select
                name="tags[]"
                multiple
            >
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            @error('tags')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> --}}

        {{-- Author --}}
        {{-- <label for="exampleFormControlInput1" class="form-label">Author</label>
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
        </div> --}}

        <button class="btn btn-success mt-3" type="submit">Register Author</button>
    </form>

    {{-- Scripts for Boostrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>