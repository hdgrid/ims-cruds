<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\InventoryLogController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MovementController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
	return 'Hello World';
});	


//Products CRUD routes
Route::resource('products', ProductController::class);
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search'); //incluir nombre para poder incluir url products.search


// Users CRUD Routes
Route::resource('users', UserController::class);

// Products CRUD Routes
//Route::resource('products', ProductController::class);

// Suppliers CRUD Routes
Route::resource('suppliers', SupplierController::class);
Route::get('/suppliers/search', [SupplierController::class, 'search'])->name('suppliers.search');

// Movements CRUD Routes
Route::resource('movements', MovementController::class);

// Categories CRUD Routes
Route::resource('categories', CategoryController::class);
Route::get('/categories/search', [CategoryController::class, 'search'])->name('categories.search');

// todo esto posiblemente se tendra que cambiar
// User Authentication. WIP
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Roles and Permissions
Route::middleware(['auth'])->group(function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/{id}', [RoleController::class, 'show'])->name('roles.show');

    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/{id}', [PermissionController::class, 'show'])->name('permissions.show');
});


// Inventory
Route::middleware(['auth'])->group(function () {
    Route::get('/inventory-logs', [InventoryLogController::class, 'index'])->name('inventory-logs.index');
    Route::get('/inventory-logs/{id}', [InventoryLogController::class, 'show'])->name('inventory-logs.show');

    Route::get('/inventories', [InventoryController::class, 'index'])->name('inventories.index');
    Route::get('/inventories/{id}', [InventoryController::class, 'show'])->name('inventories.show');
});

