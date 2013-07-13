<?php


class Estate extends Eloquent {

    public function user()
    {
        return $this->belongsTo('User');
    }
    
    public function owner()
    {
        return $this->user();
    }
    

}