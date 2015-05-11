<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Article;

class Tag extends Model {
    use SoftDeletes;

	protected $fillable = ['name'];
    protected $increments = false;

  public function articles() {
    return $this->belongsToMany('App\Article');
  }

}
