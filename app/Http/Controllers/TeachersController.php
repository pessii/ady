<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Curriculum;
use Illuminate\Support\Facades\Auth; 

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loginUserId = Auth::id(); //ログイン中のuserのidを取得
        
        $teacher = Teacher::where('user_id', $loginUserId)->first(); //teachersテーブルのuser_idのみ取得
        if($teacher ==! null){
            $userId = $teacher->id;
        }else{
            $userId = 0;
        }
        
        $curriculums = Curriculum::where('teacher_id', $userId)->get();
        
        $data = [
            'curriculums' => $curriculums,
        ];
        
        return view('teachers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function InstructorPage()
    {
        $loginUserId = Auth::id(); //ログイン中のuserのidを取得
        
        $teacher = Teacher::where('user_id', $loginUserId)->first(); //teachersテーブルのuser_idのみ取得
        if($teacher ==! null){
            $userId = $teacher->user_id;
        }else{
            $userId = 0;
        }
        
        if($loginUserId === $userId){
            return redirect('teachers/top'); 
        } else {
            return view('teachers.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $request->user()->teacher()->create([
            'name' => $request->name,
            ]);
        
        return redirect('teachers/top');
    }
}
