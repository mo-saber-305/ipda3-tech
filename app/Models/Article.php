<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $table = 'articles';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'image', 'views', 'slug', 'user_id');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
