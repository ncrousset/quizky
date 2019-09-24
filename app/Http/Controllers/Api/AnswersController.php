<?php

namespace App\Http\Controllers\Api;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AnswersController extends Controller
{

    /**
     * @return JsonResponse
     */
    public function index(Question $question): JsonResponse
    {
        return response()->json(['data' => $question->answers], 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        Validator::make($request->all(), [
            'question_id' => 'required|exists:questions,id',
            'description' => 'required',
        ])->validate();

        try {
            $answer = Answer::create([
                'question_id' => $request->question_id, // this is quiz
                'description' => $request->description,
                'is_valid' => $request->is_valid
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getCode(), 400]);
        }

        return response()->json(['created' => true, 'id' => $answer->id], 201);
    }

    /**
     * @param Question $question
     * @return JsonResponse
     */
    public function show(Answer $answer): JsonResponse
    {
        return response()->json($answer, 200);
    }

    /**
     * @param Answer $answer
     * @return JsonResponse
     */
    public function update(Request $request, Answer $answer): JsonResponse
    {
        Validator::make($request->all(), [
            'description' => 'required'
        ])->validate();

        try {
            $answer->update([
                'description' => $request->description,
                'is_valid' => $request->is_valid]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getCode(), 400]);
        }

        return response()->json($answer, 200);

    }

}
