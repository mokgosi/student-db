<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'area', 'province_id'];

    protected $appends = ['students_count'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function getStudentsCountAttribute()
    {
        return $this->students()->count();
    }
}
