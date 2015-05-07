<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Foundation\Bus\DispatchesCommands;
use App\Commands\UpdateTag;
use App\Commands\DeleteTag;
use App\Tag;

class TagController extends Controller {
    use DispatchesCommands;
    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function view()
    {
        $tags = Tag::all();
        return view('Tags', ['tags' => $tags]);
    }

    public function updateShow($id)
    {
        $tag = Tag::where('id', $id)->first();
        return view('UpdateTag', ['tag' => $tag]);
    }



    public function update($id) {
        $name = Input::get('name');    
        \Bus::dispatch(
              new UpdateTag($id, $name)
        );
        return redirect()->route('/articles');
    }

    public function delete($id)
    {
        $tag = Tag::where('id', $id)->first();
        \Bus::dispatch(
              new DeleteTag($id)
        );
        return $this->show();
    }

}
