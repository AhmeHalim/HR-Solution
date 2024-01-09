<?php

Route::group(['middleware'=>['web','localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],'prefix' => LaravelLocalization::setLocale() ],function(){



    Route::get('/lang/{lang}', 'AdminController@setlang');
    Route::get('/','WebsiteController@home');





    Route::get('page/{link}','WebsiteController@getPage');
    Route::post('save-career-application','WebsiteController@saveCareerApplication');
});


Route::group(['middleware'=>['admin','web','localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],'prefix'=>LaravelLocalization::setLocale()],function(){
    Route::group(['prefix'=>'admin'],function(){
        Route::get('', 'AdminController@admin');

        Route::get('/switch-theme', 'AdminController@switchTheme');
        Route::post('{name}/up/{ids}','AdminController@updatestatus');
        Route::resource('/countries', 'CountryController');
        Route::resource('/regions', 'RegionController');
        Route::resource('/areas', 'AreaController');
        Route::resource('/settings', 'SettingController');
        Route::resource('/configrations', 'ConfigrationController');
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');

        Route::resource('departements', 'DepartementController');
        Route::resource('employees', 'EmployeeController');


        Route::resource('careers', 'CareerController');
        Route::get('careers-applications', 'CareerController@getCareersApplications');

    });
});

//////////// clearing cach and cache config///////
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    return 'DONE'; //Return anything
});


Route::group(['middleware'=>['web','localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],'prefix' => LaravelLocalization::setLocale() ],function(){
    Auth::routes();
});


