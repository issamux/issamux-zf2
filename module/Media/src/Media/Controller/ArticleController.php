<?php

namespace Media\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ArticleController extends AbstractActionController {
	
	// default action
	public function indexAction() {
		return new ViewModel ();
	}
	 
}
