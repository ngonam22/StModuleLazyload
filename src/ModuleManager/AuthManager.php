<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2020-01-07
 * Time: 14:50
 */

namespace StModuleLazyload\ModuleManager;

use \StModuleLazyload\Config\Config;
use StModuleLazyload\ModuleAuthorizer\AbstractModuleAuthorizer;
use StModuleLazyload\ModuleAuthorizer\AuthorizerManager;
use Zend\EventManager\Event;

class AuthManager
{
    /**
     * @var \StModuleLazyload\Config\Config
     */
    protected $config;

    /**
     * @var AuthorizerManager
     */
    protected $authorizerManager;

    public function __construct($config)
    {
        if ($config instanceof Config)
            $this->config = $config;
        else
            $this->config = new Config($config);
    }

    /**
     * Authorize the module in lazy load list
     *
     * @param Event $e
     * @return bool
     * @throws \Exception
     */
    public function authorize(Event $e): bool
    {
        $moduleName = strtolower($e->getParam('moduleName'));
        $authorizerConfigs = $this->config->getListenersModule($moduleName);

        foreach ($authorizerConfigs as $authorizerName => $authorizerConfig) {

            $authorizer = $this->loadAuthorizer($authorizerName);
            $authorizer->setConfig($authorizerConfig);

            // break the list if it fails any authorizer
            if (!$authorizer->authorize())
                return false;
        }

        return true;
    }

    /**
     * @param string $name
     * @param array  $options
     * @return AbstractModuleAuthorizer
     * @throws \Exception
     */
    public function loadAuthorizer(string $name)
    {
        if (!$this->getAuthorizerManager()->has($name))
            throw new \Exception('Authorizer instance is not fully loaded or not found');

        $authorizer = $this->getAuthorizerManager()->get($name);

        if ($authorizer instanceof AbstractModuleAuthorizer)
            return $authorizer;

        throw new \Exception('Authorize instance must extend AbstractModuleAuthorizer');
    }

    public function getAuthorizerManager()
    {
        if (empty($this->authorizerManager))
            $this->authorizerManager = new AuthorizerManager();

        return $this->authorizerManager;
    }
}