<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 20/01/18
 * Time: 05:43 PM
 */

namespace Shopping;


class Module
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}