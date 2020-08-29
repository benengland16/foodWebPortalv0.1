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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/dashboard','DashboardController@index')->name('superAdmin.dashboard.index');

        Route::middleware('SessionHasSuperAdmin')->group(function () {


            Route::group(['prefix' => 'super-admin', 'namespace' => 'SuperAdmin'], function() {

                

                Route::get('/dash-board','DashboardController@index')->name("superAdmin.dashboard.index");


                Route::get('/user','UserController@index')->name("superAdmin.user.index");
                Route::get('/user/create/','UserController@createNew')->name("superAdmin.user.create");
                Route::post('/user/create/','UserController@register')->name("superAdmin.user.register");
                Route::delete('/user/{id}','UserController@destroy')->name("superAdmin.user.destroy");
                Route::get('/user/{id}/edit','UserController@edit')->name("superAdmin.user.edit");
                Route::put('/user/{id}','UserController@update')->name("superAdmin.user.update");


                Route::get('/company','CompanyController@index')->name("superAdmin.company.index");
                Route::get('/company/create/','CompanyController@create')->name("superAdmin.company.create");
                Route::post('/company/create/','CompanyController@store')->name("superAdmin.company.store");
                Route::get('/company/{id}/edit','CompanyController@edit')->name("superAdmin.company.edit"); 
                Route::put('/company/{id}','CompanyController@update')->name("superAdmin.company.update");
                Route::delete('/company/{id}','CompanyController@destroy')->name("superAdmin.company.destroy");



                Route::get('/basestation-index','BaseStationController@index')->name("superAdmin.baseStation.index");
                Route::get('/basestation-edit','BaseStationController@edit')->name("superAdmin.baseStation.edit");
                Route::put('/basestation-update','BaseStationController@update')->name("superAdmin.baseStation.update");
                Route::get('/basestation-configuration-edit/{id}','BaseStationConfigController@edit')->name("superAdmin.baseStationConfig.edit");
                Route::put('/basestation-configuration-update','BaseStationConfigController@update')->name("superAdmin.baseStationConfig.update");

                Route::get('/base-station-company/','BaseStationCompanyController@create')->name("superAdmin.baseStationCompany.create");
                Route::post('/base-station-company/create/{id}','BaseStationCompanyController@store')->name("superAdmin.baseStationCompany.store");
                Route::delete('/base-station-company/{id}','BaseStationCompanyController@destroy')->name("superAdmin.baseStationCompany.destroy");


                Route::get('/site-under-company/{id}','SiteController@siteUnderBusinessIndex')->name("superAdmin.groupUnderCompany.index");
                Route::get('/site','SiteController@index')->name("superAdmin.site.index");
                Route::get('/site/create/','SiteController@create')->name("superAdmin.site.create");
                Route::post('/site/create/','SiteController@store')->name("superAdmin.site.store");
                Route::get('/site/{id}/edit','SiteController@edit')->name("superAdmin.site.edit");
                Route::put('/site/{id}','SiteController@update')->name("superAdmin.site.update");
                Route::delete('/site/{id}','SiteController@destroy')->name("superAdmin.site.destroy");


                Route::get('/user-site','UserSiteController@index')->name("superAdmin.userSite.index");
                Route::get('/user-site/create/','UserSiteController@create')->name("superAdmin.userSite.create");
                Route::post('/user-site/create/','UserSiteController@store')->name("superAdmin.userSite.store");
                Route::get('/user-site/{id}','UserSiteController@show')->name("superAdmin.userSite.show");
                Route::delete('/user-site/{id}','UserSiteController@destroy')->name("superAdmin.userSite.destroy");
                Route::get('/user-site/{id}/edit','UserSiteController@edit')->name("superAdmin.userSite.edit");
                Route::put('/user-site/{id}','UserSiteController@update')->name("superAdmin.userSite.update");


                Route::get('/base-station-site/','BaseStationSiteController@create')->name("superAdmin.baseStationSite.create");
                Route::get('/base-station-site/{id}/edit','BaseStationSiteController@edit')->name("superAdmin.baseStationSite.edit");
                Route::post('/base-station-site/create/{id}','BaseStationSiteController@store')->name("superAdmin.baseStationSite.store");
                Route::post('/base-station-site/{id}','BaseStationSiteController@update')->name("superAdmin.baseStationSite.update");
                Route::delete('/base-station-site/{id}','BaseStationSiteController@destroy')->name("superAdmin.baseStationSite.destroy");
                Route::get('/base-station-site/getsitedetails','BaseStationSiteController@getSiteDetails')->name("superAdmin.baseStationSite.getSiteDetails");



                Route::get('/data-file/{id}','DataFileController@show')->name("superAdmin.dataFile.show");
                Route::post('/data-file/ftp','DataFileController@updateFTP')->name("superAdmin.dataFile.updateFTP");
                Route::post('/data-file/ftp-onoff','DataFileController@updateFTPStatus')->name("superAdmin.dataFile.updateFTPStatus");
                Route::post('/data-file/{id}','DataFileController@update')->name("superAdmin.dataFile.update");


                Route::get('/read-emails','ReadEmailsController@index')->name("superAdmin.readEmails.index");
                Route::post('/read-emails','ReadEmailsController@start')->name("superAdmin.readEmails.start");

                Route::get('/read-bomdata','ReadBOMDataController@index')->name("superAdmin.readBOMData.index");
                Route::post('/read-bomdata','ReadBOMDataController@start')->name("superAdmin.readBOMData.start");


                Route::get('/ftp-data-feed-config-show/','FTPDataFeedConfigController@show')->name("superAdmin.fTPDataFeedConfig.show");
                Route::post('/ftp-data-feed-config-store/','FTPDataFeedConfigController@store')->name("superAdmin.fTPDataFeedConfig.store");
                Route::get('/ftp-data-feed-config-create/','FTPDataFeedConfigController@create')->name("superAdmin.fTPDataFeedConfig.create");
                Route::delete('/ftp-data-feed-config-destroy/','FTPDataFeedConfigController@destroy')->name("superAdmin.fTPDataFeedConfig.destroy");
                Route::get('/ftp-data-feed-config-edit/','FTPDataFeedConfigController@edit')->name("superAdmin.fTPDataFeedConfig.edit");
                Route::put('/ftp-data-feed-config-update/','FTPDataFeedConfigController@update')->name("superAdmin.fTPDataFeedConfig.update");

                //API DevicesApiContents
                Route::get('/dashboard','APIContentsGeneratorContorller@index')->name("superAdmin.Create.Api.Contents.index");
                Route::get('/read-local-csv','ReadLocalCsvFileController@index')->name("superAdmin.readLocalCsvFile.index");
                Route::post('/read-local-csv','ReadLocalCsvFileController@start')->name("superAdmin.readLocalCsvFile.start");



            });

            Route::group(['prefix' => 'super-admin', 'namespace' => 'Common'], function() {
                $role="superAdmin";
                include base_path().'/routes/common_routes.php';
            });



        });




        Route::middleware('SessionHasOntotoAdmin')->group(function () {


            Route::group(['prefix' => 'ontoto-admin', 'namespace' => 'OntotoAdmin'], function() {
                $role="ontotoAdmin";
                Route::get('/dash-board','DashboardController@index')->name("$role.dashboard.index");
            });

            Route::group(['prefix' => 'ontoto-admin', 'namespace' => 'Common'], function() {
                $role="ontotoAdmin";
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
            });

            Route::group(['prefix' => 'user', 'namespace' => 'Common'], function() {
                $role="user";
                include base_path().'/routes/common_routes.php';
            });

                
        });
