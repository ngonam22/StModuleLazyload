<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2020-01-08
 * Time: 10:39
 */

namespace StModuleLazyload\ModuleAuthorizer;



abstract class AbstractModuleAuthorizer
{
    /**
     * @var array
     */
    protected $config;



    /**
     * @return bool
     */
    abstract public function authorize(): bool;

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config): void
    {
        $this->config = $config;
    }
}