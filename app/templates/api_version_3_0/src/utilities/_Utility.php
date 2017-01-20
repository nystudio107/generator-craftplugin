<?php
/**
 * <%= pluginName %> plugin for Craft CMS 3.x
 *
 * <%= pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%= copyrightNotice %>
 */

namespace <%= pluginVendorName %>\<%= pluginDirName %>\utilities;

use <%= pluginVendorName %>\<%= pluginDirName%>\<%= pluginHandle %>;

use Craft;
use craft\base\Utility;

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
/**
 * <%= pluginName %> Utility
 *
 * Utility is the base class for classes representing Control Panel utilities.
 *
 * https://craftcms.com/docs/plugins/utilities
 *
 * @author    <%= pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */
<% } else { -%>
/**
 * <%= pluginName %> Utility
 *
 * @author    <%= pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */
<% } -%>
class <%= utilityName[index] %> extends Utility
{
    // Static
    // =========================================================================

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Returns the display name of this utility.
     *
     * @return string The display name of this utility.
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    public static function displayName(): string
    {
        return Craft::t('<%= pluginDirName %>', '<%= utilityName[index] %>');
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Returns the utility’s unique identifier.
     *
     * The ID should be in `kebab-case`, as it will be visible in the URL (`admin/utilities/the-handle`).
     *
     * @return string
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    public static function id(): string
    {
        return '<%= pluginDirName %>-<%= utilityName[index].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>';
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Returns the path to the utility's SVG icon.
     *
     * @return string|null The path to the utility SVG icon
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    public static function iconPath()
    {
        return Craft::$app->getPath()->getPluginsPath()
            . DIRECTORY_SEPARATOR
            . '<%= pluginDirName %>'
            . DIRECTORY_SEPARATOR
            . 'src'
            . DIRECTORY_SEPARATOR
            .'icon.svg';
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Returns the number that should be shown in the utility’s nav item badge.
     *
     * If `0` is returned, no badge will be shown
     *
     * @return int
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    public static function badgeCount(): int
    {
        return 0;
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Returns the utility's content HTML.
     *
     * @return string
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    public static function contentHtml(): string
    {
        Craft::$app->getView()->registerCssResource(
            '<%= pluginDirName %>'
            . DIRECTORY_SEPARATOR
            . 'css'
            . DIRECTORY_SEPARATOR
            . 'utilities'
            . DIRECTORY_SEPARATOR
            . '<%= utilityName[index] %>.css'
        );
        Craft::$app->getView()->registerJsResource(
            '<%= pluginDirName %>'
            . DIRECTORY_SEPARATOR
            . 'js'
            . DIRECTORY_SEPARATOR
            . 'utilities'
            . DIRECTORY_SEPARATOR
            . '<%= utilityName[index] %>.js'
        );

        $someVar = 'Have a nice day!';
        return Craft::$app->getView()->renderTemplate(
            '<%= pluginDirName %>'
            . DIRECTORY_SEPARATOR
            . '_components'
            . DIRECTORY_SEPARATOR
            . 'utilities'
            . DIRECTORY_SEPARATOR
            . '<%= utilityName[index] %>_content',
            [
                'someVar' => $someVar
            ]
        );
    }
}
