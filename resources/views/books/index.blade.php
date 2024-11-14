@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Books</h1>

    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">Go to Categories</a>

    
    <form method="GET" action="{{ route('books.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4 mb-2">
                <label for="category">Category</label>
                <select id="category" name="category" class="form-control">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request()->category == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 mb-2">
                <label for="author">Author</label>
                <input type="text" id="author" name="author" class="form-control" value="{{ request()->author }}">
            </div>

            <div class="col-md-4 mb-2">
                <label for="published_date">Published Date</label>
                <input type="date" id="published_date" name="published_date" class="form-control" value="{{ request()->published_date }}">
            </div>

            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

   
    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-4 mb-4">
                <div class="card">
                  
                    <a href="{{ route('books.show', $book->id) }}">
                    <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top" alt="{{ $book->name }}">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            
                            <a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a>
                        </h5>
                        <p class="card-text">Author: {{ $book->author_name }}</p>
                        <p class="card-text">Category: {{ $book->category->name }}</p>
                        <p class="card-text">Published: {{ $book->published_date }}</p>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-secondary">Edit</a>

                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this book?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

   
    {{ $books->links() }}
</div>
@endsection
