<?php

class AuthController extends BaseController {

    protected $layout = 'base.component.auth';
    
    public function getIndex()
    {
        $this->layout->profile_title = 'Авторизация';
        
        $this->layout->content = '<div class="component">Авторизация</div>';
    }
    
    
    public function postAauthorisation()
    {
        $this->layout->profile_title = 'Авторизация';
        
        $this->layout->content = '<div class="component">Авторизация</div>';
    }

}