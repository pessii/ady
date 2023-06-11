<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toward extends Model
{
    use HasFactory;
    
    protected $fillable = ['to_whom'];
    
    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
