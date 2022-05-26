<?php
/**
 * <%- pluginName %> plugin for Craft CMS 4.x
 *
 * <%- pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%- copyrightNotice %>
 */

namespace <%= pluginVendorName %>\<%= pluginDirName %>\jobs;

use <%= pluginVendorName %>\<%= pluginDirName%>\<%= pluginHandle %>;

use Craft;
use craft\queue\BaseJob;

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
/**
 * <%= taskName[index] %> job
 *
 * Jobs are run in separate process via a Queue of pending jobs. This allows
 * you to spin lengthy processing off into a separate PHP process that does not
 * block the main process.
 *
 * You can use it like this:
 *
 * use <%= pluginVendorName %>\<%= pluginDirName %>\jobs\<%= taskName[index] %> as <%= taskName[index] %>Job;
 *
 * $queue = Craft::$app->getQueue();
 * $jobId = $queue->push(new <%= taskName[index] %>Job([
 *     'description' => Craft::t('<%= pluginKebabHandle %>', 'This overrides the default description'),
 *     'someAttribute' => 'someValue',
 * ]));
 *
 * The key/value pairs that you pass in to the job will set the public properties
 * for that object. Thus whatever you set 'someAttribute' to will cause the
 * public property $someAttribute to be set in the job.
 *
 * Passing in 'description' is optional, and only if you want to override the default
 * description.
 *
 * More info: https://github.com/yiisoft/yii2-queue
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
class <%= taskName[index] %> extends BaseJob
{
    // Public Properties
    // =========================================================================

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Some attribute
     *
     * @var string
     */
<% } else { -%>
    /**
     * @var string
     */
<% } -%>
    public $someAttribute = 'Some Default';

    // Public Methods
    // =========================================================================

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * When the Queue is ready to run your job, it will call this method.
     * You don't need any steps or any other special logic handling, just do the
     * jobs that needs to be done here.
     *
     * More info: https://github.com/yiisoft/yii2-queue
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    public function execute($queue)
    {
        // Do work here
    }

    // Protected Methods
    // =========================================================================

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Returns a default description for [[getDescription()]], if [[description]] isn’t set.
     *
     * @return string The default task description
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    protected function defaultDescription(): string
    {
        return Craft::t('<%= pluginKebabHandle %>', '<%= taskName[index] %>');
    }
}
