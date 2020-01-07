<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2020-01-07
 * Time: 14:52
 */

namespace StModuleLazyload\Config;


class Config
{

    protected $listeners = [];


    public function __construct($options = null)
    {
        if (!empty($options) && is_array($options))
            $this->initFromArray($options);
    }

    /**
     * @param array $options
     */
    public function initFromArray(array $options)
    {
        foreach ($options as $moduleName => $condition) {
            $moduleName = strtolower($moduleName);

            // add a placeholder to $listeners
            if (empty($this->listeners[$moduleName]))
                $this->listeners[$moduleName] = [];

            $this->listeners[$moduleName] = array_merge($this->listeners[$moduleName], $condition);
        }
    }

    /**
     * @param string|null $moduleName
     * @return array
     */
    public function getListenersModule(string $moduleName = null)
    {
        if (empty($moduleName))
            return $this->listeners;

        return $this->listeners[$moduleName] ?: [];
    }
}