<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Post $post){
        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return back();
    }

    public function authorize($ability, $arguments = [])
    {
        return true;
    }

    public function destroy(Request $request, Post $post){
        $request->user()->likes()->where('post_id', $post->id)->delete();

        //Eliminar la imagen del servidor
        

        return back();
    }
}
