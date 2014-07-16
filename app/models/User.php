<?php

use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface 
{
    public function getAuthIdentifier() 
    {
        return $this->getKey();
    }

    public function getAuthPassword() 
    {
        return $this->password;
    }
    
    public function projects()
    {
        return $this->hasMany('Project');
    }
    
    public function owns(Project $project)
    {
        return $this->id == $project->owner;
    }
    
    public function canEdit(Cat $project)
    {
        return $this->is_admin or $this->owns($project);
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
