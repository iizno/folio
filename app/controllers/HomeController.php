<?php

class HomeController extends BaseController {

    public function showIndex($activeSection = "none")
    {
        View::share('activeSection', $activeSection);
        return View::make('index');
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
