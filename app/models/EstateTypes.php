<?php


class EstateTypes extends Eloquent {

    protected $table = 'estate_types';
    
    
    public static function items()
    {
        return EstateTypes::get()->toArray();
    }
    

}