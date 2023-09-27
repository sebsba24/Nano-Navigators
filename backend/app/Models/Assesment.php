<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assesment extends Model
{
    use HasFactory;
    protected $table = 'assesments';
    protected $fillable = [
        'name',
        'start_date',
        'description',
        'courses_id'
    ];
}