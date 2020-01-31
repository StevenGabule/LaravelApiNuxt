<?php

namespace App;
use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use Orderable;
    
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
