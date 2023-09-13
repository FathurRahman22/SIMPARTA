<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Tag
    Route::apiResource('tags', 'TagApiController');

    // Review
    Route::post('reviews/media', 'ReviewApiController@storeMedia')->name('reviews.storeMedia');
    Route::apiResource('reviews', 'ReviewApiController');

    // Fasilitas
    Route::post('fasilitasWisatas/media', 'FasilitasWisataApiController@storeMedia')->name('fasilitasWisatas.storeMedia');
    Route::apiResource('fasilitasWisatas', 'FasilitasWisataApiController');

    // Agenda
    Route::post('agendas/media', 'AgendaApiController@storeMedia')->name('agendas.storeMedia');
    Route::apiResource('agendas', 'AgendaApiController');

    // Data Lain
     Route::post('data-lains/media', 'DataLainApiController@storeMedia')->name('data-lains.storeMedia');
     Route::apiResource('data-lains', 'DataLainApiController');

   // Event
    Route::post('dataprofils/media', 'DataprofilApiController@storeMedia')->name('dataprofils.storeMedia');
    Route::apiResource('dataprofils', 'DataprofilApiController');

    // Data Kunjungan
    Route::apiResource('data-kunjungans', 'DataKunjunganApiController');
});

Route::group(['namespace' => 'Api\V1'], function () {
    // Submission Link
    Route::post('/link/submit', "KunjunganController@submit");

    // Paket
    Route::get('/paket', "PaketController@getAll");
    Route::get('/paket/{id}', "PaketController@getOneById");
    Route::get('/paket/kode/{kode_paket}', "PaketController@getOneByKode");

    // Event
    Route::get('/dataprofil', "DataprofilController@getAll");
    Route::get('/dataprofil/{id}', "DataprofilController@getOneById");

    // Ticket
    Route::post('/tickets/order', "TicketController@store");
    Route::get('/tickets', "TicketController@getAll");
});
