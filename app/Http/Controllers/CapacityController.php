<?php

namespace App\Http\Controllers;

use App\Models\Capacity;
use Illuminate\Http\Request;

class CapacityController extends Controller
{
    
    public function capacityView(){
        $capacity = new Capacity();
            return view('capacity', ['capaciti'=>$capacity->all()]);
        }

    public function capacity_submit(Request $reqc){        
        $capacity = new Capacity();
        $capacity->cpct = $reqc->input('cpct');

        $capacity->save();
        return redirect()->route('capacity-view');
    }

}