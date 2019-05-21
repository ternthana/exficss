<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Presenters\DatePresenter;


class Comment extends Model
{

  // fields can be filled
  protected $fillable = ['body', 'img_url', 'user_id', 'post_id'];

  public function post()
  {
    return $this->belongsTo('App\Post');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
