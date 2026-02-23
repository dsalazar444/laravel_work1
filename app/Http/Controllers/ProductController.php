<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{
    # Atributo que es una lista publica
    # de acá es donde se sacan los productos de la web, de momento no son como bd, sino esto


 public function index(): View
 {
 $viewData = [];
 $viewData["title"] = "Products - Online Store";
 $viewData["subtitle"] = "List of products";
 $viewData["products"] = Product::all();
 return view('product.index')->with("viewData", $viewData);
 }
 
 # Funcion tipo index pero para un solo producto
 public function show(string $id) : View
 {
 $viewData = [];
 $product = Product::findOrFail($id);
 $viewData["title"] = $product["name"]." - Online Store";
 $viewData["subtitle"] = $product["name"]." - Product information";
 $viewData["product"] = $product;
//  $viewData["price"] = ProductController::$price[$id-1]; pues se obtiene con product en show.blade

 return view('product.show')->with("viewData", $viewData);
 }

 public function create(): View
 {
 $viewData = []; //to be sent to the view
 $viewData["title"] = "Create product";

 return view('product.create')->with("viewData",$viewData);
 }

 # acá es donde llegan los datos desde view, pues se manda metodo post, o sea, un request
 public function save(Request $request): \Illuminate\Http\RedirectResponse
 {
 $request->validate([
 "name" => "required",
 "price" => "required"
 ]);

 //here will be the code to call the model and save it to the database
 Product::create($request->only(["name","price"]));
 return back();
 
 }
} 


 
