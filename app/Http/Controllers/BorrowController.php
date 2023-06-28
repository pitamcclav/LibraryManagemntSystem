<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function borrow(Request $request, $bookId)
    {
        $user = Auth::user(); // get the authenticated user

        // Find the book by its ID
        $book = Book::findOrFail($bookId);

        // Check if the book is currently available for borrowing
        if ($book->copies <= 0) {
            return back()->with('error', 'This book is not currently available for borrowing.');
        }

        // Reduce the number of available copies for the book
        $book->copies--;
        $book->save();

        // Create a new Borrow record
        $borrow = new Borrow();
        $borrow->book_id = $book->id;
        $borrow->user_id = $user->id;
        $borrow->bok_title = $book->title;
        $borrow->cover_page = $book->image;
        $borrow->book_edition = $book->edition;
        $borrow->authors = $book->authors;
        $borrow->return_date = now()->addWeeks(2); // set the return date to 2 weeks from now

        // Save the new Borrow instance to the database
        $borrow->save();

        return back()->with('success', 'You have successfully borrowed this book.');
    }
}
