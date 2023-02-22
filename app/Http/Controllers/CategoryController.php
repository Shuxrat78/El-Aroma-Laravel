<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryView(){
        $category = new Category();
            return view('category', ['categori'=>$category->all()]);
        }

    public function category_submit(Request $reqc){        
        $category = new Category();
        $category->name = $reqc->input('cat_name');

        $category->save();
        return redirect()->route('category-view');
    }
}
