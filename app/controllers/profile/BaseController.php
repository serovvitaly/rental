<?php

class Profile_BaseController extends BaseController {

    protected $layout = 'base.layout.profile';
    
    protected $_USER  = NULL;
    
    public function __construct()
    {
        $this->beforeFilter('auth');
        
        $this->_USER = Auth::user();
    }
    
    public function getIndex()
    {
        $this->layout->profile_title = 'Личный прорфиль';
        
        $this->layout->content = '<div class="component"></div>';
    }
    
    
    public function postMsinbox()
    {
        $outbox = $this->_USER->messages_inbox()->where('is_removed', '!=', 1)->get();
        
        $rows = array();
        if (count($outbox) > 0) {
            foreach ($outbox AS $message) {
                $rows[] = array(
                    'id'      => $message->id,
                    'from'    => $message->from()->full_name(),
                    'title'   => $message->title,
                    'content' => $message->content,
                    'created' => $message->created_at,
                    'updated' => $message->updated_at,
                    'reading' => $message->reading_at,
                    'parent'  => $message->parent_id,
                );
            }
        }
        
        $out['success'] = true;
        $out['result']  = array(
            'rows' => $rows
        );
        
        return json_encode($out);
    }
    
    
    /**
    * Возвращает список исходящих сообщений
    * 
    */
    public function postMsoutbox()
    {
        $outbox = $this->_USER->messages_outbox()->where('is_removed', '!=', 1)->get();
        
        $rows = array();
        if (count($outbox) > 0) {
            foreach ($outbox AS $message) {
                $rows[] = array(
                    'id'      => $message->id,
                    'to'      => implode(', ', $message->to_as_array()),
                    'title'   => $message->title,
                    'content' => $message->content,
                    'created' => $message->created_at,
                    'updated' => $message->updated_at,
                    'reading' => $message->reading_at,
                    'parent'  => $message->parent_id,
                );
            }
        }
        
        $out['success'] = true;
        $out['result']  = array(
            'rows' => $rows
        );
        
        return json_encode($out);
    }
    
    
    public function postMsfavorit()
    {
        
        
        $out['success'] = true;
        $out['result']  = array(
            'rows' => $this->_USER->messages_inbox()->where('is_favorite', '=', 1)->where('is_removed', '!=', 1)->get()->toArray()
        );
        
        return json_encode($out);
    }
    
    
    public function postMscontacts()
    {
        $out['success'] = true;
        $out['result']  = array(
            'rows' => $this->_USER->contacts()
        );
        
        return json_encode($out);
    }

}