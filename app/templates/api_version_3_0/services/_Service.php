<?php

namespace craft\plugins\<%= pluginDirName%>\services;

use Craft;
use craft\app\base\Component;
use craft\plugins\<%= pluginDirName%>\<%= pluginHandle %>;

/**
 * <%= pluginName %> plugin for Craft CMS 3.x
 *
 * <%= serviceName[index] %> Service
 *
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
 * --snip--
 * All of your plugin’s business logic should go in services, including saving data, retrieving data, etc. They
 * provide APIs that your controllers, template variables, and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 * --snip--
 *
<% } -%>
 * @author    <%= pluginAuthorName %>
 * @copyright <%= copyrightNotice %>
 * @link      <%= pluginAuthorUrl %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */

class <%= serviceName[index] %> extends Component
{
    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * This function can literally be anything you want, and you can have as many service functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     <%= pluginName %>::$plugin-><%= serviceName[index][0].toLowerCase() + serviceName[index].slice(1) %>->exampleService()
<% } -%>
     */
    public function exampleService()
    {
    }

}