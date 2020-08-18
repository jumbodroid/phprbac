<?php

namespace Jumbodroid\PhpRbac;

use Jumbodroid\PhpRbac\Contracts\Rbac as ContractsRbac;
use PhpRbac\Rbac as PhpRbacRbac;
use \Jf;
use Illuminate\Database\Connector\ConnectionFactory;

class Rbac extends PhpRbacRbac implements ContractsRbac
{
    static $rbac = null;

    private function __construct($unit_test = '')
    {
        // if ((string) $unit_test === 'unit_test') {
        //     require_once dirname(dirname(__DIR__)) . '/tests/database/database.config';
        // } else {
        //     require_once dirname(dirname(__DIR__)) . '/database/database.config';
        // }

        $con = new ConnectionFactory();
        exit(var_dump($con));

        // $host="localhost";
        // $user="root";
        // $pass="";
        // $dbname="phprbac";
        // $adapter="pdo_mysql";
        // $tablePrefix = "rbac_";

        require_once dirname(__DIR__, 3).'/owasp/phprbac/PhpRbac/core/lib/Jf.php';

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
