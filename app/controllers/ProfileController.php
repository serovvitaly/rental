<?php

class ProfileController extends BaseController {

    protected $layout = 'base.layout.profile';
    
    public function __construct()
    {
        $this->beforeFilter('auth');
    }
    
    public function getIndex()
    {
        $this->layout->profile_title = 'Личный прорфиль';
        
        $this->layout->content = '<div class="component">PROFILE</div>';
    }
    
    
    public function getHello()
    {
        $this->layout->content = 'PROFILE-HELLO';
    }
    
    public function getHelloFoo()
    {
        $this->layout->content = 'PROFILE-HELLO-FOO';
    }

}