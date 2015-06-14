<?php

namespace Rest;

return array(
    'router' => array(
    		
        'routes' => array(

        	// rota para server rest
        	'server-rest' => array(
        		'type' => 'Segment',
        		'options' => array(
        			'route' => '/server-rest[.:format][/:id]',
        			'constraints' => array(
        				'format' => '(xml|json)',
        			),
        			'defaults' => array(
        				'controller' => 'Rest\Controller\Server',
        				'format' => 'json',
        			),
        		),
			),
        		
           // rota para client rest
           'client-rest' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/client-rest[/:id].:format',
                    'constraints' => array(
                        'id'           => '\w+',
                        'format'    => '(xml|json)',
                    ),
                    'defaults' => array(
                        'controller' => 'Rest\Controller\ClientRest',
                        'format' => 'json',
                    ),
                ),
           ),
        ),
    ),

   // controllers habilitados
   'controllers' => array(
        'invokables' => array(
            'Rest\Controller\Server'      => 'Rest\Controller\ServerController',
            'Rest\Controller\ClientRest'  => 'Rest\Controller\ClientController',
        ),
   ),

    // layout
    'view_manager' => array(
        'strategies' => array(
           'ViewJsonStrategy',
        ),
    ),
    
);
