<?php
/**
 * <%- pluginName %> plugin for Craft CMS 3.x
 *
 * <%- pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%- copyrightNotice %>
 */

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
/**
 * <%- pluginName %> en Translation
 *
 * Returns an array with the string to be translated (as passed to `Craft::t()`) as
 * the key, and the translation as the value.
 *
 * http://www.yiiframework.com/doc-2.0/guide-tutorial-i18n.html
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
return [
    '<%- pluginName %> plugin loaded' => '<%- pluginName %> plugin loaded',
];
