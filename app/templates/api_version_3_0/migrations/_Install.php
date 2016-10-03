<?php

namespace craft\plugins\<%= pluginDirName %>\migrations;

use craft\app\db\Migration;

/**
 * If your plugin needs to create any custom database tables when it gets installed,
 * create a migrations/ folder within your plugin folder, and save an Install.php file
 * within it using the following template:
 *
 * See craft/app/db/Migration.php for a full explanation of what you can put
 * within that defineSchema() method. You can also check out craft/app/migrations/Install.php
 * for plenty of examples.
 *
 * If you need to perform any additional actions on install/uninstall, override the
 * safeUp() and safeDown() methods.
 */
class Install extends Migration
{
    protected function defineSchema()
    {
        return [
            '{{%tableName}}' => [
                'columns' => [
                    'column1' => 'int',
                    'column2' => 'string(50)',
                    // ...
                ],
            ],
            // ...
        ];
    }
}