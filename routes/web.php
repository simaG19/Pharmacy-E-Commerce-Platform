<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProductController;

Route::post('/create-checkout-session', [StripeController::class, 'createCheckoutSession']);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/concelt', function () {
    return view('concelt');
});
Route::get('/upload', function () {
    return view('upload');
});
Route::get('/shop', function () {
    return view('shop');
});
Route::get('/cart', function () {
    return view('cart');
});



Route::get('/checkout', function () {
    return view('checkout');
});
Route::post('/add_to_cart', function () {
    // Handle adding the product to the cart
})->name('add_to_cart');



Route::get('/product_details/{id}', [ProductController::class, 'show'])->name('product.details');
Route::get('/checkout/success', function () {
    return view('checkout.success'); // Display success message
})->name('checkout.success');

Route::get('/checkout/cancel', function () {
    return view('checkout.cancel'); // Display cancel message
})->name('checkout.cancel');



// Route for login page
Route::get('/login', function () {
    return view('login'); // This is the view with your login form
});
Route::post('/login', function (Request $request) {
    $username = "admin";
    $hashed_password = '$2y$12$ErQu/7R2ZdaCWuUvuRqZyeXl25kozGWRuteNoRUKvlwnilU0UtO8W'; // hashed password for "password123"
    
    $input_username = $request->input('username');
    $input_password = $request->input('password');

    if ($input_username === $username && password_verify($input_password, $hashed_password)) {
        session(['username' => $username]);
        return redirect('/admin_area');
    } else {
        return back()->with('error', 'Invalid username or password');
    }
});

// Admin area route with session check
Route::get('/admin_area', function () {
    if (!session('username')) {
        return redirect('/login')->with('error', 'Please log in first');
    }
    return view('admin_area');
});

// Manage products route with session check
Route::get('/manage_products', function () {
    if (!session('username')) {
        return redirect('/login')->with('error', 'Please log in first');
    }
    return view('manage_products');
});

Route::get('/show_orders', function () {
    if (!session('username')) {
        return redirect('/login')->with('error', 'Please log in first');
    }
    return view('show_orders');
});
Route::get('/add_product', function () {
    return view('add_product');
})->name('add_product');

Route::post('/add_product', [ProductController::class, 'store']);

Route::get('/manage_products', function () {
    if (!session('username')) {
        return redirect('/login')->with('error', 'Please log in first');
    }
    return view('manage_products');
})->name('manage_products');
