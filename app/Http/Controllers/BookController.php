<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // Return a book to the bookshelf
public function return($bookId)
{
    // Find the book with the specified ID
    $book = Book::findOrFail($bookId);

    // Check if the book is currently borrowed
    if (!$book->borrowed) {
        // Book is not borrowed, return an error response
        return response()->json(['error' => 'Book is not currently borrowed'], 400);
    }

    // Mark the book as returned
    $book->borrowed = false;
    $book->borrower()->delete(); // Delete the borrower record for this book
    $book->copies += 1; // Increase the number of copies by 1
    $book->save();

    // Return a success response
    return response()->json(['message' => 'Book has been returned successfully'], 200);
}
public function myMethod($bookId)
{
    // Generate a URL for the route using the route helper function
    $url = route('books.return', ['bookId' => $bookId]);

    // Use the URL as needed
    return view('my-view', ['url' => $url]);
}

}
