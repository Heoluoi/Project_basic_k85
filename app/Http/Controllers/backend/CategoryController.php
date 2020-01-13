<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use Illuminate\Http\Request;
use App\models\Category;
use Illuminate\Support\Str;

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
        $cate = new Category;
        $cate->name=$r->name;
        $cate->slug=Str::slug($r->name, '-');
        $cate->parent=$r->parent;
        $cate->save();
        return redirect()->back()->with('thongbao','Đã thêm thành công');
    }
    function postEditCategory(request $r){

    }
}
