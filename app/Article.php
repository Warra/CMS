<?php 
/**
 * Article Class
 *
 * PHP version 5
 *
 * @category Class
 * @package  Article
 * @author   Warren Manley <warrenmanley@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/Warra/CMS
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Tag;
 /**
 * Article Class Doc Comment
 *
 * @category Class
 * @package  Article
 * @author   Warren Manley <warrenmanley@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/Warra/CMS
 */

class Article extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Sets the model not to auto increment.
     *
     * @var boolean
     */
    protected $increments = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * Relationship between articles and tags
     *
     * @return relationship
     */
    public function tags() 
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Sets tags in a workable string
     *
     * @return string
     */
    public function setTagsString() 
    {
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