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

}