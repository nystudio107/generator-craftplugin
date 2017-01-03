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
 * <%= pluginName %> Variable
 *
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
 * --snip--
 * Craft allows plugins to provide their own template variables, accessible from the {{ craft }} global variable
 * (e.g. {{ craft.pluginName }}).
 *
 * https://craftcms.com/docs/plugins/variables
 * --snip--
 *
<% } -%>
 * @author    <%= pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */

class <%= pluginHandle %>Variable
{
    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Whatever you want to output to a Twig tempate can go into a Variable method. You can have as many variable
     * functions as you want.  From any Twig template, call it like this:
     *
     *     {{ craft.<%= pluginCamelHandle %>.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.<%= pluginCamelHandle %>.exampleVariable(twigValue) }}
<% } -%>
     */
    public function exampleVariable($optional = null)
    {
        return "And away we go to the Twig template...";
    }
}