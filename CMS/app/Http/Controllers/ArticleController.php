<?php namespace App\Http\Controllers;
use App\Article;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Foundation\Bus\DispatchesCommands;


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

  public function showAll()
  {
    return Article::all();
  }

  public function show($id)
  {
    // dd($id);
    return Article::where('id', $id)->get();
  }

  public function update($id)
  {
    $name = Input::get("name");
    $description = Input::get("description");
    // $article = Article::find($id);
    Bus::dispatch(
          new UpdateArticle($id, $name, $description)
    );
    return "Article Updated Successfully";
  }

  public function view()
  {
    $articles = Article::all();
    return view('articles', ['articles' => $articles]);
  }

  public function updateArticle($id)
  {
    $article = Article::where('id', $id)->first();
    return view('UpdateArticle', ['article' => $article]);
  }

  public function updateTest($id, $name, $description) {
    Bus::dispatch(
          new UpdateArticle($id, $name, $description)
    );
  }

}
