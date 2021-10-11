<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//****************************** RUTAS DEL CLIENTEE **************************************************//
Route::get('nosotros', 'WebController@about_us')->name('web.about_us');
Route::get('pagar', 'WebController@checkout')->name('web.checkout');
Route::get('blog_detalles', 'WebController@blog_details')->name('web.blog_details');
Route::get('blog', 'WebController@blog')->name('web.blog');
Route::get('carrito', 'WebController@cart')->name('web.cart');
Route::get('contacto', 'WebController@contact_us')->name('web.contact_us');
Route::get('registro', 'WebController@login_register')->name('web.login_register');
Route::get('productos', 'WebController@shop_grid')->name('web.shop_grid');
//Route::get('detalles', 'WebController@product_details')->name('web.product_details');
Route::get('micuenta', 'MyController@my_account')->name('web.my_account');
Route::get('/', 'WebController@welcome')->name('web.welcome');
Route::get(
    'producto/{product}',
    'WebController@product_details'
)->name('web.product_details');

Route::resource('shopping_cart_detail', 'shoppingCartDetailsController')->only([
    'update', 'detroy'
])->names('shopping_cart_details');

Route::post(
    'add_to_shopping_cart/{product}/store',
    'shoppingCartDetailsController@store'
)->name('shopping_cart_details.store');

Route::get(
    'add_a_product_to_the_shopping_cart/{product}/store',
    'shoppingCartDetailsController@store_a_product'
)->name('store_a_product');

//****************************** TERMINA AQUI LA RUTA DEL CLIENTE ******************************//




Route::get('sales/reports_day', 'ReportController@reports_day')->name('reports.day');
Route::get('sales/reports_date', 'ReportController@reports_date')->name('reports.date');
Route::post('sales/report_results', 'ReportController@report_results')->name('report.results');
//Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::resource('categories', 'CategoryController')->names('categories');
Route::resource('clients', 'ClientController')->names('clients');
Route::resource('providers', 'ProviderController')->names('providers');
Route::resource('users', 'UserController')->names('users');
Route::resource('roles', 'RolController')->names('roles');
Route::resource('business', 'BusinessController')->names('business');
Route::resource('categories', 'CategoryController')->names('categories');
Route::resource('printers', 'PrinterController')->names('printers');

Route::resource('purchases', 'PurchaseController')->names('purchases')->except([
    'edit', 'update', 'destroy'
]);
//Route::resource('sales', 'SaleController')->names('sales');
Route::resource('products', 'ProductController')->names('products');

Route::post('upload/product/{id}/image', 'ProductController@upload_image')->name('upload.product.image');


Route::resource('business', 'BusinessController')->names('business')->only([
    'index', 'update'
]);
Route::resource('printers', 'PrinterController')->names('printers')->only([
    'index', 'update'
]);



Route::resource('sales', 'SaleController')->names('sales')->except([
    'edit', 'update', 'destroy'
]);
Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');
Route::get('sales/print/{sale}', 'SaleController@print')->name('sales.print');

Route::get('print_barcode', 'ProductController@print_barcode')->name('print_barcode');

Route::get('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');
//Route::resource('categories/create', 'CategoryController')->names('categories.create');
//Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');
Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');


Route::get('get_products_by_barcode', 'ProductController@get_products_by_barcode')->name('get_products_by_barcode');

Route::get('get_products_by_id', 'ProductController@get_products_by_id')->name('get_products_by_id');
Route::get('print_barcode', 'ProductController@print_barcode')->name('print_barcode');

Route::get('get_subcategories', 'AjaxController@get_subcategories')->name('get_subcategories');





Route::get('get_products_by_subcategory', 'AjaxController@get_products_by_subcategory')->name('get_products_by_subcategory');


//Ruta para las Sub Categorias
//rutas para las subcategorias

Route::resource('subcategories', 'SubcategoryController')->except([
    'edit', 'update', 'show'
])->names('subcategories');

Route::put('category/{category}/subcategory/{subcategory}/update', 'SubcategoryController@update')->name('subcategories.update');
Route::get('category/{category}/subcategory/{subcategory}', 'SubcategoryController@edit')->name('subcategories.edit');



Route::resource('tags', 'TagController')->except([
    'show',
])->names('tags');


Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('change.status.purchases');
Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('change.status.sales');
Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController')->names('users');
Route::resource('roles', 'RoleController')->names('roles');
//Auth::routes();
Auth::routes(['register' => true]);
Route::get('/home', 'HomeController@index')->name('home');
