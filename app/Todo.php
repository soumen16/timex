<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\step;

class Todo extends Model
{
    protected $fillable = [
        'title', 'completed', 'description', 'date',
    ];
}
