<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function show($id)
    {
        
        $book = Book::find($id);
    
       
        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Book not found');
        }
    
      
        return view('books.show', compact('book'));
    }
    


    public function index(Request $request)
    {
       
        $categories = Category::all();

        
        $query = Book::with('category');

      
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        if ($request->has('author') && $request->author != '') {
            $query->where('author_name', 'LIKE', '%' . $request->author . '%');
        }

        if ($request->has('published_date') && $request->published_date != '') {
            $query->whereDate('published_date', $request->published_date);
        }

        
        $books = $query->paginate(10);

  
        return view('books.index', compact('books', 'categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }


    public function store(StoreBookRequest $request)
{
    
    $validated = $request->validated();

    
    if ($request->hasFile('image')) {
        $image = $request->file('image');

        
        $imageName = time() . '_' . $image->getClientOriginalName();

        $destinationPath = public_path('storage/images');

        $image->move($destinationPath, $imageName);

        $validated['image'] = 'images/' . $imageName;
    }

    Book::create($validated);

    return redirect()->route('books.index')->with('success', 'Book added successfully.');
}

public function edit($id)
{
   
    $book = Book::findOrFail($id);

    
    $categories = Category::all();

    
    return view('books.edit', compact('book', 'categories'));
}




    public function update(StoreBookRequest $request, Book $book)
    {
        $validated = $request->validated();

      
        if ($request->hasFile('image')) {
         
            Storage::delete('public/' . $book->image);
            
          
            $path = $request->file('image')->store('public/images');
            $validated['image'] = str_replace('public/', '', $path);
        }

    
        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

 
    public function destroy(Book $book)
    {
        
        if ($book->image) {
            Storage::delete('public/' . $book->image);
        }

       
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    
}
