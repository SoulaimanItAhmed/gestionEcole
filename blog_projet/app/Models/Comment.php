<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'commentaires';
    // protected $fillable=['id','post_id','nom','email','commentaire'];
    // public function post(){
    //     return $this->oneToone(Post::class,'post_id');
    // }
}
