<?php
namespace Core\Factory\Controller;

use Core\Controller;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class IndexControllerFactory
 * @package Core\Factory\Controller
 */
class IndexControllerFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocatorInterface
     * @return Controller\IndexController
     */
    public function createService(ServiceLocatorInterface $serviceLocatorInterface)
    {
        return new Controller\IndexController();
    }
}
