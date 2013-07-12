<?php


class Message extends Eloquent {

    protected $table = 'pf_messages';
    
    
    public function from()
    {
        return $this->belongsTo('User', 'user_id')->first();
    }
    
    
    public function to()
    {
        return $this->belongsToMany('User', 'pf_messages_users');
    }
    
    
    public function to_as_array()
    {
        $to_users = $this->to()->get();
        
        $mix = array();
        if (count($to_users) > 0) {
            foreach ($to_users AS $user) {
                /*$mix[] = array(
                    'id' => $user->id,
                    'name' => $user->full_name()
                );*/  
                
                $mix[] = $user->full_name();
            }
        }
        
        return $mix;
    }

}