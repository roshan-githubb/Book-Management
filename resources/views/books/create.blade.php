@extends('layouts.app')

@section('content')
<h1>Add New Book</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Book Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" class="form-control" required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>


    <div class="form-group">
        <label for="author_name">Author</label>
        <input type="text" name="author_name" id="author_name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="published_date">Published Date</label>
        <input type="date" name="published_date" id="published_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="image">Book Image</label>
        <input type="file" name="image" id="image" class="form-control" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Add Book</button>
</form>
@endsection
