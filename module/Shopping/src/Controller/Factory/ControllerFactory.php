<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 20/01/18
 * Time: 08:23 PM
 */

namespace Shopping\Controller\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use PHPUnit\Runner\Exception;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

use MongoClient;

class ControllerFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $controllerName, array $options = null)
    {
        try {
            $dataMapper = $container->get('doctrine.documentmanager.odm_default');
            return new $controllerName($dataMapper);
        }
        catch (Exception $exception) {
            throw $exception;
        }
    }
}