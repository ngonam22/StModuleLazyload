<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2020-01-07
 * Time: 14:37
 */

namespace StModuleLazyload\ModuleManager;

use Zend\EventManager\EventManagerInterface;
use Zend\ModuleManager\Listener\DefaultListenerAggregate;

class AuthListenerAggregate extends DefaultListenerAggregate
{
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $options           = $this->getOptions();
        $lazyLoadingConfig = $options->getLazyLoading();
        $authManager       = new AuthManager($lazyLoadingConfig);

        $this->listeners[] = $events->attach(
            ModuleEvent::EVENT_LOAD_MODULE_AUTH,
            [$authManager, 'authorize']
        );
        return parent::attach($events, $priority);
    }

}