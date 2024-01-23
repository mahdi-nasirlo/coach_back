<?php

namespace App\Http\Controllers\Meeting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Meeting\RegisterCoachRequest;
use App\Http\Resources\Meeting\CoachPageResource;
use App\Models\Meeting\Coach;
use App\Traits\ApiResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\QueryBuilder\QueryBuilder;

class CoachController extends Controller
{
    use ApiResponseHelper;

    public function index(): AnonymousResourceCollection
    {
        $coach = QueryBuilder::for(Coach::class)
            ->select(['name', 'user_name', 'status', 'hourly_price', 'user_id'])
            ->with(['user:id,name'])
            ->paginate();

        return CoachPageResource::collection($coach);
    }

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
