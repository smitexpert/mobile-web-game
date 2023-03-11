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
        $total_play = Visitor::where('action', 'PLAY')->count();
        $today = Visitor::whereBetween('created_at', [now()->subDay()->startOfDay(), now()->endOfDay()])->count();
        $today_play = Visitor::where('action', 'PLAY')->whereBetween('created_at', [now()->subDay()->startOfDay(), now()->endOfDay()])->count();
        $week = Visitor::whereBetween('created_at', [now()->subDays(7)->startOfDay(), now()->endOfDay()])->count();
        $week_play = Visitor::where('action', 'PLAY')->whereBetween('created_at', [now()->subDays(7)->startOfDay(), now()->endOfDay()])->count();
        $month = Visitor::whereBetween('created_at', [now()->subMonth()->startOfDay(), now()->endOfDay()])->count();
        $month_play = Visitor::where('action', 'PLAY')->whereBetween('created_at', [now()->subMonth()->startOfDay(), now()->endOfDay()])->count();

        $total_unique = DB::table('visitors')->select('ip')->groupBy('ip')->get();
        $today_unique = DB::table('visitors')->whereBetween('created_at', [now()->subDay()->startOfDay(), now()->endOfDay()])->select(['ip'])->groupBy('ip')->get();
        $week_unique = DB::table('visitors')->whereBetween('created_at', [now()->subDays(7)->startOfDay(), now()->endOfDay()])->select(['ip'])->groupBy('ip')->get();
        $month_unique = DB::table('visitors')->whereBetween('created_at', [now()->subMonth()->startOfDay(), now()->endOfDay()])->select(['ip'])->groupBy('ip')->get();
        return view('admin.visitor', compact('total', 'total_unique', 'today', 'today_unique', 'week', 'week_unique', 'month', 'month_unique', 'total_play', 'today_play', 'week_play', 'month_play'));
    }

    public function download()
    {
        $fileName = 'visitors.csv';
        $visitors = Visitor::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('IP', 'User Agent', 'Action', 'Date');

        $callback = function() use($visitors, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($visitors as $visitor) {
                $row['IP']  = $visitor->ip;
                $row['User Agent'] = $visitor->user_agent;
                $row['Action']  = $visitor->action ?? 'OPEN';
                $row['Date']    = $visitor->created_at;

                fputcsv($file, array($row['IP'], $row['User Agent'], $row['Action'], $row['Date']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
