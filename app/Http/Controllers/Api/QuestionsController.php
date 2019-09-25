<?php

namespace App\Http\Controllers\Api;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QuestionsController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $questions = Question::with('answers')->get();

        return response()->json(['data' => $questions], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        Validator::make($request->all(), [
            'description' => 'required',
            'quiz_id' => 'required',
        ])->validate();

        try {
            $question = Question::create([
                'quiz_id' => $request->quiz_id, // this is quiz
                'description' => $request->description,
                'type' => $request->type
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getCode(), 400]);
        }

        return response()->json(['created' => true, 'id' => $question->id], 201);
    }

    /**
     * @param Question $question
     * @return JsonResponse
     */
    public function show(Question $question): JsonResponse
    {
        return response()->json($question, 200);
    }

    /**
     * @param Quiz $quiz
     * @return JsonResponse
     */
    public function update(Request $request, Question $question): JsonResponse
    {
        Validator::make($request->all(), [
            'description' => 'required'
        ])->validate();

        try {
            $question->update(['description' => $request->description, 'type' => $request->type]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getCode(), 400]);
        }

        return response()->json($question, 200);

    }


}
