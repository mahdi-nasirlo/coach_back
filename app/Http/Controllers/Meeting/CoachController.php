<?php

namespace App\Http\Controllers\Meeting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Meeting\RegisterCoachRequest;
use App\Models\Meeting\Coach;

class CoachController extends Controller
{
    public function register(RegisterCoachRequest $request)
    {
        $validated = $request->validated();

        $coach = Coach::query()->create($validated);

        return response()->json([
            'status' => true,
            'data' => $coach,
            'message' => 'your registration successfully'
        ]);
    }
}
