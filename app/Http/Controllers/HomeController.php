<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
      $arr= Book::all();
       $student = User::all();
       return view('pages.dashboard',compact('arr'),compact('student'));
    }
}
