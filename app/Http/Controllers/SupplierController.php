<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier; //importar modelo de supplier para poder accesar datos/tablas de categories

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $suppliers = Supplier::all();

        $query = Supplier::query();

        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();

        return view('suppliers.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar datos
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'contact_phone' => 'required|max:20',
        ]);

        // Agregar al proveedor
        Supplier::create([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'contact_phone' => $validatedData['contact_phone'],
        ]);

        // Redireccionar al index. pendiente: usar session() para desplegar alerta de exito
        return redirect(route('suppliers.index'))->with('success', 'Supplier updated successfully.');
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
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        // Validar datos
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'contact_phone' => 'required|max:20',
        ]);

        // Actualizar datos de supplier
        $supplier->update([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'contact_phone' => $validatedData['contact_phone'],
        ]);

        // Redireccionar al index. PENDIENTE: agregar session() para desplegar un alert de exito
        return redirect(route('suppliers.index'))->with('success', 'Supplier updated successfully.');

    }

    public function search(Request $request) 
    {
        $search = $request->search;

        // Empezar query en modelo basado en lo que el usuario ingrese en su busqueda
        $suppliers = Supplier::where(function($query) use ($search) { 
            //Filtrar en modelo suppliers 
            $query->where('name', 'like', "%$search%")
            ->orWhere('address', 'like', "%$search%")
            ->orWhere('contact_phone', 'like', "%$search%");
            })
            //Obtener resultados que hayan sido filtrados
            ->get();

        return view('suppliers.index', compact('suppliers', 'search'));

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        // Borrar al proveedor
        $supplier->delete();

        // Redireccionar al index. PENDIENTE: agregar session() para desplegar un alert de exito
        return redirect(route('suppliers.index'))->with('success', 'Supplier deleted successfully.');
        
    }
}
