<?php namespace App\Commands;

use App\Commands\Command;
use App\GenerateId;
use App\Article;
use Illuminate\Contracts\Bus\SelfHandling;

Class CreateArticle extends Command implements SelfHandling {

	protected $id;
	protected $attributes;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(GenerateId $id, $attributes)
	{
		$this->id = $id;
		$this->attributes = $attributes;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$article = new Article($this->attributes);
		$article->id = $this->id;
		$article->save();
	}

}
