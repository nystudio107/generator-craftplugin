<?php
/**
 * <%- pluginName %> plugin for Craft CMS 4.x
 *
 * <%- pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%- copyrightNotice %>
 */

namespace <%= pluginVendorName %>\<%= pluginDirName %>\controllers;

use <%= pluginVendorName %>\<%= pluginDirName%>\<%= pluginHandle %>;

use craft\web\Controller;

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
/**
 * <%= controllerName[index] %> Controller
 *
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
class <%= controllerName[index] %>Controller extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'do-something'];

    // Public Methods
    // =========================================================================

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/<%= pluginKebabHandle %>/<%= controllerName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>
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
        $result = 'Welcome to the <%= controllerName[index] %>Controller actionIndex() method';

        return $result;
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Handle a request going to our plugin's actionDoSomething URL,
     * e.g.: actions/<%= pluginKebabHandle %>/<%= controllerName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>/do-something
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
        $result = 'Welcome to the <%= controllerName[index] %>Controller actionDoSomething() method';

        return $result;
    }
}
