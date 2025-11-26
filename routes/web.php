<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

// Home page - redirect to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', function () {
        // Password reset logic
    })->name('password.email');
    
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password', function () {
        // Password store logic
    })->name('password.store');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard - accessible with authentication
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

// PDV / Facturation Routes
Route::middleware('auth')->prefix('pdv')->name('pdv.')->group(function () {
    Route::get('/', function () {
        return view('pdv.index');
    })->name('index');
    
    Route::post('/create-invoice', function (Illuminate\Http\Request $request) {
        try {
            $invoiceData = $request->json()->all();
            
            // Validation des données
            if (empty($invoiceData['items']) || empty($invoiceData['client'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Données de facture invalides'
                ], 400);
            }
            
            // Génération d'un ID unique pour la facture
            $invoiceId = 'INV-' . date('YmdHis') . '-' . rand(1000, 9999);
            
            // Stockage temporaire en session (à remplacer par une BD)
            session(['invoice_' . $invoiceId => $invoiceData]);
            
            return response()->json([
                'success' => true,
                'message' => 'Facture créée avec succès',
                'invoice_id' => $invoiceId,
                'invoice_url' => route('pdv.show', ['id' => $invoiceId])
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur: ' . $e->getMessage()
            ], 500);
        }
    })->name('create');
    
    Route::get('/invoices', function () {
        return response()->json(['invoices' => []]);
    })->name('list');
    
    Route::get('/invoice/{id}', function ($id) {
        // Récupération de la facture depuis la session
        $invoice = session('invoice_' . $id);
        
        if (!$invoice) {
            return redirect()->route('pdv.index')->with('error', 'Facture non trouvée');
        }
        
        return view('pdv.invoice', ['invoice' => $invoice]);
    })->name('show');
});

// Settings Routes
Route::middleware('auth')->prefix('settings')->name('settings.')->group(function () {
    Route::get('/', function () {
        return view('settings.index');
    })->name('index');
    
    Route::post('/update-general', function () {
        return response()->json(['success' => true, 'message' => 'Paramètres généraux mis à jour']);
    })->name('update-general');
    
    Route::post('/update-company', function () {
        return response()->json(['success' => true, 'message' => 'Informations entreprise mises à jour']);
    })->name('update-company');
    
    Route::post('/update-appearance', function () {
        return response()->json(['success' => true, 'message' => 'Apparence mise à jour']);
    })->name('update-appearance');
    
    Route::post('/update-notifications', function () {
        return response()->json(['success' => true, 'message' => 'Notifications mises à jour']);
    })->name('update-notifications');
    
    Route::post('/update-security', function () {
        return response()->json(['success' => true, 'message' => 'Sécurité mise à jour']);
    })->name('update-security');
});

// Reports Routes
Route::middleware('auth')->prefix('reports')->name('reports.')->group(function () {
    Route::get('/', function () {
        return view('reports.index');
    })->name('index');
    
    Route::get('/invoices', function () {
        return response()->json(['invoices' => []]);
    })->name('invoices');
    
    Route::post('/export-csv', function () {
        return response()->download('invoices.csv');
    })->name('export-csv');
    
    Route::post('/export-excel', function () {
        return response()->download('invoices.xlsx');
    })->name('export-excel');
});

// Clients Management Routes
Route::middleware('auth')->prefix('clients')->name('clients.')->group(function () {
    Route::get('/', function () {
        return view('clients.index');
    })->name('index');
    
    Route::post('/store', function () {
        return response()->json(['success' => true, 'message' => 'Client créé avec succès']);
    })->name('store');
    
    Route::get('/{id}', function ($id) {
        return response()->json(['id' => $id, 'name' => 'Client']);
    })->name('show');
    
    Route::put('/{id}', function ($id) {
        return response()->json(['success' => true, 'message' => 'Client mis à jour']);
    })->name('update');
    
    Route::delete('/{id}', function ($id) {
        return response()->json(['success' => true, 'message' => 'Client supprimé']);
    })->name('destroy');
});

// Stock Management Routes
Route::middleware('auth')->prefix('stock')->name('stock.')->group(function () {
    // Stock Management Index
    Route::get('/', function () {
        return view('stock.index');
    })->name('index');
    
    // CRUD Operations
    Route::post('/store', function () {
        // Store product
        return response()->json(['success' => true, 'message' => 'Produit créé avec succès']);
    })->name('store');
    
    Route::get('/{id}', function ($id) {
        // Show product details
        return response()->json(['id' => $id, 'name' => 'Produit']);
    })->name('show');
    
    Route::put('/{id}', function ($id) {
        // Update product
        return response()->json(['success' => true, 'message' => 'Produit mis à jour']);
    })->name('update');
    
    Route::delete('/{id}', function ($id) {
        // Delete product
        return response()->json(['success' => true, 'message' => 'Produit supprimé']);
    })->name('destroy');
    
    // Bulk Actions
    Route::post('/bulk/update-price', function () {
        return response()->json(['success' => true, 'message' => 'Prix mis à jour']);
    })->name('bulk.update-price');
    
    Route::post('/bulk/update-stock', function () {
        return response()->json(['success' => true, 'message' => 'Stock mis à jour']);
    })->name('bulk.update-stock');
    
    Route::post('/bulk/update-threshold', function () {
        return response()->json(['success' => true, 'message' => 'Seuils mis à jour']);
    })->name('bulk.update-threshold');
    
    Route::post('/bulk/export', function () {
        // Export to CSV
        return response()->download('products.csv');
    })->name('bulk.export');
    
    Route::post('/bulk/delete', function () {
        return response()->json(['success' => true, 'message' => 'Produits supprimés']);
    })->name('bulk.delete');
});

require __DIR__.'/auth.php';
