<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
  public function remove()
  {
      $book= Book::all();
      return view('pages.billing',compact('book'));
  }

}
