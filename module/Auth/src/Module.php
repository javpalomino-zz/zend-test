<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 18/01/18
 * Time: 12:34 AM
 */

namespace Auth;


class Module
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}