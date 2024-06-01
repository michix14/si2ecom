<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\marca;
use App\Models\NotaDeEntrada;
use Illuminate\Http\Request;

class NotaDeEntradaController extends Controller
{
    public function index()
    {
        return view('nota_de_entrada.index',['notasDeEntrada'=>NotaDeEntrada::all()] );
    }

    public function create()
    {
        $marcas = marca::all();
        $categorias = categoria::all();
        return view('nota_de_entrada.create', compact('marcas', 'categorias'));
        
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        return view('nota_de_entrada.show', ['notaDeEntrada'=>NotaDeEntrada::findOrFail($id)]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(NotaDeEntrada $nota_de_entrada)
    {
        $nota_de_entrada->delete();
        return view('nota_de_entrada.index');
    }
}
