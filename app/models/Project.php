<?php

class Project extends Eloquent 
{    
    protected $fillable = array('name','category_id');
    
    public function category() 
    {
        return $this->belongsTo('Category');
    }
}