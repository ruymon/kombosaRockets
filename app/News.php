<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'table_news';

    protected $fillable = ['user_id','title','article'];

    public function author()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
