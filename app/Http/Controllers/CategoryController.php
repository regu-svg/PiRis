<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request){
        Category::create($request->all());
        return redirect()->back();
    }

    public function delete($id){
        Category::find($id)->delete();
        return redirect()->back();
    }
}
