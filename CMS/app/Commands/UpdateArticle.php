<?php namespace App\Commands;

use App\Commands\Command;
use App\GenerateId;
use App\Article;
use App\Tag;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesCommands;
use \Log;

class UpdateArticle extends Command implements SelfHandling {
  use DispatchesCommands;

  protected $id;
  protected $name;
  protected $description;
  protected $tags;

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct($id, $name, $description, $tags)
  {
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
    $this->tags = $tags;
  }

  /**
   * Execute the command.
   *
   * @return void
   */
  public function handle()
  {
    $article = Article::find($this->id);
    $article->name = $this->name;
    $article->description = $this->description;

    $article->tags()->detach();

    $tag_ids = [];
    //if tag exists already then attach tag
    foreach ($this->tags as $tag) {
      $id = DB::table('tags')->where('name', $tag)->lists('id');
      if(isset($id[0])) {
        $tag_ids[] = $id[0];
      } else {
     //if tag does not exist then create and attach it   
        $tag_name = [
            "name" => $tag
        ];
        \Bus::dispatch(
            new CreateAndAttachTag(new GenerateId, $tag_name, $article)
        ); 
      }
    }
    $article->tags()->attach($tag_ids);
    $article->save();
  }

}
