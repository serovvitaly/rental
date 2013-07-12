<?php

class Profile_MessageController extends Profile_BaseController {

    public function getIndex()
    {
        return 'ffff';
    }
    
     
    /**
    * Возвращает список входящих сообщений
    * 
    */
    public function postInbox()
    {
        $page = Input::get('page', 1);
        
        $messages = $this->_USER->messages_inbox()->where('is_removed', '!=', 1);
        
        $total = $messages->count();
        
        $messages = $messages->get();
        
        $rows = array();
        if (count($messages) > 0) {
            foreach ($messages AS $message) {
                $rows[] = array(
                    'id'      => $message->id,
                    'names'   => $message->from()->full_name(),
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
            'rows'  => $rows,
            'total' => '1-30 из ' . $total
        );
        
        return json_encode($out);
    }
    
    
    /**
    * Возвращает список исходящих сообщений
    * 
    */
    public function postOutbox()
    {
        $page = Input::get('page', 1);
        
        $messages = $this->_USER->messages_outbox()->where('is_removed', '!=', 1);
        
        $total = $messages->count();
        
        $messages = $messages->get();
        
        $rows = array();
        if (count($messages) > 0) {
            foreach ($messages AS $message) {
                $rows[] = array(
                    'id'      => $message->id,
                    'names'   => '<i class="grey">Кому:</i> ' . implode(', ', $message->to_as_array()),
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
            'rows'  => $rows,
            'total' => '1-30 из ' . $total
        );
        
        return json_encode($out);
    }
    
    
    /**
    * Возвращает список избранных сообщений
    * 
    */
    public function postFavorit()
    {
        
        
        $out['success'] = true;
        $out['result']  = array(
            'rows' => $this->_USER->messages_inbox()->where('is_favorite', '=', 1)->where('is_removed', '!=', 1)->get()->toArray()
        );
        
        return json_encode($out);
    }
    
    
    /**
    * Возвращает список контактов
    * 
    */
    public function postContacts()
    {
        $out['success'] = true;
        $out['result']  = array(
            'rows' => $this->_USER->contacts()
        );
        
        return json_encode($out);
    }

    
    
    public function postSend()
    {
        $input = Input::all();
        
        $_swap = array(
            'title' => '',
            'content' => ''
        );
        
        $validator = Validator::make($input, array(
            'to'      => array('required'),
            'title'   => array('required', 'min:2'),
            'content' => array('required')
        ), array(
            'required' => 'Вы забыли заполнить :attribute.'
        ));
        
        $output['success'] = !$validator->fails();
        $output['errors']  = $validator->errors()->all();
        $output['input']  = $input;
        
        if (!$validator->fails()) {
            
            $message = new Message();
            
            $message->title   = $input['title'];
            $message->content = $input['content'];
            
            $this->_USER->messages_outbox()->save($message);
            
            $message->to()->sync($input['to']);            
            
        }
        
        return json_encode($output);
    }

}