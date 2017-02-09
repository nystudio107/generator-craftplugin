<?php
/**
 * <%- pluginName %> plugin for Craft CMS 3.x
 *
 * <%- pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%- copyrightNotice %>
 */

namespace <%= pluginVendorName %>\<%= pluginDirName %>\records;

use <%= pluginVendorName %>\<%= pluginDirName%>\<%= pluginHandle %>;

use Craft;
use craft\db\ActiveRecord;

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
/**
 * <%= recordName[index] %> Record
 *
 * Active record models (or “records”) are like models, except with a
 * database-facing layer built on top. On top of all the things that models
 * can do, records can:
 *
 * - Define database table schemas
 * - Represent rows in the database
 * - Find, alter, and delete rows
 *
 * Note: Records’ ability to modify the database means that they should never
 * be used to transport data throughout the system. Their instances should be
 * contained to services only, so that services remain the one and only place
 * where system state changes ever occur.
 *
 * When a plugin is installed, Craft will look for any records provided by the
 * plugin, and automatically create the database tables for them.
 *
 * https://craftcms.com/docs/plugins/records
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
class <%= recordName[index] %> extends ActiveRecord
{
    // Public Methods
    // =========================================================================

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Returns the name of the database table the model is associated with (sans
     * table prefix). By convention, tables created by plugins should be prefixed
     * with the plugin name and an underscore.
     *
     * @return string
     *
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    public function getTableName()
    {
        return '{{%<%= pluginDirName %>_<%= recordName[index].toLowerCase() %>}}';
    }
}
