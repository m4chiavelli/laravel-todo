<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $fillable = ['todo', 'completed'];

    // Pastikan kolom completed adalah boolean
    protected $casts = [
        'completed' => 'boolean',
    ];
}
