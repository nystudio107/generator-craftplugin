<?php
/**
 * <%= pluginName %> plugin for Craft CMS
 *
 * <%= pluginHandle %><%= fieldName[index] %> FieldType
 *
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
 * --snip--
 * Whenever someone creates a new field in Craft, they must specify what type of field it is. The system comes with
 * a handful of field types baked in, and we’ve made it extremely easy for plugins to add new ones.
 *
 * https://craftcms.com/docs/plugins/field-types
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

class <%= pluginHandle %><%= fieldName[index] %>FieldType extends BaseFieldType
{
    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns the name of the fieldtype.
     *
<% } -%>
     * @return mixed
     */
    public function getName()
    {
        return Craft::t('<%= pluginHandle %><%= fieldName[index] %>');
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns the content attribute config.
     *
<% } -%>
     * @return mixed
     */
    public function defineContentAttribute()
    {
        return AttributeType::Mixed;
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns the field's input HTML.
     *
<% } -%>
     * @param string $name
     * @param mixed  $value
     * @return string
     */
    public function getInputHtml($name, $value)
    {
        if (!$value)
            $value = new <%= pluginHandle %><%= fieldName[index] %>Model();

        $id = craft()->templates->formatInputId($name);
        $namespacedId = craft()->templates->namespaceInputId($id);

/* -- Include our Javascript & CSS */

        craft()->templates->includeCssResource('<%= pluginDirName %>/css/fields/<%= pluginHandle %><%= fieldName[index] %>FieldType.css');
        craft()->templates->includeJsResource('<%= pluginDirName %>/js/fields/<%= pluginHandle %><%= fieldName[index] %>FieldType.js');

/* -- Variables to pass down to our field.js */

        $jsonVars = array(
            'id' => $id,
            'name' => $name,
            'namespace' => $namespacedId,
            'prefix' => craft()->templates->namespaceInputId(""),
            );

        $jsonVars = json_encode($jsonVars);
        craft()->templates->includeJs("$('#{$namespacedId}-field').<%= pluginHandle %><%= fieldName[index] %>FieldType(" . $jsonVars . ");");

/* -- Variables to pass down to our rendered template */

        $variables = array(
            'id' => $id,
            'name' => $name,
            'namespaceId' => $namespacedId,
            'values' => $value
            );

        return craft()->templates->render('<%= pluginDirName %>/fields/<%= pluginHandle %><%= fieldName[index] %>FieldType.twig', $variables);
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns the input value as it should be saved to the database.
     *
<% } -%>
     * @param mixed $value
     * @return mixed
     */
    public function prepValueFromPost($value)
    {
        return $value;
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Prepares the field's value for use.
     *
<% } -%>
     * @param mixed $value
     * @return mixed
     */
    public function prepValue($value)
    {
        return $value;
    }
}