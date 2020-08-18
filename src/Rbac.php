<?php

namespace Jumbodroid\PhpRbac;

use Jumbodroid\PhpRbac\Contracts\Rbac as ContractsRbac;
use PhpRbac\Rbac as PhpRbacRbac;

class Rbac extends PhpRbacRbac implements ContractsRbac
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
