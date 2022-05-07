<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'id_number', 
        'date_of_birth',
        'home_address',
        'email',
        'phone',
        'school_id'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
