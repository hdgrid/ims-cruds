<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::all();
		$roles = Role::all();
		
		$query = User::query();
		
		return view('users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
		$roles = Role::all();
		
		return view('users.create', compact('users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
			'last_name' => 'required|max:255',
            'password' => 'required|max:255',
            'email' => 'required|max:255',
			'role_id' => 'required|exists:roles,id',
        ]);
		
		// Add the user
        $user = User::create([
            'name' => $validatedData['name'],
			'last_name' => $validatedData['last_name'],
            'password' => $validatedData['password'],
            'email' => $validatedData['email'],
			'role_id' => $validatedData['role_id'],
        ]);
		

        // Redirect or return a response
        return redirect(route('users.index'))->with('success', 'User added successfully.');
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
    public function edit(User $user)
    {
        $roles = Role::all();
		
		return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
			'last_name' => 'required|max:255',
            'password' => 'required|max:255',
            'email' => 'required|max:255',
			'role_id' => 'required|exists:roles,id',
        ]);
		
		// Update the user
        $user -> update([
            'name' => $validatedData['name'],
			'last_name' => $validatedData['last_name'],
            'password' => $validatedData['password'],
            'email' => $validatedData['email'],
			'role_id' => $validatedData['role_id'],
        ]);
		
		

        // Redirect or return a response
        return redirect(route('users.index'))->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        // Delete the product
        $user->delete();

        // Redirect or return a response
        return redirect(route('users.index'))->with('success', 'User deleted successfully.');
    }
}
