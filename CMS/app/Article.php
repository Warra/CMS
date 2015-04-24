<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends model {

	protected $fillable = ['name', 'description'];

  public function Tag() {
    return $this->belongsToMany('Tag');
  }

}