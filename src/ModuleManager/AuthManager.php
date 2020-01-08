<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2020-01-07
 * Time: 14:50
 */

namespace StModuleLazyload\ModuleManager;

use \StModuleLazyload\Config\Config;
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

    public function authorize(Event $e)
    {
        $moduleName = strtolower($e->getParam('moduleName'));
        $authorizers = $this->config->getListenersModule($moduleName);


        return true;
    }

    public function getAuthorizerManager()
    {
        if (empty($this->authorizerManager))
            $this->authorizerManager = new AuthorizerManager();

        return $this->authorizerManager;
    }
}