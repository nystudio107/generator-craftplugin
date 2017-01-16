<?php
/**
 * <%= pluginName %> plugin for Craft CMS 3.x
 *
 * <%= pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%= copyrightNotice %>
 */

namespace <%= pluginVendorName %>\<%= pluginDirName %>\commands;

use <%= pluginVendorName %>\<%= pluginDirName%>\<%= pluginHandle %>;

use Craft;
use yii\console\Controller;
use yii\helpers\Console;

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
/**
 * <%= consolecommandName[index] %> Command
 *
 * Craft can be invoked via commandline console by using the `./craft` command
 * from the project root.
 *
 * Console Commands are just controllers that are invoked to handle console
 * actions. The segment routing is plugin/controller-name/action-name
 *
 * The actionIndex() method is what is executed if no sub-commands are supplied, e.g.:
 *
 * ./craft <%= pluginDirName %>/<%= consolecommandName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>
 *
 * Actions must be in 'kebab-case' so actionDoSomething() maps to 'do-something',
 * and would be invoked via:
 *
 * ./craft <%= pluginDirName %>/<%= consolecommandName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>/do-something
 *
 * @author    <%= pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */
<% } else { -%>
/**
 * <%= consolecommandName[index] %> Command
 *
 * @author    <%= pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */
<% } -%>
class <%= consolecommandName[index] %>Controller extends Controller
{
    // Public Methods
    // =========================================================================

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Handle <%= pluginDirName %>/<%= consolecommandName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %> console commands
     *
     * @return mixed
     */
<% } else { -%>
    /**
     * Handle <%= pluginDirName %>/<%= consolecommandName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %> console commands
     *
     * @return mixed
     */
<% } -%>
    public function actionIndex()
    {
        $result = 'something';

        echo "Welcome to the actionIndex()\n";

        return $result;
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Handle <%= pluginDirName %>/<%= consolecommandName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>/do-something console commands
     *
     * @return mixed
     */
<% } else { -%>
    /**
     * Handle <%= pluginDirName %>/<%= consolecommandName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>/do-something console commands
     *
     * @return mixed
     */
<% } -%>
    public function actionDoSomething()
    {
        $result = 'something';

        echo "Welcome to the actionDoSomething()\n";

        return $result;
    }
}
