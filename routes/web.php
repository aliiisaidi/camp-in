<?php

Route::get('404', function(){
    return abort(404);
});

Route::group(['middleware' => 'check_guest'], function () {
    Route::get('/', 'HomeController@viewHome');
    Route::get('404', 'HomeController@notFound');
    Route::post('inscription', 'HomeController@inscription');
    Route::get('confirmation_email/{key}', 'HomeController@emailConfirmation');
    Route::post('connexion', 'HomeController@connexion');
});

Route::get('logout', 'HomeController@logout');

Route::group(['middleware' => 'check_user'], function () {
    Route::get('favoris', 'NavigationController@viewFavoris');
    Route::get('camping/{public_key}', 'NavigationController@viewSingleCamping');
    Route::get('api/favoris', 'NavigationController@getCampingsFavoris');
    Route::group(['prefix' => 'navigation'], function () {
        Route::get('/', 'NavigationController@viewIndex');
        Route::get('api/campings', 'NavigationController@getCampings');
        Route::get('api/likes_camping_ids', 'NavigationController@getLikesCampingIds');
        Route::post('like_camping', 'NavigationController@likeCamping');
        Route::post('hate_camping', 'NavigationController@hateCamping');
    });
});

Route::group(['middleware' => 'check_admin'], function () {
    Route::get('api/campings', 'AdminController@getCampings');
    Route::get('api/all-campings', 'AdminController@getAllCampings');
    Route::get('api/camping/{key}', 'AdminController@getCampingByKey');
    Route::get('api/users', 'AdminController@getUsers');
    Route::get('api/classement', 'AdminController@getClassement');
    Route::get('api/categories', 'AdminController@getCategories');
    Route::get('api/inscriptions', 'AdminController@getInscriptions');
    Route::get('admin/api/favoris', 'AdminController@getCampingsFavoris');
    Route::group(['prefix' => 'administration'], function () {
        Route::get('/', 'AdminController@viewIndex');
        Route::post('editPassword', 'AdminController@editPassword');
        Route::get('gestion', 'AdminController@editProfile');
        Route::get('camping/{public_key}', 'AdminController@viewSingleCamping');
        Route::get('ajout', 'AdminController@viewAjout');
        Route::post('json-file', 'AdminController@uploadFile');
        Route::post('ajout-camping', 'AdminController@ajoutCamping');
        Route::get('campings-consultation', 'AdminController@viewConsultation');
        Route::get('campings-modification', 'AdminController@viewModification');
        Route::post('edit-camping', 'AdminController@editCamping');
        Route::post('delete-camping', 'AdminController@deleteCamping');
        Route::get('clients', 'AdminController@viewClients');
        Route::post('delete-user', 'AdminController@deleteUser');
        Route::post('delete-photo', 'AdminController@deletePhoto');

        Route::get('statistiques/classement', 'AdminController@viewClassement');
        Route::get('statistiques/categories', 'AdminController@viewCategories');
        Route::get('statistiques/inscriptions', 'AdminController@viewInscriptions');
        Route::get('statistiques/favoris', 'AdminController@viewFavoris');

        Route::get('la-carte', 'AdminController@viewCarte');
    });
});