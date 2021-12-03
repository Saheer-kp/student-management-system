<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['total_mark'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function getTotalMarkAttribute()
    {
        return $this->maths + $this->science + $this->history;
    }
}
