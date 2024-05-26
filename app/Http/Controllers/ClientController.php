<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home() {
        return view('client.home',['datas'=>ProductModel::all(),]);
    }
    public function detailproduct(ProductModel $id){
        return view('client.detail',['data' => $id]);
    } 
    public function order(Request $r){
$v= $r->validate([
'productid' => "required",
'userid' => "required",
"quantity" => "required",
"deliverydate" => "required"
]);
 $v['totalprice'] = (int)$r->price * (int)$r->quantity;
OrderModel::create($v);
return redirect('/');
    }
}
