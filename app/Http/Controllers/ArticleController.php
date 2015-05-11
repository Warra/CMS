<?php namespace App\Http\Controllers;
/**
 * CMS Article Controller
 *
 */

use App\Article;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Foundation\Bus\DispatchesCommands;
use App\Commands\UpdateArticle;
use App\Commands\DeleteArticle;


class ArticleController extends Controller
{
    use DispatchesCommands;

    /**
   * Create a new controller instance.
   *
   * @return void
   */
    // public function __construct()
    // {
    //   $this->middleware('guest');
    // }

    /**
   * Show the application welcome screen to the user.
   *
   * @return Response
   */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Shows the Articles view
     *
     * @return View
     */
    public function view()
    {
        $articles = Article::all();
        return view('Articles', ['articles' => $articles]);
    }

    //update functions

    /**
     * Shows the Article Update view
     *
     * @return View
     */
    public function updateArticleView($id)
    {
        $article = Article::where('id', $id)->first();
        return view('UpdateArticle', ['article' => $article]);
    }

    /**
     * Updates the Article
     * Gets the data and sends it to the UpdateArticleCommand which then updates the article
     *
     * @return View
     */
    public function update($id)
    {
        $name = Input::get("name");
        $description = Input::get("description");
        $tags = $this->getTags(Input::get('tags'));

        \Bus::dispatch(
            new UpdateArticle($id, $name, $description, $tags)
        );
        return redirect()->route('/articles');
    }

    /**
     * Deletes the Article
     * Gets the data and sends it to the DeleteArticleCommand which then deletes the article
     *
     * @return View
     */
    public function delete($id)
    {
        \Bus::dispatch(
            new DeleteArticle($id)
        );
        return $this->view();
    }

    //tag functions

    //get tags string
    //split by ','
    //return tags in an array
    public function getTags($tags) 
    {
        $split_tags = array_map('trim', explode(',', $tags));
        $split_tags = array_filter($split_tags);
        return $split_tags;
    }


}
