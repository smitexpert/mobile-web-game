<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function index(Request $request)
    {

        // return $request->all();
        $challenges = Challenge::query();

        if($request->has('challenge_ids') && count($request->challenge_ids) > 0)
        {
            $challenges->whereNotIn('id', $request->challenge_ids);
        }

        return $challenges->inRandomOrder()->limit(5)->first();


        return response()->json([
            'data' => []
        ]);
    }
}
