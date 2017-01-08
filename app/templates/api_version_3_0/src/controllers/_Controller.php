<?php
/**
 * <%= pluginName %> plugin for Craft CMS 3.x
 *
 * <%= pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%= copyrightNotice %>
 */

namespace <%= pluginVendorName %>\<%= pluginDirName %>\variables;

use Craft;
use <%= pluginVendorName %>\<%= pluginDirName%>\<%= pluginHandle %>;

/**
 * <%= controllerName[index] %> Controller
 *
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
<% } -%>
 * @author    <%= pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */
class <%= pluginHandle %><%= controllerName[index] %>Controller extends Controller
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
     * e.g.: actions/<%= pluginCamelHandle %>/<%= controllerName[index] %>
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
     * e.g.: actions/<%= pluginCamelHandle %>/<%= controllerName[index] %>/do-something
     *
<% } -%>
     * @return mixed
     */
    public function actionDoSomething()
    {
    }
}