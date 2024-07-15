<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
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
