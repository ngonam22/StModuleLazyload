<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2020-01-06
 * Time: 16:52
 */

namespace StModuleLazyload\ModuleManager;

use Zend\ModuleManager\ModuleManager as BaseModuleManager;

class ModuleManager extends BaseModuleManager
{
    public function loadModules()
    {
        $this->getEventManager()->trigger(ModuleEvent::EVENT_LOAD_MODULES_AUTH, $this, $this->getEvent());
        return parent::loadModules();
    }

    protected function attachDefaultListeners($events)
    {
        $events = $this->getEventManager();
        $events->attach(ModuleEvent::EVENT_LOAD_MODULES_AUTH, [$this, 'onLoadModulesAuth']);
        parent::attachDefaultListeners($events);
    }

    public function onLoadModulesAuth()
    {
        if (true === $this->modulesAreLoaded) {
            return $this;
        }

        $modules = array();
        foreach ($this->getModules() as $moduleName) {
            if ($moduleName == 'Admin')
                continue;

            $modules[] = $moduleName;
        }
        //        foreach ($this->getModules() as $moduleName) {
        //            $auth = $this->loadModuleAuth($moduleName);
        //            if($auth) {
        //                $modules[] = $moduleName;
        //            }
        //        }

        //        dd($modules);
        $this->setModules($modules);
    }
}