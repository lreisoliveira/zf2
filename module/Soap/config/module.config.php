<?php

namespace Soap;

return array(
		
    'router' => array(
        'routes' => array(

            // rota para server soap
            'server-soap' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/server-soap/index',
                	//'route' => '/server-soap[.:format][/:id]',
                    'constraints' => array(
                        'format' => '(json)',
                    ),
                    'defaults' => array(
                        'controller' => 'Soap\Controller\Server',
                        'action'     => 'index',
                    ),
                ),
            ),
        		
			// rota para client soap zend
        	'client-soap-zend' => array(
        		'type' => 'Segment',
        		'options' => array(
        			//'route' => '/client-soap[/:id].:format',
        			'route' => '/client-soap/usando-zend-client',
        			'constraints' => array(
        				'id'        => '\d+',
        				'format'    => '(xml|json)',
        			),
        			'defaults' => array(
        				'controller' => 'Soap\Controller\Client',
        				'action' => 'index',
        			),
				),
        	),
        		
        	// rota para client soap nativo
        	'client-soap-nativo' => array(
        			'type' => 'Segment',
        			'options' => array(
        					//'route' => '/client-soap[/:id].:format',
        					'route' => '/client-soap/usando-soap-client',
        					'constraints' => array(
        							'id'        => '\d+',
        							'format'    => '(xml|json)',
        					),
        					'defaults' => array(
        							'controller' => 'Soap\Controller\Client',
        							'action' => 'nativo',
        					),
        			),
        	),
        		
        	
        ),
    ),

   // controllers habilitados
   'controllers' => array(
        'invokables' => array(
            'Soap\Controller\Server'     => 'Soap\Controller\ServerController',
            'Soap\Controller\Client'     => 'Soap\Controller\ClientController'
        ),
   ),

    // layout
    'view_manager' => array(
        'strategies' => array(
           'ViewJsonStrategy',
        ),
    ),
);
