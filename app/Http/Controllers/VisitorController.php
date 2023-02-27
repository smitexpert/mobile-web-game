<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    public function index()
    {
        $total = Visitor::count();
        $today = Visitor::whereBetween('created_at', [now()->subDay()->startOfDay(), now()->endOfDay()])->count();

        $total_unique = DB::table('visitors')->select('ip')->groupBy('ip')->get();
        $today_unique = DB::table('visitors')->whereBetween('created_at', [now()->subDay()->startOfDay(), now()->endOfDay()])->select(['ip'])->groupBy('ip')->get();
        return view('admin.visitor', compact('total', 'total_unique', 'today', 'today_unique'));
    }
}
