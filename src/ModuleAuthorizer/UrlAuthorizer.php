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
        return true;
    }
}