<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2020-01-08
 * Time: 10:53
 */

namespace StModuleLazyload\ModuleAuthorizer;


class UrlAuthorizer extends AbstractModuleAuthorizer
{
    public function authorize(): bool
    {
        if (isset($this->config['regex'])) {
            return preg_match('(^' . $this->config['regex'] . '$)', @$_SERVER['REQUEST_URI']);
        }

        return false;
    }
}