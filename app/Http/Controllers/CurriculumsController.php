<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\Teacher;
use App\Models\Learn;
use Illuminate\Support\Facades\Auth; 


class CurriculumsController extends Controller
{
    public function create()
    {
        $curriculum = new Curriculum;
        
        return view('curriculums.create', [
            'curriculums' => $curriculum,
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
        ]);
        
        $loginUserId = Auth::id(); //ログイン中のuserのidを取得
        
        $teacher = Teacher::where('user_id', $loginUserId)->first(); //teachersテーブルのuser_idのみ取得
        
        $request = $teacher->curriculums()->create([
            'title' => $request->title,
            'category' => $request->category,
        ]);
        return redirect('curriculums/assumption'); 
    }
    
    public function AssumedLearner()
    {
        return view('curriculums.learn');
    }
    
    public function detail()
    {
        return redirect('curriculums/detail'); 
    }
}
