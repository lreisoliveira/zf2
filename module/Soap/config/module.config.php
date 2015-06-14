<?php

namespace Soap;

return array(
		
    'router' => array(
        'routes' => array(

            // rota para server soap
            'server-soap' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/server-soap/',
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
        		
			// rota para client soap
        	'client-soap' => array(
        		'type' => 'Segment',
        		'options' => array(
        			//'route' => '/client-soap[/:id].:format',
        			'route' => '/client-soap/',
        			'constraints' => array(
        				'id'           => '\d+',
        				'format'    => '(xml|json)',
        			),
        			'defaults' => array(
        				'controller' => 'Soap\Controller\Client',
        				'action' => 'index',
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
