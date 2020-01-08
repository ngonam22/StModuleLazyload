<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2020-01-08
 * Time: 11:05
 */

namespace StModuleLazyload\ModuleAuthorizer;

//use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\ServiceManager;

class AuthorizerManager extends ServiceManager
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