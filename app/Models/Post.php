<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primarykey = "id";
    protected $table = "posts";
    protected $fillable = ["title","description","photo_1","photo_2","photo_3","user_id"];    
}
