<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends model {
    use SoftDeletes;

    protected $dates = ['deleted_at'];


	protected $fillable = ['name', 'description'];

    public function Tag() {
       return $this->belongsToMany('Tag');
    }

}