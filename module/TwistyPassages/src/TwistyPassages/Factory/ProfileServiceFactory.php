<?php

/**
 * ProfileService Factory.
 * Factory for the ProfileService.
 * @version 1.0
 * @author gevrik gevrik@totalmadownage.com
 * @copyright TMO
 */

namespace TwistyPassages\Factory;

use TwistyPassages\Service\ProfileService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProfileServiceFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ProfileService(
            $serviceLocator->get('Doctrine\ORM\EntityManager')
        );
    }

}
