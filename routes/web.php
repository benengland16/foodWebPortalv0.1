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

        Route::middleware('SessionHasSuperAdmin')->group(function () {


            Route::group(['prefix' => 'super-admin', 'namespace' => 'SuperAdmin'], function() {


                Route::get('/dash-board','DashboardController@index')->name("superAdmin.dashboard.index");

                Route::get('/user-index','UserController@index')->name("superAdmin.user.index");
                Route::get('/user-create','UserController@create')->name("superAdmin.user.create");
                Route::post('/user-store','UserController@store')->name("superAdmin.user.store");
                Route::delete('/user-delete/{id}','UserController@delete')->name("superAdmin.user.delete");

                Route::get('/recipe-index','RecipeController@index')->name("superAdmin.recipe.index");

                Route::get('/company-index','CompanyController@index')->name("superAdmin.company.index");

                Route::get('/company-recipe-index/{id}','CompanyRecipeController@index')->name("superAdmin.companyRecipe.index");
                Route::delete('/company-recipe-delete/{id}','CompanyRecipeController@delete')->name("superAdmin.companyRecipe.delete");



            });

            Route::group(['prefix' => 'super-admin', 'namespace' => 'Common'], function() {
                $role="superAdmin";
                include base_path().'/routes/common_routes.php';
            });



        });


        Route::middleware('SessionHasAdmin')->group(function () {
           

            Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
                
                $role="admin";
                Route::get('/dash-board','DashboardController@index')->name("$role.dashboard.index");
                

                
            });

            Route::group(['prefix' => 'admin', 'namespace' => 'Common'], function() {
                $role="admin";
                include base_path().'/routes/common_routes.php';
            });

                
        });



        Route::middleware('SessionHasUser')->group(function () {
           
            Route::group(['prefix' => 'user', 'namespace' => 'User'], function() {
                $role="user";
                Route::get('/dash-board','DashboardController@index')->name("$role.dashboard.index");

                Route::get('/recipe-index','RecipeController@index')->name("$role.recipe.index");
                Route::post('/checkout','RecipeController@select')->name("$role.recipe.select");
                Route::post('/order','CheckoutController@checkout')->name("$role.checkout.index");
                Route::get('/cart','RecipeController@get')->name("$role.recipe.get");

            });

            Route::group(['prefix' => 'user', 'namespace' => 'Common'], function() {
                $role="user";
                include base_path().'/routes/common_routes.php';
            });

                
        });



        Route::middleware('SessionHasDistributor')->group(function () {
           
            Route::group(['prefix' => 'distributor', 'namespace' => 'Distributor'], function() {
                $role="distributor";
                Route::get('/dash-board','DashboardController@index')->name("$role.dashboard.index");
            });

            Route::group(['prefix' => 'distributor', 'namespace' => 'Common'], function() {
                $role="distributor";
                include base_path().'/routes/common_routes.php';
            });

                
        });



        Route::middleware('SessionHasManufacturer')->group(function () {
           
            Route::group(['prefix' => 'manufacturer', 'namespace' => 'Manufacturer'], function() {
                $role="manufacturer";
                Route::get('/dash-board','DashboardController@index')->name("$role.dashboard.index");
            });

            Route::group(['prefix' => 'manufacturer', 'namespace' => 'Common'], function() {
                $role="manufacturer";
                include base_path().'/routes/common_routes.php';
            });

                
        });
