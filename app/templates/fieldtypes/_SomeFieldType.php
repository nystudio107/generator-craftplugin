<?php
/**
 * <%= pluginName %> plugin for Craft CMS
 *
 * Some FieldType
 *
 * --snip--
 * Whenever someone creates a new field in Craft, they must specify what type of field it is. The system comes with
 * a handful of field types baked in, and we’ve made it extremely easy for plugins to add new ones.
 *
 * https://craftcms.com/docs/plugins/field-types
 * --snip--
 * 
 * @author    <%= pluginAuthorName %>
 * @copyright <%= copyrightNotice %>
 * @link      <%= pluginAuthorUrl %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */

namespace Craft;

class <%= pluginHandle %>_SomeFieldType extends BaseFieldType
{
	/**
	 * Returns the name of the fieldtype.
	 *
	 * @return mixed
	 */
    public function getName()
    {
        return Craft::t('<%= pluginName %> Some');
    }

	/**
	 * Returns the content attribute config.
	 *
	 * @return mixed
	 */
	public function defineContentAttribute()
	{
		return AttributeType::Mixed;
	}

	/**
	 * Returns the content attribute config.
	 *
	 * @return mixed
	 */
    public function defineContentAttribute()
    {
        return AttributeType::Mixed;
    }

	/**
	 * Returns the field's input HTML.
	 *
	 * @param string $name
	 * @param mixed  $value
	 * @return string
	 */
    public function getInputHtml($name, $value)
    {

    }

	/**
	 * Returns the input value as it should be saved to the database.
	 *
	 * @param mixed $value
	 * @return mixed
	 */
    public function prepValueFromPost($value)
    {
    }

	/**
	 * Prepares the field's value for use.
	 *
	 * @param mixed $value
	 * @return mixed
	 */
    public function prepValue($value)
    {
    }

}