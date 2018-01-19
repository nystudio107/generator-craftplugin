<?php
/**
 * <%- pluginName %> plugin for Craft CMS 3.x
 *
 * <%- pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%- copyrightNotice %>
 */

namespace modules\<%= pluginDirName %>\models;

use modules\<%= pluginDirName%>\<%= pluginHandle %>;

use Craft;
use craft\base\Model;

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
/**
 * <%= modelName[index] %> Model
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
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
class <%= modelName[index] %> extends Model
{
    // Public Properties
    // =========================================================================

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Some model attribute
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
}
