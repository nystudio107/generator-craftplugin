<?php
/**
 * <%= pluginName %> plugin for Craft CMS
 *
 * <%= pluginHandle %> Command
 *
 * --snip--
 * Craft is built on the Yii framework and includes a command runner, yiic in ./craft/app/etc/console/yiic
 *
 * Action methods are mapped to command-line commands, and begin with the prefix “action”, followed by
 * a description of what the method does (for example, actionPrint().  The actionIndex() method is what
 * is executed if no sub-commands are supplied, e.g.:
 *
 * ./craft/app/etc/console/yiic <%= pluginDirName %>
 *
 * The actionPrint() method above would be invoked via:
 *
 * ./craft/app/etc/console/yiic <%= pluginDirName %> print
 *
 * http://spin.atomicobject.com/2015/06/16/craft-console-plugin/
 * --snip--
 *
 * @author    <%= pluginAuthorName %>
 * @copyright <%= copyrightNotice %>
 * @link      <%= pluginAuthorUrl %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */

namespace Craft;

class <%= pluginHandle %>Command extends BaseCommand
{
    /**
     * Handle our plugin's index action command, e.g.: ./craft/app/etc/console/yiic <%= pluginDirName %>
     */
    public function actionIndex($param="")
    {
    }
}