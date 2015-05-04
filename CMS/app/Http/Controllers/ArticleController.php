<?php namespace App\Http\Controllers;
use App\Article;
use Illuminate\Foundation\Bus\DispatchesCommands;

class ArticleController extends Controller {
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

  public function showAll()
  {
    return Article::all();
  }

  public function show($id)
  {
    return Article::where('id', $id)->get();
  }

  public function update($id, $name, $description) {
    $article = Article::find($id);
    Bus::dispatch(
          new UpdateArticle($id, $name, $description)
    );    
  }

  public function view() {
    $articles = Article::all();

    return view('articles', ['articles' => $articles]);
  }

}
