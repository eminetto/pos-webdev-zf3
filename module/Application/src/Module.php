<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

class Module
{
    const VERSION = '3.0.0dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap($e)
    {
        $eventManager = $e->getApplication()->getServiceManager()->get('EventManager');
        $eventManager->getSharedManager()->attach(
            'Zend\Mvc\Controller\AbstractActionController',
            \Zend\Mvc\MvcEvent::EVENT_DISPATCH,
            [$this, 'mvcPreDispatch'], 
            100
        );

    }

    public function mvcPreDispatch($event)
    {
        $routeMatch = $event->getRouteMatch();
        $moduleName = $routeMatch->getParam('module');
        $controllerName = $routeMatch->getParam('controller');
        $actionName = $routeMatch->getParam('action');
        if ($controllerName == 'Application\Controller\BeerController' && $actionName == 'delete') {
            $authService = $event->getApplication()->getServiceManager()->get('Application\Service\Auth');
            if (! $authService->isAuthorized()) {
                $redirect = $event->getTarget()->redirect();
                $redirect->toUrl('/');
            }
        }

    }

}
