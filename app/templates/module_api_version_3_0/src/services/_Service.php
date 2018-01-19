<?php
/**
 * <%- pluginName %> module for Craft CMS 3.x
 *
 * <%- pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%- copyrightNotice %>
 */

namespace modules\<%= pluginDirName%>\services;

use modules\<%= pluginDirName%>\<%= pluginHandle %>;

use Craft;
use craft\base\Component;

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
/**
 * <%= serviceName[index] %> Service
 *
 * All of your module’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other modules can interact with.
 *
 * https://craftcms.com/docs/plugins/services
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
class <%= serviceName[index] %> extends Component
{
    // Public Methods
    // =========================================================================

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin/module file, call it like this:
     *
     *     <%= pluginHandle %>::$instance-><%= serviceName[index][0].toLowerCase() + serviceName[index].slice(1) %>->exampleService()
     *
     * @return mixed
     */
<% } else { -%>
    /*
     * @return mixed
     */
<% } -%>
    public function exampleService()
    {
        $result = 'something';
<% if (pluginComponents.indexOf('settings') >= 0){ -%>
        // Check our module's settings for `someAttribute`
<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
<% } else { -%>
<% } -%>
        if (<%= pluginHandle %>::$plugin->getSettings()->someAttribute) {
        }
<% } -%>

        return $result;
    }
}
