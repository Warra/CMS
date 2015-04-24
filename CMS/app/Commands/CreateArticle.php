<?php namespace App\Commands;

use App\Commands\Command;
use App\GenerateId;
use App\Article;
use Illuminate\Contracts\Bus\SelfHandling;

Class CreateArticle extends Command implements SelfHandling {

	protected $id;
	protected $name;
	protected $desc;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(GenerateId $id, $name, $desc)
	{
		$this->id = $id;
		$this->name = $name;
		$this->desc = $desc;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$article = new Article($this->name, $this->desc);
		$article->id = $this->id;
		$article->save();
	}

}
