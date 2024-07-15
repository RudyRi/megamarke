<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'position',
        'birth_date',
        'hired_on',
    ];
    protected $casts = [
        'birth_date' => 'date',
        'hired_on' => 'date',
    ];	
}
