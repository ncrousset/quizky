<?php

namespace App\Http\Controllers\Api;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuizzesController extends Controller
{

    public function store(Request $request)
    {
        try {
            $quiz = Quiz::create([
                'user_id' => Auth::id(), // this is user session
                'title' => $request->title,
                'public' => $request->public
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getCode(), 400]);
        }

        return response()->json(['created' => true, 'id' => $quiz->id], 201);
    }

}
