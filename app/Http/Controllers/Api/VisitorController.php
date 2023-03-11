<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function store(Request $request)
    {
        try {
            Visitor::create([
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'action'    => $request->action
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }

        return response()->json('Success!', 200);
    }
}
