<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;
    
    protected $table = 'curriculums';
    
    protected $fillable = [
        'teacher_id',
        'title',
        'category',
        'course_description',
        'information_level',
        'img_path',
        'file_path',
    ];

    /**
     * この投稿を所有するユーザ。（ Teacherモデルとの関係を定義）
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    
    public function learns()
    {
        return $this->hasMany(Learn::class);
    }
    
    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }
    
    public function towards()
    {
        return $this->hasMany(Toward::class);
    }
    
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
