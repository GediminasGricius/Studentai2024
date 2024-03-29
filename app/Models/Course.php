<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable=['title', 'lecturer_id'];

    public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }
}
