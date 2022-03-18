<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('site_icon', 'header_logo', 'footer_logo', 'footer_image', 'slogan_image', 'slogan_content', 'intro_image', 'intro_content', 'facebook', 'whatsapp', 'linkedin', 'twitter', 'instagram', 'address');

}
