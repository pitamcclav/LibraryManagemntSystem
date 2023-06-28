<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

class MyController extends Controller
{
    public function myMethod($bookId)
    {
        // Generate a URL for the route using the route helper function
        $url = route('books.return', ['bookId' => $bookId]);

        // Use the URL as needed
        return view('my-view', ['url' => $url]);
    }
}

