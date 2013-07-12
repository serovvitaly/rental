<?php


class Message extends Eloquent {

    protected $table = 'pf_messages';
    
    
    public function from()
    {
        return $this->belongsTo('User', 'user_id')->first();
    }
    
    
    public function to()
    {
        return $this->belongsToMany('User', 'pf_messages_users', 'user_id', 'message_id');
    }
    
    
    /**
    * Добавляет получателя данноего сообщения
    * 
    * @param mixed $receiver_id
    */
    public function add_to($receiver_id)
    {
        $user = User::find($receiver_id);
        
        if ($user AND $user->id > 0) {
            $this->to()->save($user, array('message_id' => $this->id));
        }        
        
        return $this;
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