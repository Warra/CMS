<?php namespace App\Commands;

use App\Commands\Command;
use App\GenerateId;
use App\Tag;
use Illuminate\Contracts\Bus\SelfHandling;

class UpdateTag extends Command implements SelfHandling {

  protected $id;
  protected $name;

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct($id, $name)
  {
    $this->id = $id;
    $this->name = $name;
  }

  /**
   * Execute the command.
   *
   * @return void
   */
  public function handle()
  {
    $tag = Tag::find($this->id);
    $tag->name = $this->name;
    $tag->save();
  }

}
