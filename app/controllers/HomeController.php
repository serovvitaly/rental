<?php

class HomeController extends BaseController {

	protected $layout = 'base.layout';

	public function getIndex()
	{
		$this->layout->content = 300;
	}

}