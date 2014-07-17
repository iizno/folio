<?php

class Screenshot extends \Eloquent {
	protected $fillable = ['name'];

    public function projects() 
    {
        return $this->belongsToMany('Project')->withTimestamps();    
    }
}