<?php

namespace App\Http\Controllers\Api;

use App\Models\post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\SuccessResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = post::latest()->get();
        return new SuccessResource([
            'Success' => '',
            'data' => $post
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = validator::make($request->all(), [
            'category_id'=> 'required|integer',
            'title'      => 'required|string',
            'thumbnail'  => 'required|mimes:jpg,jpeg,png',
            'content'    => 'required'
        ]);

        if ($validate->fails()) {
            return (new ErrorResource($validate->getMessageBag()))->response()->setStatusCode(422);
        }

        $data = $validate->validated();
        $data['slug'] = Str::slug($data['title']);

        // if(array_key_exists('thumbnail', $data)){
        //     $data['thumbnail'] = Storage::putFile('', $data['thumbnail']);
        // }

        $slug = str::slug($request->title, "-");
        $photo = $request->thumbnail;
        $photoname = $slug . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path().'/uploads', $photoname); //Without image intervention
        $data['thumbnail'] = $photoname;

        post::create($data);
        return (new SuccessResource(['message' => 'Sucessfully Post created']))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        //$formdata = new CategoryResource($post);
        return new SuccessResource([
            'Success' => '',
            'data' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $validate = validator::make($request->all(), [
            'category_id' => 'required|integer',
            'title'      => 'required:Posts,string,title,' . $post->id,
            'thumbnail'  => 'required:Posts,mimes:jpg,jpeg,png,thumbnail,' .$post->id,
            'content'    => 'required:Posts,content,' . $post->id
        ]);

        if ($validate->fails()) {
            return (new ErrorResource($validate->getMessageBag()))->response()->setStatusCode(422);
        }
        $formdata = $validate->validated();
        $formdata['slug'] = Str::slug($formdata['title']);

        if (array_key_exists('thumbnail', $formdata)) {
            Storage::delete($post->thumbnail);
            $data['thumbnail'] = Storage::putFile('', $formdata['thumbnail']);
        }

        $post->update($formdata);
        return (new SuccessResource(['message' => 'Sucessfully Update']))->response()->setStatusCode(201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->thumbnail);
        $post->delete();
        return (new SuccessResource(['message' => 'Sucessfully Deleted']))->response()->setStatusCode(201);
    }
}
