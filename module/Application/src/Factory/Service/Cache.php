<?php

namespace Application\Factory\Service;

use Interop\Container\ContainerInterface;
use Zend\Cache\StorageFactory;

class Cache
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('Config');
        return StorageFactory::factory($config['cache']);
    }
}
