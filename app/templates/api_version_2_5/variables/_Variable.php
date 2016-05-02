<?php
/**
 * <%= pluginName %> plugin for Craft CMS
 *
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
 * @copyright <%= copyrightNotice %>
 * @link      <%= pluginAuthorUrl %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */

namespace Craft;

class <%= pluginHandle %>Variable
{
    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Whatever you want to output to a Twig tempate can go into a Variable method. You can have as many variable
     * functions as you want.  From any Twig template, call it like this:
     *
     *     {{ craft.<%= pluginCamelHandle %>.exampleVariable }}
     *
     * Or, if your variable requires input from Twig:
     *
     *     {{ craft.<%= pluginCamelHandle %>.exampleVariable(twigValue) }}
<% } -%>
     */
    public function exampleVariable($optional = null)
    {
        return "And away we go to the Twig template...";
    }
}