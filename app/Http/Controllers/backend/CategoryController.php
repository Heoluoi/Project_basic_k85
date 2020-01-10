<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use Illuminate\Http\Request;
use App\models\Category;

class CategoryController extends Controller
{
    function getCategory() {
        $data['categories'] = Category::all();
        return view('backend.category.category',$data);
    }

    function getEditCategory() {
        return view('backend.category.editcategory');
    }

    function postCategory(AddCategoryRequest $r){
        // dd($r->all());
    }
    function postEditCategory(request $r){

    }
}
