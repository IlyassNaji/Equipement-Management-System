<?php

use App\Http\Controllers\BesoinController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;




Route::get('/',function(){
    return view('welcome');
})->name('home'); 

Route::get('/dashboard', [HomeController::class, 'redirect'])->name('dashboard');
Route::prefix('/equipement')->group(function () {
    Route::get('/', [EquipementController::class, 'index'])->name('equipement.index');
    Route::get('/valable', [EquipementController::class, 'indexv'])->name('equipement.indexv');
    Route::get('/create', [EquipementController::class, 'create'])->name('equipement.create');
    Route::get('/search', [EquipementController::class, 'search'])->name('equipement.search');
    Route::get('/{equipement}', [EquipementController::class, 'show'])->name('equipement.details');
    Route::post('/', [EquipementController::class, 'store'])->name('equipement.store');
    Route::get('/{equipement}/edit', [EquipementController::class, 'edit'])->name('equipement.edit');
    Route::put('/{equipement}', [EquipementController::class, 'update'])->name('equipement.update');
    Route::get('/{equipement}/destroy', [EquipementController::class, 'destroy'])->name('equipement.delete');
    Route::get('/{equipement}/valable', [EquipementController::class, 'valable'])->name('equipement.valable');
    Route::put('/{equipement}/affect', [EquipementController::class, 'affecter'])->name('equipement.affect');
    Route::get('/{equipement}/assign', [EquipementController::class, 'assign'])->name('equipement.assign');
});

Route::prefix('/utilisateur')->group(function () {
    Route::get('/', [UtilisateurController::class, 'index'])->name('user.index'); // Using 'user' for consistency
    Route::get('/create', [UtilisateurController::class, 'create'])->name('user.create');
    Route::get('/search', [UtilisateurController::class, 'search'])->name('user.search');
    Route::get('/{user}', [UtilisateurController::class, 'show'])->name('user.details'); // Using 'user' for consistency
    Route::post('/', [UtilisateurController::class, 'store'])->name('user.store');
    Route::get('/{user}/edit', [UtilisateurController::class, 'edit'])->name('user.edit'); // Using 'user' for consistency
    Route::put('/{user}', [UtilisateurController::class, 'update'])->name('user.update'); // Using 'user' for consistency
    Route::get('/{user}/destroy', [UtilisateurController::class, 'destroy'])->name('user.delete'); // Using 'user' for consistency
});

Route::prefix('/besoin')->group(function () {
    Route::get('/', [BesoinController::class, 'index'])->name('besoin.index');
    Route::get('/search', [BesoinController::class, 'search'])->name('besoin.search');
    Route::get('/{besoin}', [BesoinController::class, 'show'])->name('besoin.details');
    Route::post('/{id}', [BesoinController::class, 'store'])->name('besoin.store');
    Route::get('/{besoin}/edit', [BesoinController::class, 'edit'])->name('besoin.edit');
    Route::put('/{besoin}', [BesoinController::class, 'update'])->name('besoin.update');
    Route::get('/{besoin}/destroy', [BesoinController::class, 'destroy'])->name('besoin.delete');
    Route::get('/create/{equipement}', [BesoinController::class, 'create'])->name('equipement.besoin');
});

Route::prefix('/maintenance')->group(function () {
    Route::get('/', [MaintenanceController::class, 'index'])->name('maintenance.index');
    Route::get('/create', [MaintenanceController::class, 'create'])->name('maintenance.create');
    Route::get('/search', [MaintenanceController::class, 'search'])->name('maintenance.search');
    Route::get('/{maintenance}', [MaintenanceController::class, 'show'])->name('maintenance.details');
    Route::post('/', [MaintenanceController::class, 'store'])->name('maintenance.store');
    Route::get('/{maintenance}/edit', [MaintenanceController::class, 'edit'])->name('maintenance.edit');
    Route::put('/{maintenance}', [MaintenanceController::class, 'update'])->name('maintenance.update');
    Route::get('/{maintenance}/destroy', [MaintenanceController::class, 'destroy'])->name('maintenance.delete');
    Route::get('/create/{equipement}', [MaintenanceController::class, 'create'])->name('equipement.maintenance');
});
Route::get('/accepted/{besoin}', [BesoinController::class, 'accept'])->name('besoin.accept');
Route::get('/refused/{besoin}', [BesoinController::class, 'refuse'])->name('besoin.refuse');
Route::get('/fixed/{maintenance}', [MaintenanceController::class, 'fix'])->name('maintenance.accept');
Route::get('/map/{place}', [EquipementController::class, 'emplacement'])->name('equipement.place');
Route::get('/map', function () {
    return view('admin.map');
})->name('map'); 

