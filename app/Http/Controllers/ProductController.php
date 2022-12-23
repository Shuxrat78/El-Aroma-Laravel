<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Capacity;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function updateFotoSubmit(Request $request){ // функция для изменения фото товара
        $product = Product::find($request->input('id'));
        $fn='';
        foreach ($request->file() as $file){
            foreach ($file as $f) {
                $f->move(storage_path('../public/img'), $f->getClientOriginalName());
                // $fn .= $f->getClientOriginalName().'|';
                $fn .= $f->getClientOriginalName();
            }
        }        

        $product->filename = $fn;

        $product->save();

        return redirect()->route('product-list')->with('success','Фото обновлено!!!');
    }

    public function productNewSubmit(ProductRequest $request){ // функция для ввода нового товара

        $product = new Product();        
        $product->name = $request->input('name');
        $product->brand_id = $request->input('brend_id');
        $product->category_id = $request->input('cat_id');
        $product->capacity_id = $request->input('cap_id');
        $product->price = $request->input('price');

        $fn='';

        foreach ($request->file() as $file){
            foreach ($file as $f) {
                $f->move(storage_path('../public/img'), $f->getClientOriginalName());
                // $fn .= $f->getClientOriginalName().'|';
                $fn .= $f->getClientOriginalName();
            }
        }        

        $product->filename = $fn;
        $product->save();
        return redirect()->route('product-list')->with('success','Данные записаны!!!');
    }

     // функция для изменения товара
    public function productEditSubmit($id, Request $request){

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->brand_id = $request->input('brend_id');
        $product->category_id = $request->input('cat_id');
        $product->capacity_id = $request->input('cap_id');
        $product->price = $request->input('price');

        $product->save();

        return redirect()->route('product-list')->with('success','Данные изменены!!!');
    }

    public function productList(){ // функция показа товаров для админа
    
        $product = new Product();
        $brend = new Brand();
        $category = new Category();
        $capacity = new Capacity();

    return view('products', ['data'=>$product->paginate(20), 'brend'=>$brend->all(), 'category'=>$category->all(), 'capacity'=>$capacity->all()]);
        }


    public function productView(){ // функция показа товаров без сортировки
        $brend = new Brand();
        $category = new Category();
        $capacity = new Capacity();

        $product = DB::table("products")
            ->join('capacities', 'products.capacity_id', '=', 'capacities.id')
            ->select('products.*', 'products.name', 'products.price', 'products.filename', 'capacities.cpct')
        ->get();

        foreach($brend->all() as $brnd){$brnd->brand_checked = 0; $brnd->save();}
        foreach($category->all() as $category){$category->category_checked = 0; $category->save();}
        foreach($capacity->all() as $capacity){$capacity->capacity_checked = 0; $capacity->save();}
        $mn='';
        $mx='';
        
        return view('home', ['data'=>$product->all(), 'brend'=>$brend->all(), 'category'=>$category->all(), 'capacity'=>$capacity->all(), 'mn'=>$mn, 'mx'=>$mx]);
    }

    public function productReq(Request $request){ // функция показа товаров с сортировкой

        if (count($request->keys()) == 1){
        
            return redirect()->route('product-view');
            }
    
        else

        $brend = new Brand();
        $category = new Category();
        $capacity = new Capacity();
        $product = new Product();

        foreach($product->all() as $prd){$prd->checked = 0; $prd->save();}
        foreach($brend->all() as $brnd){$brnd->brand_checked = 0; $brnd->save();}
        foreach($category->all() as $category){$category->category_checked = 0; $category->save();}
        foreach($capacity->all() as $capacity){$capacity->capacity_checked = 0; $capacity->save();}

        // Стчетчики
        $br = 0;
        $cat = 0;
        $cap = 0;
        $prc = 0;
        $prd = 0;

// Чтение и выполнение запросов для таблицы Brands
        $brnd1 = $brend->all();
        foreach($brnd1 as $brnd){
            $nme='brend'.$brnd->id;
            if ($request->input($nme) != null){
            $brnd->brand_checked = 1;
            $brnd->save();            
            }
        }

// Чтение и выполнение запросов для таблицы Categories
        $ctgri1 = $category->all();
        foreach($ctgri1 as $ctgri){
            $ctg='category'.$ctgri->id;
            if ($request->input($ctg) != null){
                $ctgri->category_checked = 1;
                $ctgri->save();                
            }
        }

// Чтение и выполнение запросов для таблицы Capacities
        $cpct1 = $capacity->all();
        foreach($cpct1 as $cpct){
            $cpc='capacity'.$cpct->id;
            if ($request->input($cpc) != null){
            $cpct->capacity_checked = 1;
            $cpct->save();        
            }
        }

// Чтение и выполнение запросов для таблицы Products
        $product1 = $product->all();
        foreach($product1 as $product2){
            $nme='brend'.$product2->brand_id;
            if ($request->input($nme) != null){
                $product2->checked += 1;
                $br = 1;
                $product2->save();
            }
            $ctg='category'.$product2->category_id;
            if ($request->input($ctg) != null){
                $product2->checked += 1;
                $cat = 1;
                $product2->save();
            }
            $cpc='capacity'.$product2->capacity_id;
            if ($request->input($cpc) != null){
                $product2->checked += 1;
                $cap = 1;
                $product2->save();
            }

            $mn = $request->input('min');
            $mx = $request->input('max');
            if (($request->input('min') != null) && ($request->input('max') != null)){
                if (($mn <= $product2->price) && ($mx >= $product2->price)){
                    $product2->checked += 1;
                    $prc = 1;
                    $product2->save();
                }
            }

            if (($request->input('min') == null) && ($request->input('max') != null)){
                if ($mx >= $product2->price){
                    $product2->checked += 1;
                    $prc = 1;
                    $product2->save();
                }
            }

            if (($request->input('min') != null) && ($request->input('max') == null)){
                if ($mn <= $product2->price){
                    $product2->checked += 1;
                    $prc = 1;
                    $product2->save();
                }
            }

}

$prd = $br + $cat + $cap + $prc; //Итог запросов к таблицам

$product = DB::table("products")
->join('capacities', 'products.capacity_id', '=', 'capacities.id')
->select('products.*', 'products.name', 'products.price', 'products.checked', 'products.filename', 'capacities.cpct')
// ->orderBy('name', 'asc')
->orderBy('price', 'asc')
->where('products.checked', '=', $prd)
->get();

    return view('home', ['data'=>$product->all(), 'brend'=>$brend->all(), 'category'=>$category->all(), 'capacity'=>$capacity->all(), 'mn'=>$mn, 'mx'=>$mx]);
    }
}
