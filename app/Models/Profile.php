<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile';
    protected $fillable = [
        'image',
        'title_image',
        'title',
        'img_homemenu',
        'cover_img_homemenu',
        'title_homemenu',
        'description_homemenu',
        'img_navbar',
        'title_navbar',
        'title_description',
        'time_open',
        'time_close',
        'no_telp',
        'address',
        'img_big',
        'title_big',
        'description_big',
        'img_left',
        'title_left',
        'description_left',
        'img_center',
        'title_center',
        'description_center',
        'img_right',
        'title_right',
        'description_right',
        'data_id'
    ];
}
