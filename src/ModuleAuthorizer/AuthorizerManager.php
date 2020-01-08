<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2020-01-08
 * Time: 11:05
 */

namespace StModuleLazyload\ModuleAuthorizer;

use Zend\ServiceManager\AbstractPluginManager;

class AuthorizerManager extends AbstractPluginManager
{
    protected $invokableClasses = [
        'url' => UrlAuthorizer::class
    ];

    public function __construct()
    {
        parent::__construct();

        $this->configure([
            'invokables' => $this->invokableClasses
        ]);
    }
}