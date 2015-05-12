<?php namespace App\Commands;

/**
 * CMS Restore Tag Command
 * Restores a tag that has been temporarily deleted
 */

use App\Commands\Command;
use App\GenerateId;
use App\Tag;
use Illuminate\Contracts\Bus\SelfHandling;

class RestoreTag extends Command implements SelfHandling
{

    protected $id;
    protected $attributes;

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
        $tag = Tag::where('id', $this->id);
        // $tag = Tag::whereNotNull('')->
        $tag->restore();
    }
}
