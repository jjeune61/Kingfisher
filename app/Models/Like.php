<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table ='likes';
    protected $fillable = ['article_id','user_id'];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function article(){
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }
}

