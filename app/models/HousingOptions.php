<?php


class HousingOptions extends Eloquent {

    protected $table = 'housing_options';
    
    protected static $_options = NULL;
    
    public static function items($offset = 0, $length = 0)
    {
        if (!static::$_options) {
            static::$_options = HousingOptions::get()->toArray();
        }
        
        if ($length < 1) {
            $length = count(static::$_options);
        } else {
            $length += $offset;
        }
        
        $output = array();
        
        for ($i = $offset; $i < $length; $i++) {
            if (isset(static::$_options[$i])) {
                $output[] = static::$_options[$i];
            }
            else break;
        }
        
        return $output; 
    }
    

}