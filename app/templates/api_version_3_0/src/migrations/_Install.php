<?php
/**
 * <%= pluginName %> plugin for Craft CMS 3.x
 *
 * <%= pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%= copyrightNotice %>
 */

namespace <%= pluginVendorName %>\<%= pluginDirName %>\migrations;

use Craft;
use craft\db\Connection;
use craft\db\Migration;
use craft\services\Config;

/**
 * <%= pluginName %> Install Migration
 *
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
 * If your plugin needs to create any custom database tables when it gets installed,
 * create a migrations/ folder within your plugin folder, and save an Install.php file
 * within it using the following template:
 *
 * If you need to perform any additional actions on install/uninstall, override the
 * safeUp() and safeDown() methods.
 *
<% } -%>
 * @author    <%= pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */
class Install extends Migration
{
    // Properties
    // =========================================================================

    /**
     * @var string The database driver to use
     */
    public $driver;

    // Public Methods
    // =========================================================================

    /**
     * @return bool
     *
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->driver = Craft::$app->getConfig()->get('driver', Config::CATEGORY_DB);
        $this->createTables();
        $this->createIndexes();
        $this->addForeignKeys();
        $this->insertDefaultData();

        return true;
    }

    /**
     * @return bool
     *
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->driver = Craft::$app->getConfig()->get('driver', Config::CATEGORY_DB);
        $this->removeIndexes();
        $this->removeTables();
        return true;
    }

    // Protected Methods
    // =========================================================================

    /**
     * Creates the tables.
     *
     * @return void
     */
    protected function createTables()
    {
<% var records = recordName -%>
<% if ((typeof(records[0]) !== 'undefined') && (records[0] !== "")) { -%>
<% records.forEach(function(record, index, array){ -%>
        $this->createTable('{{%<%= pluginDirName %>_<%= record.toLowerCase() %>}}', [
            'id' => $this->primaryKey(),
            'some_field' => $this->string(255)->notNull()->defaultValue(''),
        ]);

<% }); -%>
<% } -%>
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Creates the indexes.
     *
<% } -%>
     * @return void
     */
    protected function createIndexes()
    {
<% var records = recordName -%>
<% if ((typeof(records[0]) !== 'undefined') && (records[0] !== "")) { -%>
<% records.forEach(function(record, index, array){ -%>
        $this->createIndex($this->db->getIndexName('{{%<%= pluginDirName %>_<%= record.toLowerCase() %>}}', 'some_field', true), '{{%<%= pluginDirName %>_<%= record.toLowerCase() %>}}', 'some_field', true);

        // Additional commands depending on the db driver
        switch ($this->driver) {
            case Connection::DRIVER_MYSQL:
                break;
            case Connection::DRIVER_PGSQL:
                break;
        }

<% }); -%>
<% } -%>
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Adds the foreign keys.
     *
<% } -%>
     * @return void
     */
    protected function addForeignKeys()
    {
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Populates the DB with the default data.
     *
<% } -%>
     * @return void
     */
    protected function insertDefaultData()
    {
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Removes the tables.
     *
<% } -%>
     * @return void
     */
    protected function removeTables()
    {
<% var records = recordName -%>
<% if ((typeof(records[0]) !== 'undefined') && (records[0] !== "")) { -%>
<% records.forEach(function(record, index, array){ -%>
        $this->dropTable('{{%<%= pluginDirName %>_<%= record.toLowerCase() %>}}');

<% }); -%>
<% } -%>
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Creates the indexes.
     *
<% } -%>
     * @return void
     */
    protected function removeIndexes()
    {
<% var records = recordName -%>
<% if ((typeof(records[0]) !== 'undefined') && (records[0] !== "")) { -%>
<% records.forEach(function(record, index, array){ -%>
        $this->dropIndex($this->db->getIndexName('{{%<%= pluginDirName %>_<%= record.toLowerCase() %>}}', 'some_field', true), '{{%<%= pluginDirName %>_<%= record.toLowerCase() %>}}');

<% }); -%>
<% } -%>

    }

}