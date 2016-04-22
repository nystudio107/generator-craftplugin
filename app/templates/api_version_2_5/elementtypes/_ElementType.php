<?php
/**
 * <%= pluginName %> plugin for Craft CMS
 *
 * <%= pluginHandle %><%= elementName[index] %> ElementType
 *
<% if (typeof codeComments !== 'undefined'){ -%>
 * --snip--
 * Element Types are the classes used to identify each of these types of elements in Craft. There’s a
 * “UserElementType”, there’s an “AssetElementType”, and so on. If you’ve ever developed a custom Field Type class
 * before, this should sound familiar. The relationship between an element and an Element Type is the same as that
 * between a field and a Field Type.
 *
 * http://pixelandtonic.com/blog/craft-element-types
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

class <%= pluginHandle %><%= elementName[index] %>ElementType extends BaseElementType
{
    /**
<% if (typeof codeComments !== 'undefined'){ -%>
     * Returns this element type's name.
     *
<% } -%>
     * @return mixed
     */
    public function getName()
    {
        return Craft::t('<%= pluginHandle %><%= elementName[index] %>');
    }

    /**
<% if (typeof codeComments !== 'undefined'){ -%>
     * Returns whether this element type has content.
     *
<% } -%>
     * @return bool
     */
    public function hasContent()
    {
        return true;
    }

    /**
<% if (typeof codeComments !== 'undefined'){ -%>
     * Returns whether this element type has titles.
     *
<% } -%>
     * @return bool
     */
    public function hasTitles()
    {
        return true;
    }

    /**
<% if (typeof codeComments !== 'undefined'){ -%>
     * Returns whether this element type can have statuses.
     *
<% } -%>
     * @return bool
     */
    public function hasStatuses()
    {
        return true;
    }

    /**
<% if (typeof codeComments !== 'undefined'){ -%>
     * Returns whether this element type is localized.
     *
<% } -%>
     * @return bool
     */
    public function isLocalized()
    {
        return false;
    }

    /**
<% if (typeof codeComments !== 'undefined'){ -%>
     * Returns this element type's sources.
     *
<% } -%>
     * @param string|null $context
     * @return array|false
     */
    public function getSources($context = null)
    {
    }

    /**
     * @inheritDoc IElementType::getAvailableActions()
     *
     * @param string|null $source
     *
     * @return array|null
     */
    public function getAvailableActions($source = null)
    {
    }

    /**
<% if (typeof codeComments !== 'undefined'){ -%>
     * Returns the attributes that can be shown/sorted by in table views.
     *
<% } -%>
     * @param string|null $source
     * @return array
     */
    public function defineTableAttributes($source = null)
    {
    }

    /**
<% if (typeof codeComments !== 'undefined'){ -%>
     * Returns the table view HTML for a given attribute.
     *
<% } -%>
     * @param BaseElementModel $element
     * @param string $attribute
     * @return string
     */
    public function getTableAttributeHtml(BaseElementModel $element, $attribute)
    {
    }

    /**
<% if (typeof codeComments !== 'undefined'){ -%>
     * Defines any custom element criteria attributes for this element type.
     *
<% } -%>
     * @return array
     */
    public function defineCriteriaAttributes()
    {
    }

    /**
<% if (typeof codeComments !== 'undefined'){ -%>
     * Modifies an element query targeting elements of this type.
     *
<% } -%>
     * @param DbCommand $query
     * @param ElementCriteriaModel $criteria
     * @return mixed
     */
    public function modifyElementsQuery(DbCommand $query, ElementCriteriaModel $criteria)
    {
   }

    /**
<% if (typeof codeComments !== 'undefined'){ -%>
     * Populates an element model based on a query result.
     *
<% } -%>
     * @param array $row
     * @return array
     */
    public function populateElementModel($row)
    {
    }

    /**
<% if (typeof codeComments !== 'undefined'){ -%>
     * Returns the HTML for an editor HUD for the given element.
     *
<% } -%>
     * @param BaseElementModel $element
     * @return string
     */
    public function getEditorHtml(BaseElementModel $element)
    {
    }
}