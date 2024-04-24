<?php

namespace App\Http\Controllers;

use App\Models\Product; //Esta linea es para decirle a Laravel que quiero utilizar el modelo ya creado para  
use Illuminate\Http\Request;
use App\Models\Category; //importar modelo de category para poder accesar datos/tablas de categories
use App\Models\Supplier; //importar modelo de supplier para poder accesar datos/tablas de suppliers


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::all();
        $suppliers = Supplier::all();    
        $categories = Category::all();

        return view('products.index', compact('products', 'categories', 'suppliers'));
    }

    public function search(Request $request) 
    {
        $search = $request->search;

        // Empezar query en modelo basado en lo que el usuario ingrese en su busqueda
        $products = Product::where(function($query) use ($search) { 
            //
            $query->where('name', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%");
            })
            //WhereHas para checar modelos relacionados: category y supplier
            ->orWhereHas('category', function($query) use($search){
                $query->where('name', 'like', "%$search%");
            })
            ->orWhereHas('suppliers', function($query) use($search){
                $query->where('name', 'like', "%$search%");
            })
            //Obtener productos que hayan sido filtrados
            ->get();

            // Log::info('Number of products found: ' . $products->count()); // Log the number of products found

        return view('products.index', compact('products', 'search'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //NO SERIA PARA CREAR UN PRODUCTO, SINO PARA GUIARNOS A LA PAGINA DONDE CREAMOS UN PRODUCTO
    {
        $suppliers = Supplier::all();    
        $categories = Category::all();

        return view('products.create', compact('categories', 'suppliers'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //ESTE SI SERIA PARA CREAR UN PRODUCTO O NUEVA ENTRADA
    {

        // dd($request->(all));

        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'base_price' => 'required|numeric',
            'base_cost' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id', 
        ]);

        // Create a new product
        $product = Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'base_price' => $validatedData['base_price'],
            'base_cost' => $validatedData['base_cost'],
            'category_id' => $validatedData['category_id'],
        ]);

        // Attach the associated suppliers
        $product->suppliers()->attach($validatedData['supplier_id']);

        // Redireccionar al index. PENDIENTE: usar session() para desplegar un alert de exito
        return redirect(route('products.index'))->with('success', 'Product created successfully.');
        }

    /**
     * Display the specified resource. /sip, muestra producto basado en identificador/
     */
    public function show(string $id)
    {
        // $product=Product::where('id',$id)->first();
        //  //Product es el modelo
        //     echo($product->id.'.'.$product->name.'<br>'); //id es un atributo no variable por eso no tiene $


        // return 'Estoy en el ProductController. El id del producto es: ' .$id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) //no edita, muestra la pantalla donde vas a editar
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
    
        return view('products.edit', compact('product', 'categories', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validar los datos del form
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'base_price' => 'required|numeric',
            'base_cost' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        // Actualizar el producto
        $product->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'base_price' => $validatedData['base_price'],
            'base_cost' => $validatedData['base_cost'],
            'category_id' => $validatedData['category_id'],
        ]);

        // Actualizar / sincronizar producto. 
        //Sync se asegura que la tabla intermedia se actualize correctamente
        $product->suppliers()->sync($validatedData['supplier_id']);

        // Redireccionar al index
        return redirect(route('products.index'))->with('success', 'Product updated successfully.');
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) //borra
    {
        // Detach the associated suppliers
        $product->suppliers()->detach();

        // Delete the product
        $product->delete();

        // Redirect or return a response
        return redirect(route('products.index'))->with('success', 'Product deleted successfully.');
    }
}
