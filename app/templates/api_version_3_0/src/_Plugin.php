<?php

namespace <%= pluginVendorName %>\<%= pluginDirName %>;

<% if (pluginComponents.indexOf('twigextensions') >= 0){ -%>
use <%= pluginVendorName %>\<%= pluginDirName%>\twigextensions\<%= pluginHandle %>TwigExtension;
<% } -%>

use Craft;

/**
 * <%= pluginName %> plugin for Craft CMS 3.x
 *
 * <%= pluginDescription %>
 *
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
 * --snip--
 * Craft plugins are very much like little applications in and of themselves. We’ve made it as simple as we can,
 * but the training wheels are off. A little prior knowledge is going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL, as well as some semi-
 * advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://craftcms.com/docs/plugins/introduction
 * --snip--
 *
<% } -%>
 * @author    <%= pluginAuthorName %>
 * @copyright <%= copyrightNotice %>
 * @link      <%= pluginAuthorUrl %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */

class <%= pluginHandle %> extends \craft\base\Plugin
{
    /**
     * Static property that is an instance of this plugin class so that it can be accessed via
     * <%= pluginHandle %>::$plugin
     * @var craft\plugins\<%= pluginDirName %>\<%= pluginHandle %>
     */
    public static $plugin;

    /**
     * Set our $plugin static property to this class so that it can be accessed via
     * <%= pluginHandle %>::$plugin
     * @param array $config [description]
     */
    public function __construct($id, $parent = null, $config = [])
    {
        static::$plugin = $this;
        static::setInstance($this);

        parent::__construct($id, $parent, $config);
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Called after the plugin class is instantiated; do any one-time initialization here such as hooks and events:
     *
     * craft()->on('entries.saveEntry', function(Event $event) {
     *    // ...
     * });
     *
     * or loading any third party Composer packages via:
     *
     * require_once __DIR__ . '/vendor/autoload.php';
     *
<% } -%>
     * @return mixed
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
        Craft::$app->view->twig->addExtension(new JsonLdTwigExtension());
<% } -%>
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns the user-facing name of the plugin, to which can override the name in
     * plugin.json
     *
<% } -%>
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('<%= pluginDirName %>', '<%= pluginName %>');
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns whether the plugin should get its own tab in the CP header.
     *
<% } -%>
     * @return bool
     */
    public static function hasCpSection()
    {
        return false;
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Called right before your plugin’s row gets stored in the plugins database table, and tables have been created
     * for it based on its records.
<% } -%>
     */
    protected function onBeforeInstall()
    {
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Called right after your plugin’s row has been stored in the plugins database table, and tables have been
     * created for it based on its records.
<% } -%>
     */
    protected function onAfterInstall()
    {
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Called right before your plugin’s record-based tables have been deleted, and its row in the plugins table
     * has been deleted.
<% } -%>
     */
    protected function onBeforeUninstall()
    {
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Called right after your plugin’s record-based tables have been deleted, and its row in the plugins table
     * has been deleted.
<% } -%>
     */
    protected function onAfterUninstall()
    {
    }
}