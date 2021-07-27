<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'title', 'description','image_url','published','username']; 
    protected $table='posts';
    public $timestamps=true;

    

    public function commentdata()
    {
        return $this->hasMany(Comment::class);
    }


}
