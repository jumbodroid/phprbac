<?php

namespace Jumbodroid\PhpRbac;

use Jumbodroid\PhpRbac\Contracts\Rbac as ContractsRbac;
use PhpRbac\Rbac as PhpRbacRbac;
use \Jf;

class Rbac extends PhpRbacRbac implements ContractsRbac
{
    static $rbac = null;

    private function __construct($unit_test = '')
    {
        $config = new Config();
        $host = $config->get('host');
        $user = $config->get('user');
        $pass = $config->get('pass');
        $dbname = $config->get('dbname');
        $adapter = $config->get('adapter');
        $tablePrefix = $config->get('tablePrefix');

        require_once dirname(__DIR__, 3).'/owasp/phprbac/PhpRbac/src/PhpRbac/core/lib/Jf.php';

        $this->Permissions = Jf::$Rbac->Permissions;
        $this->Roles = Jf::$Rbac->Roles;
        $this->Users = Jf::$Rbac->Users;
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
