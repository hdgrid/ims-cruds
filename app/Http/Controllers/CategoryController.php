<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; //importar modelo de category para poder accesar datos/tablas de categories


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Category::query();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('categories.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar datos
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        // Crear categoria
        Category::create([
            'name' => $validatedData['name'],
        ]);

        // Redireccionar al index. PENDIENTE: usar session() para desplegar alert de success
        return redirect(route('categories.index'))->with('success', 'Category created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        // Actualizar categoria
        $category->update([
            'name' => $validatedData['name'],
        ]);

        // Redireccionar al index. PENDIENTE: usar session() para desplegar alert de success
        return redirect(route('categories.index'))->with('success', 'Category updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Borrar categoria
        $category->delete();

        // Redireccionar al index. PENDIENTE: usar session() para desplegar alert de success
        return redirect(route('categories.index'))->with('success', 'Category deleted successfully.');
    }
}
