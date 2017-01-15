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
 * Default Command
 *
 * Craft can be invoked via commandline console by using the `./craft` command
 * from the project root.
 *
 * Console Commands are just controllers that are invoked to handle console
 * actions. The segment routing is plugin/controller/action
 *
 * The actionIndex() method is what is executed if no sub-commands are supplied, e.g.:
 *
 * ./craft <%= pluginDirName %>/default
 *
 * Since it will assume DefaultController if the `controller` segment is omitted,
 * this works, too:
 *
 * ./craft <%= pluginDirName %>
 *
 * Actions must be in 'kebab-case' so actionDoSomething() maps to 'do-something',
 * and would be invoked via:
 *
 * ./craft <%= pluginDirName %>/default/do-something
 *
 * @author    <%= pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */
<% } else { -%>
/**
 * @author    <%= pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */
<% } -%>
class DefaultController extends Controller
{
    // Public Methods
    // =========================================================================

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/<%= pluginDirName %>/<%= controllerName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>
     *
     * @return mixed
     */
<% } else { -%>
    /**
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
     * Handle a request going to our plugin's actionDoSomething URL,
     * e.g.: actions/<%= pluginDirName %>/<%= controllerName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>/do-something
     *
     * @return mixed
     */
<% } else { -%>
    /**
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
