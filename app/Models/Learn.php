<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learn extends Model
{
    use HasFactory;
    
    protected $fillable = ['what_learn'];
    
    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
