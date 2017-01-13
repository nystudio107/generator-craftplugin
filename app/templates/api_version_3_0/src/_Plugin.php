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

<% if (pluginComponents.indexOf('twigextensions') >= 0){ -%>
use <%= pluginVendorName %>\<%= pluginDirName%>\twigextensions\<%= pluginHandle %>TwigExtension;
<% } -%>
<% if (pluginComponents.indexOf('settings') >= 0){ -%>
use <%= pluginVendorName %>\<%= pluginDirName%>\models\Settings;
<% } -%>

use Craft;
use craft\base\Plugin;
<% if (pluginComponents.indexOf('controllers') >= 0){ -%>
use craft\web\UrlManager;
use craft\events\RegisterUrlRulesEvent;
use yii\base\Event;
<% } -%>

/**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
 * Craft plugins are very much like little applications in and of themselves. We’ve made
 * it as simple as we can, but the training wheels are off. A little prior knowledge is
 * going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL,
 * as well as some semi-advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://craftcms.com/docs/plugins/introduction
 *
<% } -%>
 * @author    <%= pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */

class <%= pluginHandle %> extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Static property that is an instance of this plugin class so that it can be accessed via
     * <%= pluginHandle %>::$plugin
     *
<% } -%>
     * @var \<%= pluginVendorName %>\<%= pluginDirName %>\<%= pluginHandle %>
     */
    public static $plugin;

    // Static Methods
    // =========================================================================

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns whether the plugin should get its own tab in the AdminCP sidebar.
     *
<% } -%>
     * @return bool
     *
     * @inheritdoc
     */
    public static function hasCpSection(): bool
    {
        return false;
    }

    // Public Methods
    // =========================================================================

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Set our $plugin static property to this class so that it can be accessed via
     * <%= pluginHandle %>::$plugin
     *
<% } -%>
     * @inheritdoc
     */
    public function __construct($id, $parent = null, $config = [])
    {
        static::$plugin = $this;
        static::setInstance($this);

        parent::__construct($id, $parent, $config);
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Called after the plugin class is instantiated; do any one-time initialization
     * here such as hooks and events.
     *
     * If you have a '/vendor/autoload.php' file, it will be loaded for you automatically;
     * you do not need to load it in your init() method.
     *
<% } -%>
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->name = $this->getName();
<% if (pluginComponents.indexOf('twigextensions') >= 0){ -%>

<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
        /**
         * Add in our Twig extensions
         */
<% } -%>
        Craft::$app->view->twig->addExtension(new <%= pluginHandle %>TwigExtension());
<% } -%>
<% if (pluginComponents.indexOf('consolecommands') >= 0){ -%>

<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
        /**
         * Add in our console commands
         */
<% } -%>
    if (Craft::$app instanceof \craft\console\Application) {
        $this->controllerNamespace = '<%= pluginVendorName %>\<%= pluginDirName %>\commands';
    }
<% } -%>
<% if (pluginComponents.indexOf('controllers') >= 0){ -%>

<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
        /**
         * Register our site routes
         */
<% } -%>
        Event::on(
            UrlManager::className(),
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['siteActionTrigger'] = '<%= pluginDirName %>/<%= controllerName[0].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>';
            }
        );

<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
        /**
         * Register our CP routes
         */
<% } -%>
        Event::on(
            UrlManager::className(),
            UrlManager::EVENT_REGISTER_CP_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['cpActionTrigger'] = '<%= pluginDirName %>/<%= controllerName[0].replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1) %>/do-something';
            }
        );
<% } -%>
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns the user-facing name of the plugin, to which can override the name in
     * composer.json
     *
<% } -%>
     * @return string
     *
     * @inheritdoc
     */
    public function getName(): string
    {
         return Craft::t('<%= pluginDirName %>', '<%= pluginName %>');
    }

<% if (pluginComponents.indexOf('variables') >= 0){ -%>
    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns the component definition that should be registered on the
     * [[\craft\web\twig\variables\CraftVariable]] instance for this plugin’s handle.
     *
<% } -%>
     * @return mixed|null The component definition to be registered.
     * It can be any of the formats supported by [[\yii\di\ServiceLocator::set()]].
     *
     * @inheritdoc
     */
    public function defineTemplateComponent()
    {
        return '<%= pluginVendorName %>\<%= pluginDirName %>\variables\<%= pluginHandle %>Variable';
    }

<% } -%>
    // Protected Methods
    // =========================================================================

<% if (pluginComponents.indexOf('settings') >= 0){ -%>
    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Creates and returns the model used to store the plugin’s settings.
     *
<% } -%>
     * @return \craft\base\Model|null
     *
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns the rendered settings HTML, which will be inserted into the content
     * block on the settings page.
     *
<% } -%>
     * @return mixed
     *
     * @inheritdoc
     */
    protected function getSettingsHtml(): string
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
    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Performs actions before the plugin is installed.
     *
<% } -%>
     * @return bool Whether the plugin should be installed
     *
     * @inheritdoc
     */
    protected function beforeInstall(): bool
    {
        return true;
    }

    /**
 <% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Performs actions after the plugin is installed.
     *
<% } -%>
     * @inheritdoc
     */
    protected function afterInstall()
    {
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Performs actions before the plugin is updated.
     *
<% } -%>
     * @return bool Whether the plugin should be updated
     *
     * @inheritdoc
     */
    protected function beforeUpdate(): bool
    {
        return true;
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Performs actions after the plugin is updated.
     *
<% } -%>
     * @inheritdoc
     */
    protected function afterUpdate()
    {
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Performs actions before the plugin is installed.
     *
<% } -%>
     * @return bool Whether the plugin should be installed
     *
     * @inheritdoc
     */
    protected function beforeUninstall(): bool
    {
        return true;
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Performs actions after the plugin is installed.
     *
<% } -%>
     * @inheritdoc
     */
    protected function afterUninstall()
    {
    }
}
