<?php

// WARNING: Not converted to Craft 3 yet

/**
 * <%= pluginName %> plugin for Craft CMS
 *
 * <%= pluginHandle %><%= elementName[index] %> Model
 *
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
 * --snip--
 * Models are containers for data. Just about every time information is passed between services, controllers, and
 * templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * https://craftcms.com/docs/plugins/working-with-elements
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

class <%= pluginHandle %><%= elementName[index] %>Model extends BaseElementModel
{
    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Defines this model's attributes.
     *
<% } -%>
     * @return array
     */
    protected function defineAttributes()
    {
        return array_merge(parent::defineAttributes(), array(
            'someField'     => array(AttributeType::String, 'default' => 'some value'),
        ));
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns whether the current user can edit the element.
     *
<% } -%>
     * @return bool
     */
    public function isEditable()
    {
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns the element's CP edit URL.
     *
<% } -%>
     * @return string|false
     */
    public function getCpEditUrl()
    {
    }
}