<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $table = "categories";

    function users()
    {
        return $this->belongsToMany('App\User', "user_category")->withTimestamps();
    }

    /* public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    } */
}
