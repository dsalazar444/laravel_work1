<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    # Atributo que es una lista publica
    # de acá es donde se sacan los productos de la web, de momento no son como bd, sino esto
 public static $products = [
 ["id"=>"1", "name"=>"TV", "description"=>"Best TV", "price"=>"$10"],
 ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone", "price"=>"$10"],
 ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast", "price"=>"$10"],
 ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses", "price"=>"$10"]
 ];

 public function index(): View
 {
 $viewData = [];
 $viewData["title"] = "Products - Online Store";
 $viewData["subtitle"] = "List of products";
 $viewData["products"] = ProductController::$products;
 return view('product.index')->with("viewData", $viewData);
 }
 
 # Funcion tipo index pero para un solo producto
 public function show(string $id) : View
 {
 $viewData = [];
 $product = ProductController::$products[$id-1];
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
 public function save(Request $request)
 {
 $request->validate([
 "name" => "required",
 "price" => "required"
 ]);
 dd($request->all()); #Mostramos todos los datos enviados en la peticion
 //here will be the code to call the model and save it to the database
 }
} 


 
