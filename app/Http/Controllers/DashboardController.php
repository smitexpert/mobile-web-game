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

    public function edit($id)
    {
        $challenge = Challenge::findOrFail($id);
        return view('admin.edit', compact('challenge'));
    }

    public function update(Request $request, $id)
    {
        $challenge = Challenge::findOrFail($id);
        $challenge->update([
            'title' => $request->title,
            'challenge' => $request->challenge,
            'difficulty' => $request->difficulty
        ]);

        return back();
    }

    public function removeAll(Request $request)
    {
        Challenge::truncate();
        return back();
    }
}
