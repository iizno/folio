<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::model('project', 'Project');

// Public

Route::get('/projects/{activeCategory?}', 'HomeController@showCategory');
Route::get('/contact', 'HomeController@showContact');
Route::get('/about', 'HomeController@showAbout');
Route::get('/services', 'HomeController@showServices');
Route::get('/', 'HomeController@showIndex');

// Login 

Route::get('login', 'HomeController@showLogin');
Route::post('login', 'HomeController@doLogin');

// Administration :: Chocolat 

Route::group(array('before'=>'auth'), function() {

    Route::get('/chocolat/', 'HomeController@showAdminIndex');
    Route::get('logout', 'HomeController@doLogout');

    // Projects

    Route::get('/chocolat/projects/', 'ProjectController@index');
    
    Route::get('/chocolat/project/create', 'ProjectController@create');
    Route::post('/chocolat/projects', 'ProjectController@createPost');
    
    Route::get('/chocolat/project/{id}/edit', 'ProjectController@edit');
    
    Route::get('/chocolat/project/{project}', 'ProjectController@show');
    Route::put('/chocolat/project/{project}', 'ProjectController@editPut');
    Route::delete('/chocolat/project/{project}', 'ProjectController@deletePost');

    Route::get('/chocolat/project/{project}/delete', 'ProjectController@delete');

    // Projects / Categories

    Route::get('/chocolat/projects/categories/{name}', 'ProjectController@showByCategory');

    // View Composer

    View::composer('admin.projects.edit', function($view) {
        $categories = Category::all();
        if (count($categories) > 0) {
            $categoriesOptions = array_combine($categories->lists('id'),
                $categories->lists('name'));
        } else {
            $categoriesOptions = array(null, 'Aucune');
        }
        $view->with('categoriesOptions', $categoriesOptions);
    });
});
