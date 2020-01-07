<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2020-01-07
 * Time: 14:34
 */

namespace StModuleLazyload\ModuleManager;

use Zend\ModuleManager\Listener\ListenerOptions as BaseListener;

class ListenerOptions extends BaseListener
{
    /**
     * Array of modules will be loaded with conditions
     *
     * @var array
     */
    protected $lazyLoading = [];

    /**
     * @return array
     */
    public function getLazyLoading(): array
    {
        return $this->lazyLoading;
    }

    /**
     * @param array $lazyLoading
     */
    public function setLazyLoading(array $lazyLoading): void
    {
        $this->lazyLoading = $lazyLoading;
    }
}