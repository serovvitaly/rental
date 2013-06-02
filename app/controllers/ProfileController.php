<?php

class ProfileController extends BaseController {

    protected $layout = 'base.layout.profile';
    
    public function getIndex()
    {
        $this->layout->profile_title = 'serovvitaly@gmail.com';
        
        $this->layout->content = 'PROFILE';
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