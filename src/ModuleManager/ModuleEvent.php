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
    CONST EVENT_LOAD_MODULE_AUTH = 'loadModuleAuth';
    CONST EVENT_LOAD_MODULES_AUTH = 'loadModulesAuth';
}