<?php


class BuildingTypes extends Eloquent {

    protected $table = 'building_types';
    
    
    public static function items()
    {
        return BuildingTypes::get()->toArray();
    }
    

}