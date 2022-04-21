<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Tag;
use  App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use HasFactory;
    use SoftDeletes;





    protected $dates = ['deleted_at'];
    protected $table = 'posts';
    protected $fillable = [
        'user_id', 'title', 'content','photo','slug'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id' );
    }

    // public function getFeaturedAttribute($photo)
    // {
    //     return asset($photo);
    // }

    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag' );
    }



}
