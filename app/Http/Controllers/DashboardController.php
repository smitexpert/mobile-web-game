<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $challenges = Challenge::paginate(15);
        return view('admin.dashboard', compact('challenges'));
    }

    public function challenge(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);

        if($request->hasFile('file')) {

            Challenge::truncate();

            $file = $request->file('file');
            $name = 'challenges.'.$file->getClientOriginalExtension();

            $file->move(public_path('upload'), $name);

            $file_path = public_path('upload/'.$name);

            $file = fopen($file_path, "r");
            $importData = [];

            $i=0;
            while(($fileData = fgetcsv($file)) !== FALSE) {

                if($i==0){
                    $i++;
                    continue;
                }

                $importData[] = $fileData;
            }

            $makeData = [];

            foreach($importData as $data) {
                $makeData[] = [
                    'title' => $data[0],
                    'challenge' => $data[1],
                    'difficulty' => $data[2]
                ];
            }

            Challenge::insert($makeData);

            return back();
        }
    }
}
