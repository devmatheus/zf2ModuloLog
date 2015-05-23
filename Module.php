<?php

namespace Log;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php'
            )
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Log\Service\Log' => function($service) {
                    return new Service\Log($service->get('Doctrine\ORM\EntityManager'));
                },
                'Log\Formatter\Acao' => function() {
                    return new Formatter\Acao;
                }
            )
        );
    }
}
