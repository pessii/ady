<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    
    protected $fillable = ['section_name'];
    
    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
    
    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('lectures');
    }
}
