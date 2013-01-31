<?php

namespace Media\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use  Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Iterator;




class IndexController extends AbstractActionController {
	
	protected $mediaTable;
	
	// default action
	public function indexAction() {
		$vm = new ViewModel ();
		$vm->setVariable( 'medias',$this->getMediaTable()->fetchAll() );
		$vm->setVariable('paginator', $this->preparePaginator());
		return $vm;
	}
 
	public function getMediaTable()
	{
		if (!$this->mediaTable) {
			$sm = $this->getServiceLocator();
			$this->mediaTable = $sm->get('Media\Model\MediaTable');
		}
		return $this->mediaTable;
	}
	
	private function preparePaginator(){
		$iteratorAdapter = new  Iterator($this->getMediaTable()->fetchAll());
		$paginator = new Paginator($iteratorAdapter);
		$paginator->setCurrentPageNumber($this->params()->fromRoute('page'));
		$paginator->setItemCountPerPage(5);		
		return $paginator;
	}
}
