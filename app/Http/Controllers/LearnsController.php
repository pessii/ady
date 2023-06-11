<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\Teacher;
use App\Models\Learn;
use App\Models\Requirement;
use Illuminate\Support\Facades\Auth; 

class LearnsController extends Controller
{
    public function store(Request $request)
    {
        $loginUserId = Auth::id(); //ログイン中のuserのidを取得
        
        $teacher = Teacher::where('user_id', $loginUserId)->first(); //teachersテーブルのuser_idのみ取得
        $userId = $teacher->id;
        
        $curriculum = Curriculum::where('teacher_id', $userId)->first();
        
        $WhatLearns = $request->all()['what_learn'];
        foreach($WhatLearns as $WhatLearn){
            foreach($WhatLearn as $learn => $learns){
                $curriculum->learns()->create([
                    'what_learn' => $learns,
                ]);
            }
        }
        
        $rquirements = $request->all()['requirement'];
        foreach($rquirements as $requirement){
            foreach($requirement as $key => $requir){
                $curriculum->requirements()->create([
                    'requirement' => $requir,
                ]);
            }
        }
        
        $towards = $request->all()['to_whom'];
        foreach($towards as $toward){
            foreach($toward as $key => $ToWhom){
                $curriculum->towards()->create([
                    'to_whom' => $ToWhom,
                ]);
            }
        }
        
        return redirect('sections/create'); 
    }
}
