<?php namespace App\Commands;
use App\Commands\Command;
use App\GenerateId;
use App\Tag;
use Illuminate\Contracts\Bus\SelfHandling;

Class CreateAndAttachTag extends Command implements SelfHandling {
  protected $id;
  protected $attributes;
  protected $article;
  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct(GenerateId $id, $attributes, $article)
  {
    $this->id = $id;
    $this->attributes = $attributes;
    $this->article = $article;
  }
  /**
   * Execute the command.
   *
   * @return void
   */
  public function handle()
  {
    $tag = new Tag($this->attributes);
    $tag->id = $this->id;
    $tag->save();
    $this->article->tags()->attach($this->id);
  }
}