@extends('layout')
@section('title', 'category')
@section('content')
    <strong> CATEGORIES </strong>
    <div class="row">
        @foreach ($categories as $category)
        {{-- 12 segments --}}
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name}}</h5>
                        {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                        <a href="/books?category={{ $category->name}}" class="btn btn-primary">Go to {{ $category->name }} books</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection