<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\Teacher;
use App\Models\Learn;
use App\Models\Requirement;
use App\Models\Lecture;
use App\Models\Section;
use Illuminate\Support\Facades\Auth; 

class SectionsController extends Controller
{
    public function create()
    {
        return view('sections.create');
    }
    
    public function store(Request $request)
    {
        $loginUserId = Auth::id(); //ログイン中のuserのidを取得
        
        $teacher = Teacher::where('user_id', $loginUserId)->first(); //teachersテーブルのuser_idのみ取得
        $userId = $teacher->id;
        
        $curriculum = Curriculum::where('teacher_id', $userId)->first();
        
        $SectionNames = $request->all()['section_name'];
        foreach($SectionNames as $SectionName){
            foreach($SectionName as $key => $section){
                $curriculum->sections()->create([
                    'section_name' => $section,
                ]);
            }
        }
        
        $file_name = $request->file('post_img')->store('public/post_img');
        
        $section = Section::where('curriculum_id', $curriculum->id)->first();
        $lecture_name = $request->all()['lecture_name'];
        foreach($lecture_name as $LectureName){
            foreach($LectureName as $key => $lecture){
                $section->lectures()->create([
                    'lecture_name' => $lecture,
                    'file_path' => $file_name,
                ]);
            }
        }
        
        return redirect('sections/introduction'); 
    }
    
    public function introduction()
    {
        return view('sections.introduction');
    }
    
    public function referral_save(Request $request)
    {
        $loginUserId = Auth::id(); //ログイン中のuserのidを取得
        
        $teacher = Teacher::where('user_id', $loginUserId)->first(); //teachersテーブルのuser_idのみ取得
        
        $img_name = $request->file('post_img')->store('public/img');
        
        $movie_name = $request->file('post_movie')->store('public/movie');
        // dd($img_name,$movie_name);
        $curriculum_save = $teacher->curriculums()->update([
            'teacher_id' => $teacher->id,
            'title' => $request->title,
            'course_description' => $request->course_description,
            'information_level' => $request->information_level,
            'category' => $request->category,
            'img_path' => $img_name,
            'file_path' => $movie_name,
        ]);
        
        return view('curriculums.detail');
    }
}
