<?php

class HomeController extends BaseController {

    public function showIndex()
    {
        View::share('activeSection', "none");
        return View::make('index');
    }

    public function showServices()
    {
        View::share('activeSection', "services");
        return View::make('index');
    }

    public function showAbout()
    {
        View::share('activeSection', "about");
        return View::make('index');
    }

    public function showContact()
    {
        View::share('activeSection', "contact");
        return View::make('index');
    }

    public function showCategory($activeCategory = "none")
    {
        $projects = Project::all();
        View::share('activeSection', $activeCategory);
        return View::make('category')->with('projects', $projects);
    }

    public function showLogin()
    {
        return View::make('admin.login');
    }

    public function showAdminIndex()
    {
        return "Admin index";
    }

    public function doLogin()
    {
        if(Auth::attempt(Input::only('username', 'password'))) {
            return Redirect::to('/chocolat/projects/');
        } else {
            return Redirect::back()
                ->withInput()
                ->with('error', "Mot de passe / User faux.");
        }
    }

    public function doLogout()
    {
        Auth::logout();
        return Redirect::to('login')->with('message', 'Vous n\'êtes plus connecté.');
    }
}
