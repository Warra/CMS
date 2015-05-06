<?php namespace App\Commands;

use App\Commands\Command;
use App\GenerateId;
use App\Article;
use Illuminate\Contracts\Bus\SelfHandling;

class UpdateArticle extends Command implements SelfHandling {

  protected $id;
  protected $name;
  protected $description;

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct($id, $name, $description)
  {
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
  }

  /**
   * Execute the command.
   *
   * @return void
   */
  public function handle()
  {
    $article = Article::find($id)
    $article->name = $name;
    $article->description = $description;
    $article->save();
    // event(new updateArticle($this->id, $this->name, $this->description));
  }

  // public function updateArticle($id, $name, $description) {
  //   $article = Article::find($id)
  //   $article->name = $name;
  //   $article->description = $description;
  //   $article->save();
  // }

}
