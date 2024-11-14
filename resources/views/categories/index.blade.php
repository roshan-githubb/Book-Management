@extends('layouts.app')

@section('content')
<h1>Categories</h1>
<a href="{{ route('categories.create') }}" class="btn btn-primary">Add New Category</a>


<div class="category-grid">
    @foreach ($categories as $category)
        <div class="category-card">
            
            <h3>{{ $category->name }}</h3>
            <p>Description: {{ $category->description }}</p>
            
            <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    @endforeach
</div>

@endsection
