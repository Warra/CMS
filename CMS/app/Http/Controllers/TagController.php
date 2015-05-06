<?php namespace App\Http\Controllers;
use App\Tag;

class TagController extends Controller {

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function show()
    {
        $tags = Tag::all();
        return view('Tags', ['tags' => $tags]);
    }

    public function updateShow($id)
    {
        $tag = Tag::where('id', $id);
        return view('Tags', ['tags' => $tag]);
    }

    public function delete()
    {
        $tags = Tag::all();
        return view('Tags', ['tags' => $tags]);
    }

}
