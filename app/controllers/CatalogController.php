<?php

class CatalogController extends BaseController {

    protected $layout = 'base.layout.column1';
    
    public function getIndex()
    {
        $this->layout->profile_title = 'Личный прорфиль';
        
        $this->layout->content = View::make('base.catalog.list');
    }
    
    
    public function getAdd()
    {        
        $this->layout->content = View::make('base.catalog.add');
    }
    
    
    public function postGet()
    {
        $output['success'] = true;
        
        $output['result'] = Collection::all()->toArray();
        
        return json_encode($output);
    }

}