<?php


class Estate extends Eloquent {

    protected $fillable = array('_token', 'title', 'introtext', 'estate_type', 'housing_options', 'building_type', 'bathroom_type', 'full_rules');
    
    public function user()
    {
        return $this->belongsTo('User');
    }
    
    public function owner()
    {
        return $this->user();
    }
    

}