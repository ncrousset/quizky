<?php

namespace App\Http\Controllers\Api;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizzesController extends Controller
{

    public function store(Request $request)
    {
        $quiz = Quiz::create([
            'id_user' => 1, // this is user session
            'title' => $request->title,
            'public' => $request->public
        ]);

        return response()->json($quiz, 201);
    }

}
