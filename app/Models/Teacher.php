<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Laravel\Cashier\Billable;

class Teacher extends Model
{
    use HasFactory, Notifiable, Billable;
    
    protected $fillable = [
        'name'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * このユーザが所有するカリキュラム。（ Curriculumモデルとの関係を定義）
     */
    public function curriculums()
    {
        return $this->hasMany(Curriculum::class);
    }
    
    /**
     * このユーザに関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('curriculums');
    }
}
