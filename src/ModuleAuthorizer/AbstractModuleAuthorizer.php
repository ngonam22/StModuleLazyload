<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2020-01-08
 * Time: 10:39
 */

namespace StModuleLazyload\ModuleAuthorizer;


use StModuleLazyload\Config\Config;

abstract class AbstractModuleAuthorizer
{
    /**
     * @var Config
     */
    protected $config;



    /**
     * @return bool
     */
    abstract public function authorize(): bool;

    /**
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * @param Config $config
     */
    public function setConfig(Config $config): void
    {
        $this->config = $config;
    }
}