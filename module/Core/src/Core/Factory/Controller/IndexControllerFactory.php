<?php
namespace Core\Factory\Controller;

use Core\Controller;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocatorInterface)
    {
        return new Controller\IndexController();
    }
}