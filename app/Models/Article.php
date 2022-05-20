<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
    use HasFactory;
    public function creator(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
