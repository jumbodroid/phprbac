<?php

namespace Jumbodroid\PhpRbac;

use PhpRbac\Rbac as PhpRbacRbac;

final class Rbac extends PhpRbacRbac
{
    static $rbac = null;

    private function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if(self::$rbac == null)
        {
            self::$rbac = new static();
        }

        return self::$rbac;
    }
}
