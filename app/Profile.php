<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];
    
    public function profileImage(Type $var = null)
    {

        $image = ($this->image64) ? "data:image/png;base64," . $this->image64 : '/png/noimage.png';

        return $image;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
