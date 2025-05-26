<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto; // Asegúrate de importar el modelo Producto


class productController extends Controller
{

    // Funciones para ver los productos
    public function index(){
        

        $productos = Producto::all();

        return view('product', compact('productos'));

    }

    // Funciones para crear

    public function viewCreate(){
        return view('create_product');
    }

    public function createProduct(Request $request){

        // Verificamos que no exista el producto por el nombre

        $productoExistente = Producto::where('nombre', $request->input('nombre'))->first();
        if ($productoExistente) {
            return redirect()->back()->with('error', 'El producto ya existe.');
        }

        // Validar

        $request->validate([

            'descripcion' => 'required|string|max:1000',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        // Crear el producto
        $producto = new Producto();
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->stock = $request->input('stock');

        $producto->save();

        return redirect()->route('products')->with('success', 'Producto creado exitosamente.');

    }

    // Funciones para actualizar

    public function viewUpdate(){
        return view('update_product');
    }

    public function updateProduct(Request $request){

        $id = $request->input('id');

        if($id == null){
            return redirect()->back()->with('error', 'El id no puede ser nulo.');
        }

        // Verificamos que exista el producto por el id
        $productoExistente = Producto::find($id);

        if(!$productoExistente){
            return redirect()->back()->with('error', 'El producto no existe.');
        }

        // Validar

        $request->validate([

            'descripcion' => 'required|string|max:1000',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);
        // Actualizar el producto

        $productoExistente->nombre = $request->input('nombre');
        $productoExistente->descripcion = $request->input('descripcion');
        $productoExistente->precio = $request->input('precio');
        $productoExistente->stock = $request->input('stock');

        $productoExistente->save();
        return redirect()->route('products')->with('success', 'Producto actualizado exitosamente.');
    }

    // Funcion para eliminar

    public function viewDelete(){
        return view('delete_product');
    }

    public function deleteProduct(Request $request){

        $id = $request->input('id');

        if($id == null){
            return redirect()->back()->with('error', 'El id no puede ser nulo.');
        }

        // Verificamos que exista el producto por el id
        $productoExistente = Producto::find($id);

        if(!$productoExistente){
            return redirect()->back()->with('error', 'El producto no existe.');
        }

        // Eliminar el producto

        $productoExistente->delete();
        return redirect()->route('products')->with('success', 'Producto eliminado exitosamente.');

        



    }


    // Funcion para ver el producto


    public function viewProduct(){
        return view('view_product');
    }

    public function findProduct(Request $request){

        $id = $request->input('id');

        if($id == null){
            return redirect()->back()->with('error', 'El id no puede ser nulo.');
        }

        // Verificamos que exista el producto por el id
        $productoExistente = Producto::find($id);

        if(!$productoExistente){
            return redirect()->back()->with('error', 'El producto no existe.');
        }

        // Devolvemos una respuesta a la vista

        return view('view_product', ['producto' => $productoExistente]);

    }



    // METODOS API JSON

    public function getAllProducts(){
        $productos = Producto::all();

        if($productos->isEmpty()){
            return response()->json(['message' => 'No hay productos disponibles'], 404);
        }

        return response()->json($productos, 200);
    }

    public function getProduct($id){

        if($id == null){
            return response()->json(['message' => 'El id no puede ser nulo'], 404);

        }

        $producto = Producto::find($id);
        if(!$producto){
            return response()->json(['message' => 'El producto no existe'], 404);
        }

    

        return response()->json(['producto' => $producto], 200);
    }

    public function getProductByName($name = 'Null'){

        if($name == 'Null'){
            return response()->json(['message' => 'El nombre no puede ser nulo'], 404);
        }

        $producto = Producto::where('nombre', $name)->first();

        if(!$producto){
            return response()->json(['message' => 'El producto no existe'], 404);
        }

        return response()->json($producto, 200);
    }

    public function getProductByPrice($min = 0, $max = 1000000){

        $productos = Producto::whereBetween('precio', [$min, $max])->get();

        if($productos->isEmpty()){
            return response()->json(['message' => 'No hay productos disponibles'], 404);
        }

        return response()->json($productos, 200);

    }

    public function createProductApi(Request $request){

        $validate = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        $producto = Producto::create($validate);

        return response()->json(['message' => 'Producto creado exitosamente', 'producto' => $producto], 201);
    }


    public function updateProductApi(Request $request, $id){

        if($id == null){
            return response()->json(['message' => 'El id no puede ser nulo'], 404);
        }

        $producto = Producto::find($id);

        if(!$producto){

            return response()->json(['message' => 'El producto no existe'], 404);
        }

        $validate = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        $producto->update($validate);
        return response()->json(['message' => 'Producto actualizado exitosamente', 'producto' => $producto], 200);
    }

    public function patchProductApi(Request $request, $id){

        if($id == null){
            return response()->json(['message' => 'El id no puede ser nulo'], 404);
        }

        $producto = Producto::find($id);

        if(!$producto){
            return response()->json(['message' => 'El producto no existe'], 404);
        }

        $validate = $request->validate([
            'nombre' => 'string|max:255',
            'descripcion' => 'string|max:1000',
            'precio' => 'numeric|min:0',
            'stock' => 'integer|min:0'
        ]);

        $producto->update($validate);
        return response()->json(['message' => 'Producto actualizado exitosamente', 'producto' => $producto], 200);
    }

    
    






















    // Lógica para archivos

    public function postArchivo(Request $request){

        $file = $request->file('archivo');

        if($file == null){
            return response()->json(['message' => 'El archivo no puede ser nulo'], 404);
        }

        // Guardamos 

        $file->storeAs('productos', $file->getClientOriginalName(), 'local');

        return response()->json(['message' => 'Archivo guardado exitosamente'], 200);

    }

    



}
