<?php

return array (
		/*
		 * define controllers
		 */
		'controllers' => array (
				'invokables' => array (
						'Media\Controller\Media' => 'Media\Controller\IndexController',
						'Media\Controller\Video' => 'Media\Controller\VideoController',
						'Media\Controller\Audio' => 'Media\Controller\AudioController',
						'Media\Controller\Article' => 'Media\Controller\ArticleController' 
				) 
		),
		/*
		 * define routes
		 */
		'router' => array (
				'routes' => array (
						'media' => array (
								'type' => 'Literal',
								'options' => array (
										'route' => '/media',
										'defaults' => array (
												'controller' => 'Media\Controller\Media',
												'action' => 'index' 
										) 
								),
								'may_terminate' => true,
								'child_routes' => array (
										'video' => array (
												'type' => 'Segment',
												'options' => array (
														'route' => '/video[/:id]',
														'constraints' => array (
																'id' => '[0-9]+' 
														),
														'defaults' => array (
																'controller' => 'Media\Controller\Video',
																'action' => 'index' 
														) 
												) 
										),
										'audio' => array (
												'type' => 'Segment',
												'options' => array (
														'route' => '/audio[/:id]',
														'constraints' => array (
																'id' => '[0-9]+' 
														),
														'defaults' => array (
																'controller' => 'Media\Controller\Audio',
																'action' => 'index' 
														) 
												) 
										),
										'article' => array (
												'type' => 'Segment',
												'options' => array (
														'route' => '/article[/:id]',
														'constraints' => array (
																'id' => '[0-9]+' 
														),
														'defaults' => array (
																'controller' => 'Media\Controller\Article',
																'action' => 'index' 
														) 
												) 
										),
										'paginator' => array (
												'type' => 'segment',
												'options' => array (
														'route' => '/page/[:page]',
														'defaults' => array (
																'page' => 1 
														) 
												) 
										) 
								) 
						) 
				) 
		)
		,
		/*
		 * define view
		 */
		'view_manager' => array (
				'template_path_stack' => array (
						'media' => __DIR__ . '/../view' 
				) 
		) 
);
