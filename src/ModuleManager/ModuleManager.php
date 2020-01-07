<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2020-01-06
 * Time: 16:52
 */

namespace StModuleLazyload\ModuleManager;

use Zend\ModuleManager\ModuleManager as BaseModuleManager;
use StModuleLazyload\Config\Config;

class ModuleManager extends BaseModuleManager
{
    /**
     * @var Config
     */
    protected $config;


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
            $auth = $this->loadModuleAuth($moduleName);
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

    /**
     * Get auth to load a specific module by name.
     *
     * @param string $moduleName
     * @triggers loadModule.resolve
     * @triggers loadModule
     * @return mixed Module's Module class
     */
    public function loadModuleAuth($moduleName)
    {
        $event = $this->getEvent();
        $event->setModuleName($moduleName);

        $result = $this->getEventManager()->trigger(ModuleEvent::EVENT_LOAD_MODULE_AUTH, $this, $event);

        if(!$result->last()) {
            return false;
        }

        return true;
    }

    /**
     * @param Config $config
     */
    public function setConfig(Config $config)
    {
        $this->config = $config;
    }
}