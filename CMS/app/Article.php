<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Tag;

class Article extends Model {
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $increments = false;

	protected $fillable = ['name', 'description'];

    public function tags() {
       return $this->belongsToMany('App\Tag');
    }

    public function setTagsString() {
        $tags = $this->belongsToMany('App\Tag');
        $tags_arr = $tags->lists('name');
        $tags_str = '';
        foreach ($tags_arr as $tag) {
            $tags_str .= ', '.$tag;
        } 
        $tags_str = substr_replace($tags_str, '', 0, 2);
        return $tags_str; 
    }

}