<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index()
    {
        $visits = Visit::select(['ip', 'type', 'referer'])->get();

        $fromHome = Visit::where('referer', 'LIKE', '%/home')->select(['ip', 'type', 'referer'])->get();
        $fromPopUP = Visit::where('referer', 'LIKE', '%/play')->select(['ip', 'type', 'referer'])->get();

        return view('admin.social', compact('visits', 'fromHome', 'fromPopUP'));
    }

    public function visit($type)
    {
        $ip = request()->ip();
        $user_agent = request()->userAgent();
        $referer = $_SERVER['HTTP_REFERER'] ?? null;

        Visit::create([
            'ip' => $ip,
            'user_agent' => $user_agent,
            'type' => $type,
            'referer' => $referer
        ]);

        if($type == 'insta') {
            return redirect()->to('https://www.instagram.com/cyberz/');
        } else {
            return redirect()->to('https://www.tiktok.com/@cyberzcrew?_t=8ZwufvBftJ8&_r=1');
        }
    }
}
