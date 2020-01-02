<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function getCategory() {
        return view('backend.category.category');
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
