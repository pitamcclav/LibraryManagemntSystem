<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Borrow;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("pages.{$page}")) {
          $student= User::all();
          $arr= Book::all();
         return view("pages.{$page}",compact('arr'),compact('student'));
        }

        return abort(404);
    }

    public function vr()
    {
        $comment= Feedback::all();
        $report= Borrow::all();
        return view("pages.virtual-reality",compact('report'),compact('comment'));
    }
    public function borrow()
    {
        $arr= Book::all();
        return view("pages.borrow",compact('arr'));
    }
    public function feedback()
    {
        return view("pages.feedback");
    }
    public function return()
    {
        $ret= Borrow::all();
        return view("pages.return",compact('ret'));
    }
    public function sp()
    {
        return view("pages.student-profile");
    }

    public function rtl()
    {
      $arr= Book::all();
        return view("pages.rtl",compact('arr'));
    }

    public function profile()
    {
        return view("pages.profile-static");
    }

    public function signin()
    {
        return view("pages.sign-in-static");
    }

    public function signup()
    {
        return view("pages.sign-up-static");
    }
}
