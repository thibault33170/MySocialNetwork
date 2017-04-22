<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'content',
        'live',
        'post_on'
    ];

    protected $dates = ['post_on'];

    public function setLiveAttribute($value)
    {
        $this->attributes['live'] = (boolean)($value);
    }

    public function getShortContentAttribute()
    {
    	return substr($this->content, 0, random_int(60, 150));
    }

    public function getOwnerAttribute()
    {
        $user_id = $this->user_id;
        $user = User::find($user_id);

        return $user->name;
    }

    public function getIsOwnedByUserAttribute()
    {
        // We get the list of articles_id owned by connected user
        $user_articles = Article::where('user_id', \Auth::id())->pluck('id')->toArray();

        // check if article witch is trying to be edited is owned by current user
        return in_array($this->id, $user_articles);
    }

    public function getCommentsNumberAttribute()
    {
        $number = Comment::where('article_id', $this->id)->count();
        $word = $number == 0 ? ' Commentaire' : ' Commentaires';
        return $number . $word;
    }
}
