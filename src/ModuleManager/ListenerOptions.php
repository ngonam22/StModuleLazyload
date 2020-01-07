<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2020-01-07
 * Time: 14:34
 */

namespace StModuleLazyload\ModuleManager;

use StModuleLazyload\Config\Config;
use Zend\ModuleManager\Listener\ListenerOptions as BaseListener;

class ListenerOptions extends BaseListener
{
    /**
     * @var
     */
    protected $lazyLoading;

    /**
     * @return mixed
     */
    public function getLazyLoading()
    {
        return $this->lazyLoading;
    }

    /**
     * @param $lazyLoading
     * @throws \Exception
     */
    public function setLazyLoading($lazyLoading): void
    {
        if (!is_array($lazyLoading))
            throw new \Exception('Lazy Loading config must be array');

        $this->lazyLoading = new Config($lazyLoading);
    }
}