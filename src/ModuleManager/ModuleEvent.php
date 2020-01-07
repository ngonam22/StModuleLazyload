<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2020-01-06
 * Time: 17:01
 */

namespace StModuleLazyload\ModuleManager;

use Zend\ModuleManager\ModuleEvent as BaseModuleEvent;

class ModuleEvent extends BaseModuleEvent
{
    /**
     * Validate the module if it should be in the module initial list
     */
    CONST EVENT_LOAD_MODULE_AUTH  = 'loadModuleAuth';

    /**
     * This event will be triggered to load the list of events,
     * then loop through it to validate based on given conditions
     */
    CONST EVENT_LOAD_MODULES_AUTH = 'loadModulesAuth';
}