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
use craft\web\Controller;

/**
 * Default Command
 *
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
 * Craft can be invoked via commandline console by using the `./craft` command
 * from the project root.
 *
 * Console Commands are just controllers that are invoked to handle console
 * actions. The segment routing is plugin/controller/action but if the controller
 * is named DefaultController, the second segment can be omitted.
 *
 * The actionIndex() method is what is executed if no sub-commands are supplied, e.g.:
 *
 * ./craft <%= pluginDirName %>
 *
 * Actions must be in 'kebab-case' so actionDoSomething() maps to 'do-something',
 * and would be invoked via:
 *
 * ./craft <%= pluginDirName %>/do-something
 *
<% } -%>
 * @author    <%= pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */
class DefaultController extends Controller
{

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'do-something'];

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/<%= pluginDirName %>/<%= controllerName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>
     *
<% } -%>
     * @return mixed
     */
    public function actionIndex()
    {
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Handle a request going to our plugin's actionDoSomething URL,
     * e.g.: actions/<%= pluginDirName %>/<%= controllerName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>/do-something
     *
<% } -%>
     * @return mixed
     */
    public function actionDoSomething()
    {
    }
}
