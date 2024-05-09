<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        return response()->json([
            'message' => 'Hii Apurva',
            'status' => 200,
        ]);
    }

    public function store(Request $request){
        return response()->json([
            'category' => $request->all(),
        ]);
    }
}
