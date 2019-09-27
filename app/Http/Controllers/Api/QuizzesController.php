<?php

namespace App\Http\Controllers\Api;

use App\Models\Quiz;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QuizzesController extends Controller
{

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $quizzes = Quiz::with('questions')->get();

        return response()->json(['data' => $quizzes], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        Validator::make($request->all(), [
            'title' => 'required|unique:quizzes,title',
        ])->validate();

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

    /**
     * @param Quiz $quiz
     * @return JsonResponse
     */
    public function show(Quiz $quiz): JsonResponse
    {
        $quiz = Quiz::with('questions')->find($quiz->id);

        return response()->json($quiz, 200);
    }

    /**
     * @param Quiz $quiz
     * @return JsonResponse
     */
    public function update(Request $request, Quiz $quiz): JsonResponse
    {
        Validator::make($request->all(), [
            'title' => 'required|unique:quizzes,title,'.$quiz->id,
        ])->validate();

        try {
            $quiz->update(['title' => $request->title, 'public' => $request->public]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getCode(), 400]);
        }

        return response()->json($quiz, 200);

    }


}
