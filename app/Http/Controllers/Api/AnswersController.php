<?php

namespace App\Http\Controllers\Api;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AnswersController extends Controller
{

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $answers = Answer::all();

        return response()->json(['data' => $answers], 200);
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

}
