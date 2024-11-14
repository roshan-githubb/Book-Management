@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>{{ $book->name }}</h1>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $book->name }}</h3>
            <p><strong>Category:</strong> {{ $book->category->name }}</p>
            <p><strong>Author:</strong> {{ $book->author_name }}</p>
            <p><strong>Published Date:</strong> {{ $book->published_date->format('F j, Y') }}</p>

            @if ($book->image)
                <div>
                    <img src="{{ asset('storage/' . $book->image) }}" alt="Book Image" class="img-fluid" style="max-height: 400px;">
                </div>
            @else
                <p>No image available</p>
            @endif
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('books.index') }}" class="btn btn-primary">Back to Book List</a>
    </div>
</div>
@endsection
