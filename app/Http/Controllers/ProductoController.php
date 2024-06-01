<?php

namespace App\Http\Controllers;

use App\Exports\ProductosExport;
use App\Models\categoria;
use App\Models\marca;
use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProductoController extends Controller
{
    public function shop()
    {
        $productos = Producto::with('categorias')->get()->sortBy('categoria.nombre');
        return view('shop')->with(['productos' => $productos]);
    }

    public function index()
    {
        return view('producto.index',['productos'=>producto::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = categoria::all();
        $marcas = marca::all();
        return view('producto.create', compact('categorias','marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:255',
            'stock'=>'required',
            'descripcion'=>'required|max:255',
            'precioventa'=>'required',
            'imagen_url' => 'required|image',
            'id_marca'=>'required',
            'id_categoria'=>'required',
        ]);

        //obtener nombre de la imagen
        $nombreImagen = time().'_'.$request->imagen_url->getClientOriginalName();
        //obtener ruta
        $ruta = $request->imagen_url->storeAs('public/imagenes/productos', $nombreImagen);
        $url = Storage::url($ruta);

        $producto=new producto();
        $producto->nombre=$request->input('nombre');
        $producto->stock=$request->input('stock');
        $producto->descripcion=$request->input('descripcion');
        $producto->precioventa=$request->input('precioventa');
        $producto->imagen_url = $url;
        $producto->id_marca=$request->input('id_marca');
        $producto->id_categoria=$request->input('id_categoria');
        $producto->save();
        activity()->useLog('producto')->log('creado')->subject($producto);
        return view("producto.message",['msg'=>"Guardado con Exito"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = producto::findOrFail($id);

        // Obtener otros productos de la misma categoría
        $productosRelacionados = producto::where('id_categoria', $producto->id_categoria)
            ->where('id', '!=', $producto->id)
            ->get();
    
        return view('producto.show', [
            'producto' => $producto,
            'productosRelacionados' => $productosRelacionados,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(producto $producto)
    {
        $marcas = Marca::pluck('nombre', 'id');
        $categorias = categoria::pluck('nombre', 'id');
        return view('producto.edit', compact('producto','marcas','categorias'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, producto $producto)
    {
        $request->validate([
            'nombre'=>'required|max:255',
            'stock'=>'required',
            'descripcion'=>'required|max:255',
            'precioventa'=>'required',
            'imagen_url' => 'image',
            'id_marca'=>'required',
            'id_categoria'=>'required',
        ]);
        if ($request->hasFile('imagen_url')) {
            // obtener nombre de la imagen
            $nombreImagen = time().'_'.$request->imagen_url->getClientOriginalName();
            // obtener ruta
            $ruta = $request->imagen_url->storeAs('public/imagenes/productos', $nombreImagen);
            $url = Storage::url($ruta);
            // actualizar la url de la imagen en el producto
            $producto->imagen_url = $url;
        }
        $producto->nombre = $request->input('nombre');
        $producto->stock = $request->input('stock');
        $producto->descripcion = $request->input('descripcion');
        $producto->precioventa = $request->input('precioventa');
        $producto->id_marca = $request->input('id_marca');
        $producto->id_categoria = $request->input('id_categoria');
        $producto->save();
        activity()->useLog('producto')->log('actualizado')->subject($producto);

        return view("producto.message", ['msg' => "Registro actualizado con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $producto)
    {
        producto::destroy($producto);
        activity()->useLog('producto')->log('eliminado')->subject($producto);
        return redirect()->route('producto.index');
    }
    public function exportarExcel()
    {
        return Excel::download(new ProductosExport, 'productos.xlsx');
    }
}
