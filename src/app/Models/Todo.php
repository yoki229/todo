<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\TodoController;

class Todo extends Model
{
    protected $fillable = ['content'];
        //Controllerで Todo::create($todo);の際 id等を無視してcontentだけを保存

}

