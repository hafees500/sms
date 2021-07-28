<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    use HasFactory;
    protected $fillable = [
        'term', 'student','maths','science','history'
    ];
    public function students()
    {
        return $this->belongsTo(Students::class,'student');
    }

    public function terms()
    {
        return $this->belongsTo(Terms::class,'term');
    }
}
