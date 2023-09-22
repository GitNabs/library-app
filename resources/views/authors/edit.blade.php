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

    <form action="/authors/{{ $author->id }}" method="post" class="text-center mt-5 w-50 mx-auto">
        @csrf
        @method('PUT')

        {{-- first name --}}
        <label for="exampleFormControlInput1" class="form-label">First Name</label>
        <input class="form-control mb-2 @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ $author->first_name }}">
        @error('first_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        
        {{-- last name --}}
        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
        <input class="form-control mb-2 @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ $author->last_name }}">
        @error('last_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- birthday --}}
        <label for="exampleFormControlInput1" class="form-label">Date of Birth</label>
        <input class="form-control mb-2 @error('birthdate') is-invalid @enderror" type="text" name="birthdate" value="{{ $author->birthdate }}">
        @error('birthdate')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- nationality --}}
        <label for="exampleFormControlInput1" class="form-label">Nationality</label>
        <input class="form-control mb-2 @error('nationality') is-invalid @enderror" type="text" name="nationality" value="{{ $author->nationality }}">
        @error('nationality')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- biography --}}
        <label for="exampleFormControlInput1" class="form-label">Biography</label>
        <input class="form-control mb-2 @error('biography') is-invalid @enderror" type="text" name="biography" value="{{ $author->biography }}">
        @error('biography')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <button class="btn btn-success mt-3" type="submit">Save</button>
    </form>


    

    {{-- Scripts for Boostrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>