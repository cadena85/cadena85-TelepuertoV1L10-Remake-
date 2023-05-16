<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

//añadimos estas lineas
use App\Http\Resources\V1\PostResource;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //una colección        
        return PostResource::collection(Post::latest()->paginate());   
        //si se necesita otra configuracion se crearia otro recurso 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //return $post;
        return new PostResource($post);//el formato que le muestro al software que se conecte
        //un software de 3ro se esta conectando a mi sistema a traves de la direccion 
        //http://localhost/telepuertoV1L10/public/api/v1/posts/27
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //tarea
        //response()->json()
        $post->delete();//borrar recurso
        //un feedback
        return response()->json([
            'message' => 'Succes: Post Deleted'], Response::HTTP_ACCEPTED);

        /*
            public function destroy(Post $post)
        {
            $post->delete();
            return response()->json(null, 204);
        }
            */
        /*$post->delete();
        return response("", 204);*/
    }
}
