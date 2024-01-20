<?php

namespace App\Http\Controllers\Meeting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Meeting\RegisterCoachRequest;
use Illuminate\Http\JsonResponse;

class CoachController extends Controller
{
    public function register(RegisterCoachRequest $request): JsonResponse
    {
        $validated = $request->validated();

        if (is_null(auth()->user()->coach)) {
            $coach = auth()->user()->coach()->create($validated);
            return response()->json([
                'status' => true,
                'data' => $coach,
                'message' => 'your registration successfully'
            ]);
        } else
            return response()->json([
                'status' => false,
                'message' => 'you all ready is registered'
            ]);

    }
}
