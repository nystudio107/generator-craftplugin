<?php
/**
 * <%- pluginName %> plugin for Craft CMS 4.x
 *
 * <%- pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%- copyrightNotice %>
 */

namespace <%= pluginVendorName %>\<%= pluginDirName %>\console\controllers;

use <%= pluginVendorName %>\<%= pluginDirName%>\<%= pluginHandle %>;

use yii\console\Controller;

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
/**
 * <%= consolecommandName[index] %> Command
 *
 * The first line of this class docblock is displayed as the description
 * of the Console Command in ./craft help
 *
 * Craft can be invoked via commandline console by using the `./craft` command
 * from the project root.
 *
 * Console Commands are just controllers that are invoked to handle console
 * actions. The segment routing is plugin-name/controller-name/action-name
 *
 * The actionIndex() method is what is executed if no sub-commands are supplied, e.g.:
 *
 * ./craft <%= pluginKebabHandle %>/<%= consolecommandName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>
 *
 * Actions must be in 'kebab-case' so actionDoSomething() maps to 'do-something',
 * and would be invoked via:
 *
 * ./craft <%= pluginKebabHandle %>/<%= consolecommandName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>/do-something
 *
 * @author    <%- pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */
<% } else { -%>
/**
 * <%= consolecommandName[index] %> Command
 *
 * @author    <%- pluginAuthorName %>
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
     * Handle <%= pluginKebabHandle %>/<%= consolecommandName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %> console commands
     *
     * The first line of this method docblock is displayed as the description
     * of the Console Command in ./craft help
     *
     * @return mixed
     */
<% } else { -%>
    /**
     * Handle <%= pluginKebabHandle %>/<%= consolecommandName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %> console commands
     *
     * @return mixed
     */
<% } -%>
    public function actionIndex()
    {
        $result = 'something';

        echo "Welcome to the console <%= consolecommandName[index] %>Controller actionIndex() method\n";

        return $result;
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Handle <%= pluginKebabHandle %>/<%= consolecommandName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>/do-something console commands
     *
     * The first line of this method docblock is displayed as the description
     * of the Console Command in ./craft help
     *
     * @return mixed
     */
<% } else { -%>
    /**
     * Handle <%= pluginKebabHandle %>/<%= consolecommandName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>/do-something console commands
     *
     * @return mixed
     */
<% } -%>
    public function actionDoSomething()
    {
        $result = 'something';

        echo "Welcome to the console <%= consolecommandName[index] %>Controller actionDoSomething() method\n";

        return $result;
    }
}
