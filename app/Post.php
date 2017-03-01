<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts'; //테이블 이름
    public $timestamps = false; 
    public $incrementing = false; //ID값 숫자형 X , 자동등가 X
    protected $fillable = ['id', 'title', 'body'];
}
