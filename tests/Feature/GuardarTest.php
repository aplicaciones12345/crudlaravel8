<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuardarTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        //CONSULTA: que devuelve todos los registros del modelo Product, ordenados por el último creado(latest()) o (oldtest()) y además hace una paginación mostrando sólo 5 resgistros por página
        $products = \App\Models\Product::latest()->paginate(5);

        $this->assertNotNull($products); //Esto es que sí tiene registros

        //Devuelve la vista products.index con los datos del array de objetos products
        //Para la paginación:También se envía una variable i, que significa que si el la variable i está definidad en la solicitud obtendrá ese valor, sino cogerá el valor 1 por defecto
        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function test_dashboard()
    {
        if(Auth::check()){
            $this->assertEquals(200);
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }

}
