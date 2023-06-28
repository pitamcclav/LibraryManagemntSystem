<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;

class FeedbackController extends Controller
{
    public function showForm()
    {
        return view('pages.feedback');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);
    
        $user_id = $request->user()->id;
        $message = $request->input('message');
        Feedback::create([
            'user_id' => $user_id,
            'message' => $message,
        ]);
        
        return redirect('/feedback')->with('success', 'Thanks for your feedback!');
    }
    
}

