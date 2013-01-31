<?php

namespace Media;

use Media\Model\MediaTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Media\Model\Media;

class Module {
	public function getAutoloaderConfig() {
		return array (
				'Zend\Loader\ClassMapAutoloader' => array (
						__DIR__ . '/autoload_classmap.php' 
				),
				'Zend\Loader\StandardAutoloader' => array (
						'namespaces' => array (
								__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__ 
						) 
				) 
		);
	}
	
	
	public function getConfig() {
		return include __DIR__ . '/config/module.config.php';
	}
	
	
	public function getServiceConfig() {
		return array (
				'factories' => array (
						'Media\Model\MediaTable' => function ($sm) {
							$tableGateway = $sm->get ( 'MediaTableGateway' );
							$table = new MediaTable($tableGateway);
							return $table;
						},
						'MediaTableGateway' => function ($sm) {
							$dbAdapter = $sm->get ( 'Zend\Db\Adapter\Adapter' );
							$resultSetPrototype = new ResultSet ();
							$resultSetPrototype->setArrayObjectPrototype ( new Media () );
							return new TableGateway ( 'article', $dbAdapter, null, $resultSetPrototype );
						} 
				) 
		);
	}
}
