<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Panel;
use App\Http\Controllers\Panel\PanelAuthController;
use App\Http\Controllers\Panel\MembersController;
use App\Http\Controllers\Panel\ProductsController;
use App\Http\Controllers\Panel\CategoriesController;
use App\Http\Controllers\ProfileController;

Route::prefix('/admin')->group(function() {

    /* 
    ** Required Routes For Starting & Destroying User Session
    */
    Route::controller(PanelAuthController::class)->group(function() {

        // Login Page
        Route::get('/', 'index')->name('admin.login');

        // Send verifiction codes using on of authenicated info
        Route::get('/forget', 'forgetPass')->name('admin.pass.forget');

        // Add new password page and reset it
        Route::get('/reset', 'resetPass')->name('admin.pass.reset');

    });
    
    /* 
    ** Routes That Is Needs Authntication
    */
    Route::middleware(Panel::class)->group(function() {

        // Dashboard Page
        Route::get('/dashboard', function() {
            return view('admin.dashboard.index');
        })->name('dashboard');

        Route::controller(ProfileController::class)->group(function() {
            // Profile page
            Route::get('profile', 'index')->name('profile');
        });
        
        // Members Management Controller
        Route::controller(MembersController::class)->group(function() {
            // Members Table show/Add/Edit/Delete/Approve
            Route::get('members', 'index')->name('members'); 
            // Adding New Member Form
            Route::get('members/add', 'create')->name('members.add'); 
            // Saving New Member data in the database
            Route::post('members/store', 'store')->name('members.store'); 
            // Edit users data page
            Route::get('members/{id}/edit', 'edit')->name('members.edit');
            // Update target user data page
            Route::put('members/{id}/update', 'update')->name('members.update');
            // Delete users data from storage
            Route::delete('members/{id}/destroy', 'destroy')->name('members.destroy');
            // Approve users route
            Route::put('members/{id}/approve', 'approve')->name('members.approve');
        });

        // Products Management Controller
        Route::controller(ProductsController::class)->group(function () {
            // Products Home Page
            Route::get('products', 'index')->name('products');
            // Showing Adding New Product Page
            Route::get('products/add', 'create')->name('products.add');
            // Save New Product Into Database
            Route::post('products', 'store')->name('producrs.store');
            // Editing Products
            Route::get('products/{id}/edit', 'edit')->name('products.edit');
            Route::put('products/{id}/update', 'update')->name('products.update');
            // Deleting Products
            Route::delete('products/{id}/destroy', 'destroy')->name('products.destroy');
        });

        // Categories Management Controller
        Route::controller(CategoriesController::class)->group(function () {
            // Categories Home Page
            Route::get('categories', 'index')->name('categories');
            // Showing Adding New Product Page
            Route::get('categories/add', 'create')->name('categories.add');
            // Save New Product Into Database
            Route::post('/categories', 'store')->name('categories.store');
            // Edit Specific Product Data
            Route::get('categories/{id}/edit', 'edit')->name('categories.edit');
            Route::put('categories/{id}/update', 'update')->name('categories.update');
            // Deleting
            Route::delete('categories/{id}/destroy', 'destroy')->name('categories.destroy');
        });

    });

})->name('admin');