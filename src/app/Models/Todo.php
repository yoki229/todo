<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Todo extends Model
{
    protected $fillable = [
        'content',
        'category_id'
    ];
    //Controllerで Todo::create($todo);の際 id等を無視してcontent、category_idを保存可能

    public function category(){
    return $this->belongsTo(Category::class);
    }

    public function scopeCategorySearch($query, $category_id){
        if (!empty($category_id)){
            $query->where('category_id', $category_id);
        }
    }

    public function scopeKeywordSearch($query, $keyword){
        if(!empty($keyword)){
            $query->where('content','like','%'.$keyword.'%');
        }
    }
}

