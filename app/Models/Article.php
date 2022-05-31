<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use OwenIt\Auditing\Contracts\Auditable;

class Article extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    public function creator(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
