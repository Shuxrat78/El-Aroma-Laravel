<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function brendView(){
        $brend = new Brand();
            return view('brend', ['brend'=>$brend->all()]);
        }

    public function brend_submit(Request $req){
        $brend = new Brand();
        $brend->name = $req->input('brend');

        $brend->save();
        return redirect()->route('brend-view');
    }
}
