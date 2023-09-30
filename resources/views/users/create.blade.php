@extends('layout')
@section('title', 'Register user')
@section('content')
    {{-- 1. Form
    2. set the action and method
    3. add the token for security --}}

    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif --}}
<div class="card">
                    <div class="card-body">
                        <form action="/users" method="post" class="text-center mt-5 w-50 mx-auto">
        @csrf

        {{-- name --}}
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input class="form-control mb-2 @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- email --}}
        <label for="exampleFormControlInput1" class="form-label">E-Mail</label>
        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        

        <button class="btn btn-success mt-3" type="submit">Add to records</button>
    </form>
                    </div>
</div>
    

    {{-- Scripts for Boostrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@endsection