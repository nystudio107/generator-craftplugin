<?php
/**
 * <%- pluginName %> plugin for Craft CMS 3.x
 *
 * <%- pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%- copyrightNotice %>
 */

namespace <%= pluginVendorName %>\<%= pluginDirName %>;

<% if (pluginComponents.indexOf('variables') >= 0){ -%>
use <%= pluginVendorName %>\<%= pluginDirName %>\variables\<%= pluginHandle %>Variable;
<% } -%>
<% if (pluginComponents.indexOf('twigextensions') >= 0){ -%>
use <%= pluginVendorName %>\<%= pluginDirName%>\twigextensions\<%= pluginHandle %>TwigExtension;
<% } -%>
<% if (pluginComponents.indexOf('settings') >= 0){ -%>
use <%= pluginVendorName %>\<%= pluginDirName%>\models\Settings;
<% } -%>
<% if (pluginComponents.indexOf('elementtypes') >= 0){ -%>
<% var elements = elementName -%>
<% if ((typeof(elements[0]) !== 'undefined') && (elements[0] !== "")) { -%>
<% elements.forEach(function(element, index, array){ -%>
use <%= pluginVendorName %>\<%= pluginDirName%>\elements\<%= element %> as <%= element %>Element;
<% }); -%>
<% } -%>
<% } -%>
<% if (pluginComponents.indexOf('fieldtypes') >= 0){ -%>
<% var fields = fieldName -%>
<% if ((typeof(fields[0]) !== 'undefined') && (fields[0] !== "")) { -%>
<% fields.forEach(function(field, index, array){ -%>
use <%= pluginVendorName %>\<%= pluginDirName%>\fields\<%= field %> as <%= field %>Field;
<% }); -%>
<% } -%>
<% } -%>
<% if (pluginComponents.indexOf('utilities') >= 0){ -%>
<% var utilities = utilityName -%>
<% if ((typeof(utilities[0]) !== 'undefined') && (utilities[0] !== "")) { -%>
<% utilities.forEach(function(utility, index, array){ -%>
use <%= pluginVendorName %>\<%= pluginDirName%>\utilities\<%= utility %> as <%= utility %>Utility;
<% }); -%>
<% } -%>
<% } -%>
<% if (pluginComponents.indexOf('widgets') >= 0){ -%>
<% var widgets = widgetName -%>
<% if ((typeof(widgets[0]) !== 'undefined') && (widgets[0] !== "")) { -%>
<% widgets.forEach(function(widget, index, array){ -%>
use <%= pluginVendorName %>\<%= pluginDirName%>\widgets\<%= widget %> as <%= widget %>Widget;
<% }); -%>
<% } -%>
<% } -%>

<% var includeRegisterComponentTypesEvent = false -%>
<% var includeRegisterUrlRulesEvent = false -%>
use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
<% if (pluginComponents.indexOf('consolecommands') >= 0){ -%>
use craft\console\Application as ConsoleApplication;
<% } -%>
<% if (pluginComponents.indexOf('controllers') >= 0){ -%>
<% includeRegisterUrlRulesEvent = true -%>
use craft\web\UrlManager;
<% } -%>
<% var includeRegisterComponentTypesEvent = false -%>
<% if (pluginComponents.indexOf('elementtypes') >= 0){ -%>
<% includeRegisterComponentTypesEvent = true -%>
use craft\services\Elements;
<% } -%>
<% if (pluginComponents.indexOf('fieldtypes') >= 0){ -%>
<% includeRegisterComponentTypesEvent = true -%>
use craft\services\Fields;
<% } -%>
<% if (pluginComponents.indexOf('utilities') >= 0){ -%>
<% includeRegisterComponentTypesEvent = true -%>
use craft\services\Utilities;
<% } -%>
<% if (pluginComponents.indexOf('widgets') >= 0){ -%>
<% includeRegisterComponentTypesEvent = true -%>
use craft\services\Dashboard;
<% } -%>
<% if (includeRegisterComponentTypesEvent === true){ -%>
use craft\events\RegisterComponentTypesEvent;
<% } -%>
<% if (includeRegisterUrlRulesEvent === true){ -%>
use craft\events\RegisterUrlRulesEvent;
<% } -%>
<% if ((includeRegisterComponentTypesEvent === true) || (includeRegisterUrlRulesEvent === true)) { -%>
use yii\base\Event;
<% } -%>

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
/**
 * Craft plugins are very much like little applications in and of themselves. We’ve made
 * it as simple as we can, but the training wheels are off. A little prior knowledge is
 * going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL,
 * as well as some semi-advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://craftcms.com/docs/plugins/introduction
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
class <%= pluginHandle %> extends Plugin
{
    // Static Properties
    // =========================================================================

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Static property that is an instance of this plugin class so that it can be accessed via
     * <%= pluginHandle %>::$plugin
     *
     * @var static
     */
<% } else { -%>
    /**
     * @var static
     */
<% } -%>
    public static $plugin;

    // Public Methods
    // =========================================================================

 <% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
   /**
     * Set our $plugin static property to this class so that it can be accessed via
     * <%= pluginHandle %>::$plugin
     *
     * Called after the plugin class is instantiated; do any one-time initialization
     * here such as hooks and events.
     *
     * If you have a '/vendor/autoload.php' file, it will be loaded for you automatically;
     * you do not need to load it in your init() method.
     *
     */
<% } else { -%>
   /**
     * @inheritdoc
     */
<% } -%>
    public function init()
    {
        parent::init();
        self::$plugin = $this;
<% if (pluginComponents.indexOf('twigextensions') >= 0){ -%>

<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
        // Add in our Twig extensions
<% } -%>
        Craft::$app->view->twig->addExtension(new <%= pluginHandle %>TwigExtension());
<% } -%>
<% if (pluginComponents.indexOf('consolecommands') >= 0){ -%>

<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
        // Add in our console commands
<% } -%>
        if (Craft::$app instanceof ConsoleApplication) {
            $this->controllerNamespace = '<%= pluginVendorName %>\<%= pluginDirName %>\console\controllers';
        }
<% } -%>
<% if (pluginComponents.indexOf('controllers') >= 0){ -%>

<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
        // Register our site routes
<% } -%>
        Event::on(
            UrlManager::className(),
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
<% var controllers = controllerName -%>
<% if ((typeof(controllers[0]) !== 'undefined') && (controllers[0] !== "")) { -%>
<% controllers.forEach(function(controller, index, array){ -%>
                $event->rules['siteActionTrigger<%= index + 1 %>'] = '<%= pluginCamelHandle.replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}) %>/<%= controller.replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>';
<% }); -%>
<% } -%>
            }
        );

<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
        // Register our CP routes
<% } -%>
        Event::on(
            UrlManager::className(),
            UrlManager::EVENT_REGISTER_CP_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
<% var controllers = controllerName -%>
<% if ((typeof(controllers[0]) !== 'undefined') && (controllers[0] !== "")) { -%>
<% controllers.forEach(function(controller, index, array){ -%>
                $event->rules['cpActionTrigger<%= index + 1 %>'] = '<%= pluginCamelHandle.replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}) %>/<%= controller.replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>/do-something';
<% }); -%>
<% } -%>
            }
        );
<% } -%>
<% if (pluginComponents.indexOf('elementtypes') >= 0){ -%>

<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
        // Register our elements
<% } -%>
        Event::on(
            Elements::className(),
            Elements::EVENT_REGISTER_ELEMENT_TYPES,
            function (RegisterComponentTypesEvent $event) {
<% var elements = elementName -%>
<% if ((typeof(elements[0]) !== 'undefined') && (elements[0] !== "")) { -%>
<% elements.forEach(function(element, index, array){ -%>
                $event->types[] = <%= element %>Element::class;
<% }); -%>
<% } -%>
            }
        );
<% } -%>
<% if (pluginComponents.indexOf('fieldtypes') >= 0){ -%>

<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
        // Register our fields
<% } -%>
        Event::on(
            Fields::className(),
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function (RegisterComponentTypesEvent $event) {
<% var fields = fieldName -%>
<% if ((typeof(fields[0]) !== 'undefined') && (fields[0] !== "")) { -%>
<% fields.forEach(function(field, index, array){ -%>
                $event->types[] = <%= field %>Field::class;
<% }); -%>
<% } -%>
            }
        );
<% } -%>
<% if (pluginComponents.indexOf('utilities') >= 0){ -%>

<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
        // Register our utilities
<% } -%>
        Event::on(
            Utilities::className(),
            Utilities::EVENT_REGISTER_UTILITY_TYPES,
            function (RegisterComponentTypesEvent $event) {
<% var utilities = utilityName -%>
<% if ((typeof(utilities[0]) !== 'undefined') && (utilities[0] !== "")) { -%>
<% utilities.forEach(function(utility, index, array){ -%>
                $event->types[] = <%= utility %>Utility::class;
<% }); -%>
<% } -%>
            }
        );
<% } -%>
<% if (pluginComponents.indexOf('widgets') >= 0){ -%>

<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
        // Register our widgets
<% } -%>
        Event::on(
            Dashboard::className(),
            Dashboard::EVENT_REGISTER_WIDGET_TYPES,
            function (RegisterComponentTypesEvent $event) {
<% var widgets = widgetName -%>
<% if ((typeof(widgets[0]) !== 'undefined') && (widgets[0] !== "")) { -%>
<% widgets.forEach(function(widget, index, array){ -%>
                $event->types[] = <%= widget %>Widget::class;
<% }); -%>
<% } -%>
            }
        );
<% } -%>

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
        // Do something after we're installed
<% } else { -%>
<% } -%>
        Event::on(
            Plugins::className(),
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
            }
        );

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
/**
 * Logging in Craft involves using one of the following methods:
 *
 * Craft::trace(): record a message to trace how a piece of code runs. This is mainly for development use.
 * Craft::info(): record a message that conveys some useful information.
 * Craft::warning(): record a warning message that indicates something unexpected has happened.
 * Craft::error(): record a fatal error that should be investigated as soon as possible.
 *
 * Unless `devMode` is on, only Craft::warning() & Craft::error() will log to `craft/storage/logs/web.log`
 *
 * It's recommended that you pass in the magic constant `__METHOD__` as the second parameter, which sets
 * the category to the method (prefixed with the fully qualified class name) where the constant appears.
 *
 * To enable the Yii debug toolbar, go to your user account in the AdminCP and check the
 * [] Show the debug toolbar on the front end & [] Show the debug toolbar on the Control Panel
 *
 * http://www.yiiframework.com/doc-2.0/guide-runtime-logging.html
 */
<% } else { -%>
<% } -%>
        Craft::info('<%= pluginHandle %> ' . Craft::t('<%= pluginCamelHandle %>', 'plugin loaded'), __METHOD__);
    }

<% if (pluginComponents.indexOf('variables') >= 0){ -%>
<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Returns the component definition that should be registered on the
     * [[\craft\web\twig\variables\CraftVariable]] instance for this plugin’s handle.
     *
     * @return mixed|null The component definition to be registered.
     * It can be any of the formats supported by [[\yii\di\ServiceLocator::set()]].
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    public function defineTemplateComponent()
    {
        return <%= pluginHandle %>Variable::class;
    }

<% } -%>
    // Protected Methods
    // =========================================================================

<% if (pluginComponents.indexOf('settings') >= 0){ -%>

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Creates and returns the model used to store the plugin’s settings.
     *
     * @return \craft\base\Model|null
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    protected function createSettingsModel()
    {
        return new Settings();
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Returns the rendered settings HTML, which will be inserted into the content
     * block on the settings page.
     *
     * @return string The rendered settings HTML
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            '<%= pluginDirName %>'
            . DIRECTORY_SEPARATOR
            . 'settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
<% } -%>
}
