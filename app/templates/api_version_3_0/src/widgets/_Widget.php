<?php

// WARNING: Not converted to Craft 3 yet

/**
 * <%= pluginName %> plugin for Craft CMS
 *
 * <%= pluginHandle %><%= widgetName[index] %> Widget
 *
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
 * --snip--
 * Dashboard widgets allow you to display information in the Admin CP Dashboard.  Adding new types of widgets to
 * the dashboard couldn’t be easier in Craft
 *
 * https://craftcms.com/docs/plugins/widgets
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
class <%= pluginHandle %><%= widgetName[index] %>Widget extends BaseWidget
{
    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns the name of the widget name.
     *
<% } -%>
     * @return mixed
     */
    public function getName()
    {
        return Craft::t('<%= pluginName %><%= widgetName[index] %>');
    }
    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * getBodyHtml() does just what it says: it returns your widget’s body HTML. We recommend that you store the
     * actual HTML in a template, and load it via craft()->templates->render().
     *
<% } -%>
     * @return mixed
     */
    public function getBodyHtml()
    {
        // Include our Javascript & CSS
        craft()->templates->includeCssResource('<%= pluginDirName %>/css/widgets/<%= pluginHandle %><%= widgetName[index] %>Widget.css');
        craft()->templates->includeJsResource('<%= pluginDirName %>/js/widgets/<%= pluginHandle %><%= widgetName[index] %>Widget.js');
        /* -- Variables to pass down to our rendered template */
        $variables = array();
        $variables['settings'] = $this->getSettings();
        return craft()->templates->render('<%= pluginDirName %>/widgets/<%= pluginHandle %><%= widgetName[index] %>Widget_Body', $variables);
    }
    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns how many columns the widget will span in the Admin CP
     *
<% } -%>
     * @return int
     */
    public function getColspan()
    {
        return 1;
    }
    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Defines the attributes that model your Widget's available settings.
     *
<% } -%>
     * @return array
     */
    protected function defineSettings()
    {
        return array(
            'someSetting' => array(AttributeType::String, 'label' => 'Some Setting', 'default' => ''),
        );
    }
    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns the HTML that displays your Widget's settings.
     *
<% } -%>
     * @return mixed
     */
    public function getSettingsHtml()
    {

/* -- Variables to pass down to our rendered template */

        $variables = array();
        $variables['settings'] = $this->getSettings();
        return craft()->templates->render('<%= pluginDirName %>/widgets/<%= pluginHandle %><%= widgetName[index] %>Widget_Settings',$variables);
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * If you need to do any processing on your settings’ post data before they’re saved to the database, you can
     * do it with the prepSettings() method:
     *
<% } -%>
     * @param mixed $settings  The Widget's settings
     *
     * @return mixed
     */
    public function prepSettings($settings)
    {

/* -- Modify $settings here... */

        return $settings;
    }
}