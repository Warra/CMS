<?php namespace App\Commands;
/**
 * CMS Delete Article Command
 *
 */

use App\Commands\Command;
use App\Article;
use Illuminate\Contracts\Bus\SelfHandling;

class DeleteArticle extends Command implements SelfHandling
{

    protected $id;
    protected $name;
    protected $description;

    /**
   * Create a new command instance.
   *
   * @return void
   */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
   * Execute the command.
   *
   * @return void
   */
    public function handle()
    {
        $article = Article::find($this->id);
        $article->delete();
    }

}
