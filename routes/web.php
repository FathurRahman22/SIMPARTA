<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/welcome', function () {
        return view('welcome');
    });
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Tag
    Route::delete('tags/destroy', 'TagController@massDestroy')->name('tags.massDestroy');
    Route::resource('tags', 'TagController');

    // Review
    Route::delete('reviews/destroy', 'ReviewController@massDestroy')->name('reviews.massDestroy');
    Route::post('reviews/media', 'ReviewController@storeMedia')->name('reviews.storeMedia');
    Route::post('reviews/ckmedia', 'ReviewController@storeCKEditorImages')->name('reviews.storeCKEditorImages');
    Route::resource('reviews', 'ReviewController');

    // fasilitasWisata
    Route::delete('fasilitasWisatas/destroy', 'FasilitasWisataController@massDestroy')->name('fasilitasWisatas.massDestroy');
    Route::post('fasilitasWisatas/media', 'FasilitasWisataController@storeMedia')->name('fasilitasWisatas.storeMedia');
    Route::post('fasilitasWisatas/ckmedia', 'FasilitasWisataController@storeCKEditorImages')->name('fasilitasWisatas.storeCKEditorImages');
    Route::resource('fasilitasWisatas', 'FasilitasWisataController');
    // Agenda
    Route::delete('agendas/destroy', 'AgendaController@massDestroy')->name('agendas.massDestroy');
    Route::post('agendas/media', 'AgendaController@storeMedia')->name('agendas.storeMedia');
    Route::post('agendas/ckmedia', 'AgendaController@storeCKEditorImages')->name('agendas.storeCKEditorImages');
    Route::resource('agendas', 'AgendaController');

    // Data Lain
    Route::delete('data-lains/destroy', 'DataLainController@massDestroy')->name('data-lains.massDestroy');
    Route::post('data-lains/media', 'DataLainController@storeMedia')->name('data-lains.storeMedia');
    Route::post('data-lains/ckmedia', 'DataLainController@storeCKEditorImages')->name('data-lains.storeCKEditorImages');
    Route::resource('data-lains', 'DataLainController');


    // Event
    Route::delete('dataprofils/destroy', 'DataprofilController@massDestroy')->name('dataprofils.massDestroy');
    Route::post('dataprofils/media', 'DataprofilController@storeMedia')->name('dataprofils.storeMedia');
    Route::post('dataprofils/ckmedia', 'DataprofilController@storeCKEditorImages')->name('dataprofils.storeCKEditorImages');
    Route::resource('dataprofils', 'DataprofilController');

    // Paket
    Route::delete('pakets/destroy', 'PaketController@massDestroy')->name('pakets.massDestroy');
    Route::post('pakets/media', 'PaketController@storeMedia')->name('pakets.storeMedia');
    Route::post('pakets/ckmedia', 'PaketController@storeCKEditorImages')->name('pakets.storeCKEditorImages');
    Route::resource('pakets', 'PaketController');

    // Data Kunjungan
    Route::delete('data-kunjungans/destroy', 'DataKunjunganController@massDestroy')->name('data-kunjungans.massDestroy');
    Route::resource('data-kunjungans', 'DataKunjunganController');
    Route::post('data-kunjungans/filter', 'DataKunjunganController@filter')->name('data-kunjungans.filter');
    


    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
