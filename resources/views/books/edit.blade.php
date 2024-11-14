@extends('layouts.app')

@section('content')
<h1>Edit Book - {{ $book->name }}</h1>

<form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Book Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $book->name }}" required>
    </div>

    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="author_name">Author</label>
        <input type="text" name="author_name" id="author_name" class="form-control" value="{{ $book->author_name }}" required>
    </div>

    <div class="form-group">
        <label for="published_date">Published Date</label>
        <input type="date" name="published_date" id="published_date" class="form-control" value="{{ $book->published_date }}" required>
    </div>

    <div class="form-group">
        <label for="image">Book Image</label>
        <input type="file" name="image" id="image" class="form-control" accept="image/*">
        @if($book->image)
            <img src="{{ Storage::url($book->image) }}" alt="Book Image" style="width:100px;height:100px;">
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Update Book</button>
</form>
@endsection
