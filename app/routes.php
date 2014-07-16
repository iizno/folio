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

Route::get('/', function() {
    return "Public";
});

// Administration :: Chocolat 

Route::get('login', function(){
    return View::make('admin.login');
});

Route::post('login', function() {
     if(Auth::attempt(Input::only('username', 'password'))) {
        return Redirect::to('/chocolat/projects/');
     } else {
        return Redirect::back()
            ->withInput()
            ->with('error', "Mot de passe / User faux.");
     }
});

Route::group(array('before'=>'auth'), function() {

    Route::get('/chocolat/', function() {
        return "Admin";
    });

    Route::get('logout', function(){
        Auth::logout();
        return Redirect::to('login')->with('message', 'Vous n\'êtes plus connecté.');
    });


    // Projects

    Route::get('chocolat/project/create', function() {
        $project = new Project;
        return View::make('admin.projects.edit')
            ->with('project', $project)
            ->with('method', 'post');
    });

    Route::get('/chocolat/project/{project}/edit', function(Project $project) {
        return View::make('admin.projects.edit')
            ->with('project', $project)
            ->with('method', 'put');
    });

    Route::get('/chocolat/project/{project}/delete', function(Project $project) {
        return View::make('admin.projects.edit')
            ->with('project', $project)
            ->with('method', 'delete');
    });

    Route::get('/chocolat/projects/', function() 
    {    
        $projects = Project::all();
        return View::make('admin.projects.index')
            ->with('projects', $projects);
    });

    Route::get('/chocolat/projects/categories/{name}', function($name){
         $category = Category::whereName($name)->with('projects')->first();
         return View::make('admin.projects.index')
           ->with('category', $category)
           ->with('projects', $category->projects);
    });

    Route::get('/chocolat/project/{project}', function(Project $project) {
        return View::make('admin.projects.single')
            ->with('project', $project);
    });

    Route::post('/chocolat/projects', function(){
        $project = Project::create(Input::all());
        return Redirect::to('/chocolat/project/' . $project->id)
            ->with('message', 'Nouveau projet créé !');
    });

    Route::put('/chocolat/project/{project}', function(Project $project) {
        $project->update(Input::all());
        return Redirect::to('/chocolat/project/' . $project->id)
            ->with('message', 'Projet mis à jour !');
    });

    Route::delete('/chocolat/project/{project}', function(Project $project) {
        $project->delete();
        return Redirect::to('/chocolat/projects')
            ->with('message', 'Projet supprimé !');
    });

    Route::get('/about', function() {
        return View::make('about')->with('numberOfProjects', 10);
    });

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
