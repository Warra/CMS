<?php namespace App\Commands;

/**
 * CMS Create Tag Command
 *
 */
use App\Commands\Command;
use App\GenerateId;
use App\Tag;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateTag extends Command implements SelfHandling
{
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
        $tag = new Tag($this->attributes);
        $tag->id = $this->id;
        $tag->save();
    }
}
