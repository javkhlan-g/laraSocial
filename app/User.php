<?php

namespace Social;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    //
    use \Illuminate\Auth\Authenticatable;
    public function posts(){
        return $this->hasMany('Social\Post');
    }
}
