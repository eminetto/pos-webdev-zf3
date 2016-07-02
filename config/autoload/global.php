<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'service_manager' => [
        'factories' => [
            Application\Factory\Db\Adapter\Adapter::class => Application\Factory\Db\Adapter\Adapter::class,
            Application\Model\Beer\TableGateway::class =>  Application\Factory\Model\Beer\TableGateway::class,
        ],
    ],
    'db' => [
        'driver' => 'Pdo_Sqlite',
        'database' => 'beers.db',
    ],
];
