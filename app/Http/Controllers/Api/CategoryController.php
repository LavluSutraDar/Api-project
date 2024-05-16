<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\SuccessResource;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        //return new CategoryResource($categories);
        return new SuccessResource([
            'Success' => '',
            'data' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = validator::make($request->all(), [
            'name'=> 'required|string|unique:categories',
            'email' => 'required|unique:categories',    
            'phone' => 'required|unique:categories'
        ]);

        if ($validate->fails()) {
            return(new ErrorResource($validate->getMessageBag()))->response()->setStatusCode(422);
        }

        $formdata = $validate->validated();
        $formdata['slug'] = Str::slug($formdata['name']);
        $category = Category::create($formdata);
        return (new SuccessResource(['message' => 'Sucessfully created']))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //$formdata = new CategoryResource($category);
        return new SuccessResource([
            'Success' => '',
            'data' => $category
        ]);

        // $category = Category::find($id);
        // if($category){
        //     return response()->json([
        //         'status'  => 200,
        //         'seccess' => true,
        //         'message' => 'Sucessfull',
        //         'data'    => $category,
        //     ]);
        // }else{
        //     return response()->json([
        //         'stats'=>422,
        //         'seccess' => false,
        //         'message' => 'Category not found',
        //     ], 422);
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        
        $validate = validator::make($request->all(), [
            'name' => 'required|string|unique:categories,name,' . $category->id,
            'email' => 'required|unique:categories,email,' . $category->id,
            'phone' => 'required:categories,phone,' . $category->id,
        ]);

        if ($validate->fails()) {
            return (new ErrorResource($validate->getMessageBag()))->response()->setStatusCode(422);
        }

        $formdata = $validate->validated();
        $formdata['slug'] = Str::slug($formdata['name']);
        $category->update($formdata);
        return (new SuccessResource(['message' => 'Sucessfully Update']))->response()->setStatusCode(201);  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return (new SuccessResource(['message' => 'Sucessfully Deleted']))->response()->setStatusCode(201);
    }
}
