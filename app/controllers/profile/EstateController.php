<?php

class Profile_EstateController extends Profile_BaseController {
    
    
    public function postList()
    {
        $output['success'] = true;
        
        $output['result']  = $this->_USER->estates()->get()->toArray();
        
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
        
        // создаем битовую маску для опций недвижимости
        $_housing_options = 0;
        if (isset($input['housing_options']) AND count($input['housing_options']) > 0) {
            foreach ($input['housing_options'] AS $_option) {
                $_housing_options += $_option;
            }
        }
        
        
        $output['success'] = !$validator->fails();
        $output['errors']  = $validator->errors()->all();
        
        if (!$validator->fails()) {
            
            //           
            
        }
        
        return json_encode($output);
    }

}