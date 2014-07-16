<?php

class Category extends Eloquent 
{
    public $timestamps = false;

    public function projects()
    {
        return $this->hasMany('Project');
    }
}
