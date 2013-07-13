<?php

class Profile_AnnouncementController extends Profile_BaseController {
    
    public function postList()
    {
        $output['success'] = true;
        
        $output['result']  = $this->_USER->announcements()->get()->toArray();
        
        return json_encode($output);
    }    
    
      
    public function postSave()
    {
        $input = Input::all();
        
        $validator = Validator::make($input, array(
            //'to'      => array('required'),
            //'title'   => array('required', 'min:2'),
            //'content' => array('required')
        ));
        
        
        $output['success'] = !$validator->fails();
        $output['errors']  = $validator->errors()->all();
        
        if (!$validator->fails()) {
            
            //           
            
        }
        
        return json_encode($output);
    }  
    
    
      
    public function postEdit()
    {
        $input = Input::all();
        
        $validator = Validator::make($input, array(
            //'to'      => array('required'),
            //'title'   => array('required', 'min:2'),
            //'content' => array('required')
        ));
        
        
        $output['success'] = !$validator->fails();
        $output['errors']  = $validator->errors()->all();
        
        if (!$validator->fails()) {
            
            //           
            
        }
        
        return json_encode($output);
    }

}