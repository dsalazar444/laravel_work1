<?php
 
namespace App\Http\Controllers; #SIgnifica que esta clase está en esa dir

use Illuminate\View\View; #Use es el import, nos permite escribir View, en lugar de toda la ruta, al usarlo
 
class HomeController extends Controller
{
    public function index(): View #Indica que función retorna un objeto View
    {
        return view('home.index'); #view() crea una vista con archivo 'home.index'
    }
}

# En Django, lo que hace views.py es prácticamente lo mismo que hacen los controllers en Laravel.