<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];

    // TODO: Add fillable fields

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
