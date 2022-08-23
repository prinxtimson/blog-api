<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/post",
     *     summary="List all posts",
     *     operationId="index",
     *     tags={"Post"},
     *     @OA\Response(
     *         response=200,
     *         description="A list of posts",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(type="object", ref="#/components/schemas/PostData")
     *         ),
     *     )
     * )
     */
    public function index()
    {
        $posts = Post::all();

        return $posts;
    }

    /**
     * @OA\Post(
     *     path="/api/post",
     *     summary="New blog post",
     *     operationId="store",
     *     tags={"Post"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Post object",
     *         @OA\JsonContent(ref="#/components/schemas/PostRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="A list of posts",
     *         @OA\JsonContent( ref="#/components/schemas/PostData"),
     *     )
     * )
     */
    public function store(Request $request)
    {

        $post = Post::create($request->all());

        return $post;
    }

    /**
     * @OA\Get(
     *     path="/api/post/{id}",
     *     summary="Get blog post by ID",
     *     operationId="show",
     *     tags={"Post"},
     *   @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the post you want to get",
     *         required=true,
     *         @OA\Schema(type="integer", minimum=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Single Post",
     *         @OA\JsonContent( ref="#/components/schemas/PostData"),
     *     )
     * )
     */
    public function show($id)
    {
        return Post::find($id);
    }

    /**
     * @OA\Put(
     *     path="/api/post/{id}",
     *     summary="Update blog post",
     *     operationId="update",
     *     tags={"Post"},
     *   @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the post you want to get",
     *         required=true,
     *         @OA\Schema(type="integer", minimum=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Post object",
     *         @OA\JsonContent(ref="#/components/schemas/PostRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Updated post",
     *         @OA\JsonContent( ref="#/components/schemas/PostData"),
     *     )
     * )
     */
    public function update(Request $request, $id)
    {

        $post = Post::find($id);

        $post->update($request->all());

        return $post;
    }

     /**
     * @OA\Delete(
     *     path="/api/post/{id}",
     *     summary="Delete blog post",
     *     operationId="destroy",
     *     tags={"Post"},
     *   @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the post you want to get",
     *         required=true,
     *         @OA\Schema(type="integer", minimum=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Delete Post",
     *         @OA\JsonContent(type="integer", example=1)
     *         ),
     *     )
     * )
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $deleted = $post->delete();

        return $deleted;
    }

    /**
     * @OA\Components(
     *     @OA\Schema(
     *         schema="PostData",
     *         @OA\Xml(name="PostData"),
     *         @OA\Property(property="id", type="integer", example="1"),
     *         @OA\Property(property="title", type="string", example="First Post"),
     *         @OA\Property(property="body", type="string", example="This is my first post"),
     *         @OA\Property(property="created_at", type="string",  example="2022-08-22T21:06:02.000000Z"),
     *         @OA\Property(property="updated_at", type="string", example="2022-08-22T21:06:02.000000Z"),
     *     ),
     *     @OA\Schema(
     *         schema="PostRequest",
     *         @OA\Xml(name="PostData"),
     *         @OA\Property(property="title", type="string", example="First Post"),
     *         @OA\Property(property="body", type="string", example="This is my first post"),
     *     )
     * )
     */
}
