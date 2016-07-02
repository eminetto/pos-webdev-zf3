<?php

namespace Application\Factory\Service;

use Interop\Container\ContainerInterface;

class Auth
{
    public function __invoke(ContainerInterface $container)
    {
        $adapter = $container->get('Application\Factory\Db\Adapter\Adapter');
        $request = $container->get('Request');

        return new \Application\Service\Auth($request, $adapter);
    }
}
