<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use App\Tag;

class ArticleTag extends Model
{
    use SoftDeletes;

    protected $table = 'article_tag';
    protected $increments = false;

    protected $fillable = ['article_id', 'tag_id'];

    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
}
