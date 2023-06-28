<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class DataController extends Controller
{
  public function store(Request $request)
  {
    // Validate the form data
    $validatedData = $request->validate([
      'title' => 'required',
      'image' => 'required',
      'author' => 'required',
      'edition' => 'required',
      'copies' => 'required'
    ]);

    // Create a new Book instance and fill it with the validated data
    $book = new Book;
    $book->title = $validatedData['title'];
    $book->authors = $validatedData['author'];
    $book->edition = $validatedData['edition'];
    $book->copies = $validatedData['copies'];

    // Store the image file and set the path on the book instance
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $path = Storage::disk('public')->put('images', $image);
      $book->image = $path;
    }

    // Save the new Book instance to the database
    $book->save();

    // Redirect the user back to the form with a success message
    return redirect('/')->with('success', 'Book added successfully!');
  }

  public function destroy($id)
  {
    $book = Book::findOrFail($id);
    $book->delete();

    return redirect('/')->with('success', 'Book deleted successfully.');
  }
}
