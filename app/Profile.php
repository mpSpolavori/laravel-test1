<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];
    
    public function profileImage(Type $var = null)
    {


        $imagePath = ($this->image) ? $this->image : 'profile/ZR1UvJnTL6LgFo7Dc0gS2meBgItgpUKLTCFhWlVy.png';

        return '/storage/' .  $imagePath;
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
