<?php
/**
 * <%= pluginName %> plugin for Craft CMS 3.x
 *
 * <%= pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%= copyrightNotice %>
 */

namespace <%= pluginVendorName %>\<%= pluginDirName%>\models;

use craft\base\Model;

/**
 * <%= pluginHandle %> Settings Model
 *
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
<% } -%>
 * @author    <%= pluginAuthorName %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */
class Settings extends Model
{
    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Some field model attribute
     *
<% } -%>
     * @var string
     */
    public $someField = 'Some Default';

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
        return [
            ['someField', 'string'],
            ['someField', 'default', 'value' => 'Some Default'],
        ];
    }
}
