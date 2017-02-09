<?php
/**
 * <%- pluginName %> plugin for Craft CMS 3.x
 *
 * <%- pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%- copyrightNotice %>
 */

namespace <%= pluginVendorName %>\<%= pluginDirName %>\tasks;

use <%= pluginVendorName %>\<%= pluginDirName%>\<%= pluginHandle %>;

use Craft;
use craft\base\Task;

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
/**
 * <%= taskName[index] %> Task
 *
 * Tasks let you run background processing for things that take a long time,
 * dividing them up into steps.  For example, Asset Transforms are regenerated
 * using Tasks.
 *
 * Keep in mind that tasks only get timeslices to run when Craft is handling
 * requests on your website.  If you need a task to be run on a regular basis,
 * write a Controller that triggers it, and set up a cron job to
 * trigger the controller.
 *
 * The pattern used to queue up a task for running is:
 *
 * use <%= pluginVendorName %>\<%= pluginDirName %>\tasks\<%= taskName[index] %> as <%= taskName[index] %>Task;
 *
 * $tasks = Craft::$app->getTasks();
 * if (!$tasks->areTasksPending(<%= taskName[index] %>Task::class)) {
 *     $tasks->createTask(<%= taskName[index] %>Task::class);
 * }
 *
 * https://craftcms.com/classreference/services/TasksService
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
class <%= taskName[index] %> extends Task
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
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    public function rules()
    {
        return [
            ['someAttribute', 'string'],
            ['someAttribute', 'default', 'value' => 'Some Default'],
        ];
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Returns the total number of steps for this task.
     *
     * @return int The total number of steps for this task
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    public function getTotalSteps(): int
    {
        return 1;
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Runs a task step.
     *
     * @param int $step The step to run
     *
     * @return bool|string True if the step was successful, false or an error message if not
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    public function runStep(int $step)
    {
        return true;
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
        return Craft::t('<%= pluginCamelHandle %>', '<%= taskName[index] %>');
    }
}
