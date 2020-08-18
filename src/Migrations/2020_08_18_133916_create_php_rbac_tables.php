<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePhpRbacTables extends Migration
{
    private $rbacTablePrefix = 'rbac_';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = $this->rbacTablePrefix;
        $this->upRolesTable($prefix);
        $this->upPermissionsTable($prefix);
        $this->upRolePermissionsTable($prefix);
        $this->upUserRolesTable($prefix);
        $this->initRbacTables($prefix);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $prefix = $this->rbacTablePrefix;
        $this->downUserRolesTable($prefix);
        $this->downRolePermissionsTable($prefix);
        $this->downPermissionsTable($prefix);
        $this->downRolesTable($prefix);
    }

    private function initRbacTables($prefix)
    {
        DB::table($prefix.'permissions')->insert([
            [
                'ID'            => 1,
                'Lft'           => 0,
                'Rght'          => 1,
                'Title'         => 'root',
                'Description'   => 'root',
            ],
        ]);

        DB::table($prefix.'rolepermissions')->insert([
            [
                'RoleID'        => 1,
                'PermissionID'  => 1,
                'AssignmentDate'=> time(),
            ],
        ]);

        DB::table($prefix.'roles')->insert([
            [
                'ID'        => 1,
                'Lft'       => 0,
                'Rght'      => 1,
                'Title'     => 'root',
                'Description' => 'root',
            ],
        ]);

        DB::table($prefix.'userroles')->insert([
            [
                'UserID'        => 1,
                'RoleID'        => 1,
                'AssignmentDate' => time(),
            ],
        ]);
    }

    private function upRolesTable($prefix)
    {
        Schema::create($prefix.'roles', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_bin';

            $table->increments('ID');
            $table->integer('Lft')->nullable(false);
            $table->integer('Rght')->nullable(false);
            $table->string('Title', 128)->nullable(false)->unique();
            $table->text('Description')->nullable(false);

            $table->index('Title');
            $table->index('Lft');
            $table->index('Rght');
        });
    }

    private function downRolesTable($prefix)
    {
        Schema::dropIfExists($prefix.'roles');
    }

    private function upPermissionsTable($prefix)
    {
        Schema::create($prefix.'permissions', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_bin';

            $table->increments('ID');
            $table->integer('Lft')->nullable(false);
            $table->integer('Rght')->nullable(false);
            $table->char('Title', 64)->nullable(false)->unique();
            $table->text('Description')->nullable(false);

            $table->index('Title');
            $table->index('Lft');
            $table->index('Rght');
        });
    }

    private function downPermissionsTable($prefix)
    {
        Schema::dropIfExists($prefix.'permissions');
    }

    private function upRolePermissionsTable($prefix)
    {
        Schema::create($prefix.'rolepermissions', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_bin';

            $table->integer('RoleID')->nullable(false);
            $table->integer('PermissionID')->nullable(false);
            $table->integer('AssignmentDate')->nullable(false);

            $table->primary(['RoleID', 'PermissionID']);
        });
    }

    private function downRolePermissionsTable($prefix)
    {
        Schema::dropIfExists($prefix.'rolepermissions');
    }

    private function upUserRolesTable($prefix)
    {
        Schema::create($prefix.'userroles', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_bin';

            $table->integer('UserID')->nullable(false);
            $table->integer('RoleID')->nullable(false);
            $table->integer('AssignmentDate')->nullable(false);

            $table->primary(['UserID', 'RoleID']);
        });
    }

    private function downUserRolesTable($prefix)
    {
        Schema::dropIfExists($prefix.'userroles');
    }
}
