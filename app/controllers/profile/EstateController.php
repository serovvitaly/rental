<?php

class Profile_EstateController extends Profile_BaseController {
    
    
    public function postList()
    {
        $output['success'] = true;
        
        $output['result']  = array(
            'rows' => $this->_USER->estates()->get()->toArray()
        );
        
        return json_encode($output);
    }  
    
    
    /**
    * Возвращает черновики
    * 
    */
    public function postRoughs()
    {
        $output['success'] = true;
        
        $output['result']  = array(
            'rows' => $this->_USER->estates()->where('is_rough', '=', 1)->get()->toArray()
        );
        
        return json_encode($output);
    }  
    
    
    public function postSave()
    {
        $input = Input::all();
        
        $validator = Validator::make($input, array(
            //'to'      => array('required'),
            '_token' => array('required', 'numeric', 'min:14')
        ));
        
        
        $output['success'] = !$validator->fails();
        $output['errors']  = $validator->errors()->all();
        
        if (!$validator->fails()) {
            
            $_id    = (isset($input['_id'])    AND is_numeric($input['_id']))    ? (int) $input['_id'] : 0;
            $_token = $input['_token'];
            
            $estate = $this->_USER->estates()->where('_token', '=', $_token)->first();
            
            $output['_token'] = $_token;
            $output['sudo'] = $estate;
            //return json_encode($output);
            if (!$estate) {
                $estate = new Estate();
                $estate->_token = $_token;
            }
            
            // создаем битовую маску для опций недвижимости
            if (isset($input['housing_options']) AND count($input['housing_options']) > 0) {
                $_housing_options = 0;
                foreach ($input['housing_options'] AS $_option) {
                    $_housing_options += $_option;
                }
                $input['housing_options'] = $_housing_options;
            }
            
            $estate->fill($input); 
            
            $this->_USER->estates()->save($estate);        
            
        }
        
        return json_encode($output);
    }

}