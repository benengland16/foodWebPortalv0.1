<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','Auth\LoginController@index')->name('login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/register','Auth\RegisterController@index')->name('register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/dashboard','DashboardController@index')->name('superAdmin.dashboard.index');

        


        



        Route::middleware('SessionHasUser')->group(function () {
           
            Route::group(['prefix' => 'user', 'namespace' => 'User'], function() {
                $role="user";
                Route::get('/dash-board','DashboardController@index')->name("$role.dashboard.index");

                Route::get('/recipe-index','RecipeController@index')->name("$role.recipe.index");
                Route::post('/checkout','RecipeController@select')->name("$role.recipe.select");
                Route::post('/order','CheckoutController@checkout')->name("$role.checkout.index");
                Route::get('/cart','RecipeController@get')->name("$role.recipe.get");
                Route::get('/clear-cart','RecipeController@clear_cart')->name("$role.recipe.clear_cart");

            });

            Route::group(['prefix' => 'user', 'namespace' => 'Common'], function() {
                $role="user";
                include base_path().'/routes/common_routes.php';
            });

                
        });



        



        
