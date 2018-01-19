<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 18/01/18
 * Time: 08:50 PM
 */

namespace Product\Controller\Factory;


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

            //$dataMapper->getConnection()->setMongo(new MongoClient("mongodb://shell:root@localhost:27017"));

            return new $controllerName($dataMapper);
        }
        catch (Exception $exception) {
            throw $exception;
        }
    }
}