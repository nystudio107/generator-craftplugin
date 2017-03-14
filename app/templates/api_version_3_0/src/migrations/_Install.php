<?php
/**
 * <%- pluginName %> plugin for Craft CMS 3.x
 *
 * <%- pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%- copyrightNotice %>
 */

namespace <%= pluginVendorName %>\<%= pluginDirName %>\migrations;

use <%= pluginVendorName %>\<%= pluginDirName%>\<%= pluginHandle %>;

use Craft;
use craft\db\Connection;
use craft\db\Migration;
use craft\services\Config;

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
/**
 * <%- pluginName %> Install Migration
 *
 * If your plugin needs to create any custom database tables when it gets installed,
 * create a migrations/ folder within your plugin folder, and save an Install.php file
 * within it using the following template:
 *
 * If you need to perform any additional actions on install/uninstall, override the
 * safeUp() and safeDown() methods.
 *
 * @author    <%- pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */
<% } else { -%>
/**
 * @author    <%- pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */
<% } -%>
class Install extends Migration
{
    // Public Properties
    // =========================================================================

    /**
     * @var string The database driver to use
     */
    public $driver;

    // Public Methods
    // =========================================================================

 <% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
   /**
     * This method contains the logic to be executed when applying this migration.
     * This method differs from [[up()]] in that the DB logic implemented here will
     * be enclosed within a DB transaction.
     * Child classes may implement this method instead of [[up()]] if the DB logic
     * needs to be within a transaction.
     *
     * @return boolean return a false value to indicate the migration fails
     * and should not proceed further. All other return values mean the migration succeeds.
     */
<% } else { -%>
   /**
     * @inheritdoc
     */
<% } -%>
    public function safeUp()
    {
        $this->driver = Craft::$app->getConfig()->get('driver', Config::CATEGORY_DB);
        $this->createTables();
        $this->createIndexes();
        $this->addForeignKeys();
        $this->insertDefaultData();

        return true;
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * This method contains the logic to be executed when removing this migration.
     * This method differs from [[down()]] in that the DB logic implemented here will
     * be enclosed within a DB transaction.
     * Child classes may implement this method instead of [[down()]] if the DB logic
     * needs to be within a transaction.
     *
     * @return boolean return a false value to indicate the migration fails
     * and should not proceed further. All other return values mean the migration succeeds.
     */
<% } else { -%>
   /**
     * @inheritdoc
     */
<% } -%>
    public function safeDown()
    {
        $this->driver = Craft::$app->getConfig()->get('driver', Config::CATEGORY_DB);
        $this->removeIndexes();
        $this->removeTables();
        return true;
    }

    // Protected Methods
    // =========================================================================

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Creates the tables needed for the Records used by the plugin
     *
     * @return void
     */
<% } else { -%>
    /**
     * @return void
     */
<% } -%>
    protected function createTables()
    {
<% var records = recordName -%>
<% if ((typeof(records[0]) !== 'undefined') && (records[0] !== "")) { -%>
<% records.forEach(function(record, index, array){ -%>
<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    // {{%<%= pluginDirName %>_<%= record.toLowerCase() %>}} table
<% } else { -%>
<% } -%>
        $this->createTable(
            '{{%<%= pluginDirName %>_<%= record.toLowerCase() %>}}',
            [
                'id' => $this->primaryKey(),
                'dateCreated' => $this->dateTime()->notNull(),
                'dateUpdated' => $this->dateTime()->notNull(),
                'uid' => $this->uid(),
<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
                // Custom columns in the table
<% } else { -%>
<% } -%>
                'siteId' => $this->integer()->notNull(),
                'some_field' => $this->string(255)->notNull()->defaultValue(''),
            ]
        );
<% if (index !== array.length - 1) { -%>

<% }; -%>
<% }); -%>
<% } -%>
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Creates the indexes needed for the Records used by the plugin
     *
     * @return void
     */
<% } else { -%>
    /**
     * @return void
     */
<% } -%>
    protected function createIndexes()
    {
<% var records = recordName -%>
<% if ((typeof(records[0]) !== 'undefined') && (records[0] !== "")) { -%>
<% records.forEach(function(record, index, array){ -%>
<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    // {{%<%= pluginDirName %>_<%= record.toLowerCase() %>}} table
<% } else { -%>
<% } -%>
        $this->createIndex(
            $this->db->getIndexName(
                '{{%<%= pluginDirName %>_<%= record.toLowerCase() %>}}',
                'some_field',
                true
            ),
            '{{%<%= pluginDirName %>_<%= record.toLowerCase() %>}}',
            'some_field',
            true
        );
        // Additional commands depending on the db driver
        switch ($this->driver) {
            case Connection::DRIVER_MYSQL:
                break;
            case Connection::DRIVER_PGSQL:
                break;
        }
<% if (index !== array.length - 1) { -%>

<% }; -%>
<% }); -%>
<% } -%>
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Creates the foreign keys needed for the Records used by the plugin
     *
     * @return void
     */
<% } else { -%>
    /**
     * @return void
     */
<% } -%>
    protected function addForeignKeys()
    {
<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    // {{%<%= pluginDirName %>_<%= record.toLowerCase() %>}} table
<% } else { -%>
<% } -%>
        $this->addForeignKey(
            $this->db->getForeignKeyName('{{%<%= pluginDirName %>_<%= record.toLowerCase() %>}}', 'siteId'),
            '{{%<%= pluginDirName %>_<%= record.toLowerCase() %>}}',
            'siteId',
            '{{%sites}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Populates the DB with the default data.
     *
     * @return void
     */
<% } else { -%>
    /**
     * @return void
     */
<% } -%>
    protected function insertDefaultData()
    {
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Removes the tables needed for the Records used by the plugin
     *
     * @return void
     */
<% } else { -%>
    /**
     * @return void
     */
<% } -%>
    protected function removeTables()
    {
<% var records = recordName -%>
<% if ((typeof(records[0]) !== 'undefined') && (records[0] !== "")) { -%>
<% records.forEach(function(record, index, array){ -%>
<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    // {{%<%= pluginDirName %>_<%= record.toLowerCase() %>}} table
<% } else { -%>
<% } -%>
        $this->dropTable('{{%<%= pluginDirName %>_<%= record.toLowerCase() %>}}');
<% if (index !== array.length - 1) { -%>

<% }; -%>
<% }); -%>
<% } -%>
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Removes the indexes needed for the Records used by the plugin
     *
     * @return void
     */
<% } else { -%>
    /**
     * @return void
     */
<% } -%>
    protected function removeIndexes()
    {
<% var records = recordName -%>
<% if ((typeof(records[0]) !== 'undefined') && (records[0] !== "")) { -%>
<% records.forEach(function(record, index, array){ -%>
<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    // {{%<%= pluginDirName %>_<%= record.toLowerCase() %>}} table
<% } else { -%>
<% } -%>
        $this->dropIndex($this->db->getIndexName('{{%<%= pluginDirName %>_<%= record.toLowerCase() %>}}', 'some_field', true), '{{%<%= pluginDirName %>_<%= record.toLowerCase() %>}}');
<% if (index !== array.length - 1) { -%>

<% }; -%>
<% }); -%>
<% } -%>
    }
}
