<?php
/**
 * <%= pluginName %> plugin for Craft CMS 3.x
 *
 * <%= pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%= copyrightNotice %>
 */

namespace <%= pluginVendorName %>\<%= pluginDirName %>\widgets;

use <%= pluginVendorName %>\<%= pluginDirName%>\<%= pluginHandle %>;

use Craft;
use craft\base\Widget;

// WARNING: Not converted to Craft 3 yet

/**
 * <%= pluginName %> Widget
 *
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
 * Dashboard widgets allow you to display information in the Admin CP Dashboard.
 * Adding new types of widgets to the dashboard couldn’t be easier in Craft
 *
 * https://craftcms.com/docs/plugins/widgets
 *
<% } -%>
 * @author    <%= pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */
class <%= widgetName[index] %> extends Widget
{

    // Public Properties
    // =========================================================================

    /**
     * @var string The message to display
     */
    public $message = 'Hello, world.';

    // Static Methods
    // =========================================================================

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns the display name of the widget
     *
<% } -%>
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('<%= pluginDirName %>', '<%= widgetName[index] %>');
    }

    // Public Methods
    // =========================================================================

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
<% } -%>
     * @return array
     *
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules,
            [
                ['message', 'string'],
                ['message', 'default', 'value' => 'Hello, world.'],
            ]);
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return Craft::$app->getView()->renderTemplate(
            '<%= pluginDirName %>'
            . DIRECTORY_SEPARATOR
            . 'widgets'
            . DIRECTORY_SEPARATOR
            . '<%= widgetName[index] %>_Settings',
            [
                'widget' => $this
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function getIconPath()
    {
        return Craft::$app->getPath()->getPluginsPath()
            . DIRECTORY_SEPARATOR
            . '<%= pluginDirName %>'
            . DIRECTORY_SEPARATOR
            . 'src'
            . DIRECTORY_SEPARATOR
            .'resources'
            . DIRECTORY_SEPARATOR
            .'icon.svg';
    }

    /**
     * @inheritdoc
     */
    public function getBodyHtml()
    {
        Craft::$app->getView()->registerCssResource(
            '<%= pluginDirName %>'
            . DIRECTORY_SEPARATOR
            . 'css'
            . DIRECTORY_SEPARATOR
            . 'widgets'
            . DIRECTORY_SEPARATOR
            . '<%= widgetName[index] %>.css'
        );
        Craft::$app->getView()->registerJsResource(
            '<%= pluginDirName %>'
            . DIRECTORY_SEPARATOR
            . 'js'
            . DIRECTORY_SEPARATOR
            . 'widgets'
            . DIRECTORY_SEPARATOR
            . '<%= widgetName[index] %>.js');

        return Craft::$app->getView()->renderTemplate(
            '<%= pluginDirName %>'
            . DIRECTORY_SEPARATOR
            . 'widgets'
            . DIRECTORY_SEPARATOR
            . '<%= widgetName[index] %>_Body',
            [
                'message' => $this->message
            ]
        );
    }
}
