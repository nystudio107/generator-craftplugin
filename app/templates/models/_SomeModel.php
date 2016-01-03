<?php
/**
 * <%= pluginName %> plugin for Craft CMS
 *
 * Some Model
 *
 * --snip--
 * Models are containers for data. Just about every time information is passed between services, controllers, and
 * templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 * --snip--
 * 
 * @author    <%= pluginAuthorName %>
 * @copyright <%= copyrightNotice %>
 * @link      <%= pluginAuthorUrl %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */

namespace Craft;

class <%= pluginHandle %>_SomeModel extends BaseElementModel
{
    /**
     * @access protected
     * @return array
     */
    protected function defineAttributes()
    {
        return array_merge(parent::defineAttributes(), array(
        ));
    }

    /**
     * Returns whether the current user can edit the element.
     *
     * @return bool
     */
    public function isEditable()
    {
    }

    /**
     * Returns the element's CP edit URL.
     *
     * @return string|false
     */
    public function getCpEditUrl()
    {
    }
}