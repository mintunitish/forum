<?php

namespace App;

use App\Traits\Favoritable;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];

    protected $with = ['owner', 'favorites'];

    use Favoritable;

    // TODO: Add fillable fields

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
