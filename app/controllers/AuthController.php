<?php

class AuthController extends BaseController {

    protected $layout = 'base.component.auth';
    
    protected $_rules = array(
        'email'    => array('required', 'email'),
        'password' => array('required', 'min:3'),
    );
    
    public function getIndex()
    {
        $this->layout->profile_title = 'Авторизация';
        
        $this->layout->content = '<div class="component">Авторизация</div>';
    }
    
    
    /**
    * Разлогинивание
    * 
    */
    public function getLogout()
    {
        Auth::logout();
    }
    
    
    /**
    * Выполняет авторизацию пользователя
    * 
    */
    public function postAuthorisation()
    {
        $input = Input::all();
        
        $validator = Validator::make($input, $this->_rules);
        
        $output['success'] = !$validator->fails();
        $output['errors']  = $validator->errors()->all();
        
        if (!$validator->fails()) {
            if (Auth::attempt($input)) {
                //
            } else {
                $output['success'] = false;
                $output['errors'][] = 'Неверный логин или пароль';
            }
        }
        
        return json_encode($output);
    }
    
    
    /**
    * Выполняет регистрацию пользователя
    * 
    */
    public function postRegistration()
    {
        $input = Input::all();
        
        $this->_rules['email'][]    = 'unique:users';
        $this->_rules['password'][] = 'confirmed';
        
        $validator = Validator::make($input, $this->_rules);
        
        $output['success'] = !$validator->fails();
        $output['errors']  = $validator->errors()->all();
        
        if (!$validator->fails()) {
            $user = new User;
            
            $user->email    = $input['email'];
            $user->password = Hash::make($input['password']);
            
            if ( $user->save() ) {
                if ( $user->sendConfirmEmail() ) {
                    //
                } else {
                    //
                }
            } else {
                //
            }
        }
        
        return json_encode($output);
    }

}