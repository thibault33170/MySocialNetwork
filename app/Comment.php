<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'article_id', 'content'];

    public function getuserAvatarAttribute()
    {
        $user = User::find($this->user_id);

        return $user->avatar;
    }

    public function getOwnerNameAttribute()
    {
        $user = User::find($this->user_id);

        return $user->name;
    }

    public function getOwnerUsernameAttribute()
    {
        $user = User::find($this->user_id);

        return $user->username;
    }
}
