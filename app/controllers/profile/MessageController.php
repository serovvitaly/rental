<?php

class Profile_MessageController extends Profile_BaseController {

    public function getIndex()
    {
        return 'ffff';
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
            'title'   => array('required', 'min:3'),
            'content' => array('required', 'min:10')
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
            
            $message->to()->sync($input['to']);
            
            foreach ($input['to'] AS $to_user_id) {
                if (is_numeric($to_user_id) AND $to_user_id > 0) {
                    //$output['sql'] = $message->add_to($to_user_id);
                }
            }
            
            //$this->_USER->messages_outbox()->save($message);
        }
        $output['success'] = false;
        return json_encode($output);
    }

}