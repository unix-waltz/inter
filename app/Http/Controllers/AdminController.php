<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard',[
            'productall' => ProductModel::all(),
        ]);
    }
    public function newproduct(Request $r){
        $v = $r->validate([
            'product_name'=> "required|max:27",
            'product_price'=> "required",
            'product_category'=> "required",
            'product_description'=> "required|max:60",
        ]);
        $v['product_thumbnail'] = '';
       if($r->file('product_thumbnail')){
        $v['product_thumbnail'] = $r->file('product_thumbnail')->store('product_thumbnail');
       }
       ProductModel::create($v);
       return redirect()->back()->with('success','success add new product!');
    }   
    public function deleteproduct(ProductModel $id){
        $id->delete();
       return redirect('/admin/dashboard')>with('success','success delete product!');

    }  
    public function detailproduct(ProductModel $id){
        return view('admin.detail',['data' => $id]);
    } 
    public function editproduct(Request $r){
       $model = ProductModel::find($r->id);
       $v = $r->validate([
        'product_name'=> "required|max:27",
            'product_price'=> "required",
            'product_category'=> "required",
            'product_description'=> "required|max:60",
       ]);
    //    $v['product_thumbnail'] = '';
       if($r->file('product_thumbnail')){
        $v['product_thumbnail'] = $r->file('product_thumbnail')->store('product_thumbnail');
       }
       $model->update($v);
       return redirect()->back()->with('success','success update product!');
    }
}
