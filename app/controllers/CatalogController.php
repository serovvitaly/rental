<?php

class CatalogController extends BaseController {

    protected $layout = 'base.catalog.list';
    
    public function getIndex()
    {
        $this->layout->profile_title = 'Личный прорфиль';
        
        $this->layout->content = '<div class="component">PROFILE</div>';
    }
    
    
    public function postGet()
    {
        $output['success'] = true;
        
        $output['result'] = Collection::all()->toArray();
        
        return json_encode($output);
    }

}