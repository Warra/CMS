<?php namespace App\Http\Controllers;
/**
 * CMS Tag Controller
 *
 */

use Illuminate\Support\Facades\Input as Input;
use Illuminate\Foundation\Bus\DispatchesCommands;
use App\Commands\UpdateTag;
use App\Commands\DeleteTag;
use App\Tag;

class TagController extends Controller
{
    use DispatchesCommands;

    /**
     * Shows the tag view
     *
     * @return View
     */
    public function view()
    {
        $tags = Tag::all();
        return view('Tags', ['tags' => $tags]);
    }

    /**
     * Shows the tag view
     *
     * @return View
     */
    public function updateTagView($id)
    {
        $tag = Tag::where('id', $id)->first();
        return view('UpdateTag', ['tag' => $tag]);
    }

    /**
     * Updates the tag
     * Gets input data and sends it to the update tag command
     *
     * @return Route
     */
    public function update($id) 
    {
        $name = Input::get('name');    
        \Bus::dispatch(
            new UpdateTag($id, $name)
        );
        return redirect()->route('/tags');
    }

    /**
     * Deletes the specified tag
     *
     * @return Route
     */
    public function delete($id)
    {
        $tag = Tag::where('id', $id)->first();
        \Bus::dispatch(
            new DeleteTag($id)
        );
        return redirect()->route('/tags');
    }

}
