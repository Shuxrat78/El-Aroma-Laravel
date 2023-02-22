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

    return view('products', ['data'=>$product->paginate(5), 'brend'=>$brend->all(), 'category'=>$category->all(), 'capacity'=>$capacity->all()]);
        }


    public function productView(){ // функция показа товаров без сортировки
        $brend = new Brand();
        $category = new Category();
        $capacity = new Capacity();

        $product = DB::table("products")
            ->join('capacities', 'products.capacity_id', '=', 'capacities.id')
            ->select('products.*', 'products.name', 'products.price', 'products.filename', 'capacities.cpct')
        ->get();

        /*foreach($brend->all() as $brnd){$brnd->brand_checked = 0; $brnd->save();}
        foreach($category->all() as $category){$category->category_checked = 0; $category->save();}
        foreach($capacity->all() as $capacity){$capacity->capacity_checked = 0; $capacity->save();}
        */
        $mn='';
        $mx='';
        
        /*return view('home', ['data'=>$product->all(), 'brend'=>$brend->all(), 'category'=>$category->all(), 'capacity'=>$capacity->all(), 'mn'=>$mn, 'mx'=>$mx]);*/
        return view('home', ['brend'=>$brend->all(), 'category'=>$category->all(), 'capacity'=>$capacity->all()]);
    }

    public function productReq(Request $request){ // функция показа товаров с сортировкой

        $brend = Brand::all()->keyBy('id');
        $brnd = $brend->except('brand_name')->pluck('id')->toArray();
        $capacity = Capacity::all()->keyBy('id');

        if ($request->zp > 1) {

        $data_br1 = collect($request->get('data1'))->keyBy('name');
        $data_br = $data_br1->except('_token')->pluck('name')->toArray();
        $data_cat1 = collect($request->get('data2'))->keyBy('name');
        $data_cat = $data_cat1->except('_token')->pluck('name')->toArray();
        $data_cap1 = collect($request->get('data3'))->keyBy('name');
        $data_cap = $data_cap1->except('_token')->pluck('name')->toArray();
        $data_pr = collect($request->get('data4'))->keyBy('name');
        $min = $data_pr['min']['value'];
        $max = $data_pr['max']['value'];

        $products = Product::query()
            ->when($data_br, function ($query) use ($data_br) {
                $query->whereIn('brand_id', $data_br);
            })
            ->when($data_cat, function ($query) use ($data_cat) {
                $query->whereIn('category_id', $data_cat);
            })
            ->when($data_cap, function ($query) use ($data_cap) {
                $query->whereIn('capacity_id', $data_cap);
            })
            ->when($min && $max, function ($query) use ($min, $max) {
                $query->whereBetween('price', array(intval($min * 1.0), intval($max * 1.0)));
            })
            /*->when($data_pr['min']['value'] && $data_pr['max']['value'] , function ($query) use ($data_pr) {
                $query->whereBetween('price', array($data_pr['min']['value'], $data_pr['max']['value']));
            })*/

            ->paginate(5);

            $products->transform(function ($product) use ($capacity) {
                if ($capacity->contains($product->capacity_id)) {
                    $product->cpct = $capacity->get($product->capacity_id)->cpct;
                }
                return $product;
                });

        $html = view("inc.bside", ['data' => $products])->render();
        return response()->json(array('databr' => $data_br, 'datacat' => $products, 'html' => $html));

        }
        if ($request->zp = 1) {
            $products = Product::query()
                ->when($brnd, function ($query) use ($brnd) {
                    $query->whereIn('brand_id', $brnd);
                })
                ->paginate(5);

            $products->transform(function ($product) use ($capacity) {
                if ($capacity->contains($product->capacity_id)) {
                    $product->cpct = $capacity->get($product->capacity_id)->cpct;
                }
                return $product;
            });
            $html = view("inc.bside", ['data' => $products])->render();
            return response()->json(array('html' => $html));

        }
    }
}
