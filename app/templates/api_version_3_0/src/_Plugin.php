<?php
/**
 * <%= pluginName %> plugin for Craft CMS 3.x
 *
 * <%= pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%= copyrightNotice %>
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
<% if (pluginComponents.indexOf('widgets') >= 0){ -%>
<% var widgets = widgetName -%>
<% if ((typeof(widgets[0]) !== 'undefined') && (widgets[0] !== "")) { -%>
<% widgets.forEach(function(widget, index, array){ -%>
use <%= pluginVendorName %>\<%= pluginDirName%>\widgets\<%= widget %>;
<% }); -%>
<% } -%>
<% } -%>

use Craft;
use craft\base\Plugin;
<% if (pluginComponents.indexOf('controllers') >= 0){ -%>
use craft\web\UrlManager;
use craft\events\RegisterUrlRulesEvent;
use yii\base\Event;
<% } -%>
<% if (pluginComponents.indexOf('widgets') >= 0){ -%>
use craft\services\Dashboard;
use craft\events\RegisterComponentTypesEvent;
<% } -%>
<% if (pluginComponents.indexOf('consolecommands') >= 0){ -%>
use craft\console\Application as ConsoleApplication;
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
 * @author    <%= pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */
<% } else { -%>
/**
 * @author    <%= pluginAuthorName %>
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

    // Static Methods
    // =========================================================================

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Returns whether the plugin has its own section in the CP.
     *
     * @return bool Whether the plugin has its own section in the CP.
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    public static function hasCpSection(): bool
    {
        return false;
    }

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
            $this->controllerNamespace = '<%= pluginVendorName %>\<%= pluginDirName %>\commands';
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
                $event->rules['siteActionTrigger<%= index + 1 %>'] = '<%= pluginDirName %>/<%= controller.replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>';
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
                $event->rules['cpActionTrigger<%= index + 1 %>'] = '<%= pluginDirName %>/<%= controller.replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>/do-something';
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
                $event->types[] = <%= widget %>::class;
<% }); -%>
<% } -%>
            }
        );
<% } -%>
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

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Performs actions before the plugin is installed.
     *
     * @return bool Whether the plugin should be installed
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    protected function beforeInstall(): bool
    {
        return true;
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Performs actions after the plugin is installed.
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    protected function afterInstall()
    {
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Performs actions before the plugin is updated.
     *
     * @return bool Whether the plugin should be updated
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    protected function beforeUpdate(): bool
    {
        return true;
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Performs actions after the plugin is updated.
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    protected function afterUpdate()
    {
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Performs actions before the plugin is installed.
     *
     * @return bool Whether the plugin should be installed
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    protected function beforeUninstall(): bool
    {
        return true;
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Performs actions after the plugin is installed.
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    protected function afterUninstall()
    {
    }
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
            . '<%= pluginHandle %>_Settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
<% } -%>
}
