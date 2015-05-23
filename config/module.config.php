<?php

return array(
    'entities' => array(
        'Log\Entity\Log' => 'Log\Entity\Log'
    ),
    'router' => array(
        'routes' => array(
            'admin-log' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/log/:action[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'action' => '[a-zA-Z0-9_-]+'
                    ),
                    'defaults' => array(
                        'controller' => 'admin/log',
                        'action' => 'index'
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'admin/log' => 'Log\Controller\IndexController'
        )
    ),
    'doctrine' => array(
        'driver' => array(
            'Log_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Log/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Log\Entity' => 'Log_driver'
                )
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'module_layouts' => array(
        'Log' => 'layout/admin'
    ),
    'navigation' => array(
        'default' => array(
            'configuracoes' => array(
                'pages' => array(
                    'usuarios' => array(
                        'pages' => array(
                            'admin-log' => array(
                                'label' => 'Log de atividades',
                                'route' => 'admin-log',
                                'action' => 'index'
                            )
                        )
                    )
                )
            )
        )
    )
);
