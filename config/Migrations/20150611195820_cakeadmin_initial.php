<?php
/**
 * CakeManager (http://cakemanager.org)
 * Copyright (c) http://cakemanager.org
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) http://cakemanager.org
 * @link          http://cakemanager.org CakeManager Project
 * @since         1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Phinx\Migration\AbstractMigration;

class CakeadminInitial extends AbstractMigration
{

    public function up()
    {
        if ($this->hasTable('users')) {
            $table = $this->table('users');
            if (!$table->hasColumn('cakeadmin')) {
                $table
                    ->addColumn('cakeadmin', 'integer', [
                        'default' => 0,
                        'limit' => 11,
                        'null' => true,
                    ])
                    ->save();
            }
            if (!$table->hasColumn('request_key')) {
                $table
                    ->addColumn('request_key', 'string', [
                        'default' => null,
                        'limit' => 255,
                        'null' => true,
                    ])
                    ->save();
            }
        } else {
            $table = $this->table('users');
            $table
                ->addColumn('email', 'string', [
                    'default' => null,
                    'limit' => 50,
                    'null' => true,
                ])
                ->addColumn('password', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => true,
                ])
                ->addColumn('cakeadmin', 'integer', [
                    'default' => 0,
                    'limit' => 11,
                    'null' => true,
                ])
                ->addColumn('request_key', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => true,
                ])
                ->addColumn('created', 'datetime')
                ->addColumn('modified', 'datetime')
                ->create();
        }
    }
}
