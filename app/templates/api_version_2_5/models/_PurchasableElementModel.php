<?php
/**
 * <%= pluginName %> plugin for Craft CMS
 *
 * <%= pluginHandle %><%= purchasableName[index] %> Purchasable Model
 *
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
 * --snip--
 * Models are containers for data. Just about every time information is passed between services, controllers, and
 * templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * https://craftcms.com/docs/plugins/working-with-elements
 *
 * A purchasable is a custom Element Type that can be sold through the cart.  A purchasable:
 *
 * - Is a custom Element Type (See Craft docs on Element Types)
 * - Your element type’s Model meets the Purchasable interface. The Interface class is found
 *   in plugins/commerce/Commerce/Interfaces/Purchasables.php
 * - Persists itself as an Element with the craft()->commerce_purchasable->saveElement() method anywhere you would
 *   usually use craft()->elements->saveElement()
 *
 * https://craftcommerce.com/docs/purchasables
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

use Commerce\Interfaces\Purchasable;

class <%= pluginHandle %><%= purchasableName[index] %>Model extends BaseElementModel implements Purchasable
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
        return true;
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

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns the Id of the Purchasable element that should be added to the lineitem.
     * This elements model should meet the Purchasable Interface.
     *
<% } -%>
     * @return int
     */
    public function getPurchasableId()
    {
        return $this->id;
    }

    /*
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * This is an array of data that should be saved in a serialized way to the line item.
     *
     * Use it as a way to store data on the lineItem even after the purchasable may be deleted.
     * You may want to return all attributes of your purchasable elementType like this: ```$this->getAttributes()``` as well as any additional data.
     *
     * In addition to the data you supply we always overwrite `sku`, `price`, and `description` keys with the data your interface methods return.
     *
     * Example: return ['ticketType' => 'full',
     *                       'location' => 'N'];
     *
     *
<% } -%>
     * @return array
     */
    public function getSnapshot()
    {
        return array('someField'=>$this->someField);
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * This is the base price the item will be added to the line item with.
     *
<% } -%>
     * @return float decimal(14,4)
     */
    public function getPrice()
    {
        // Or return a user enterable Price if applicable.
        return 10.00;
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * This must be a unique code. Unique as per the commerce_purchasables table.
     *
<% } -%>
     * @return string
     */
    public function getSku()
    {
        // Or return a user enterable SKU if applicable.
        return md5(uniqid(mt_rand(), true));
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * This would usually be your elements title or any additional descriptive information.
     *
<% } -%>
     * @return string
     */
    public function getDescription()
    {
        return "<%= purchasableName[index] %> Purchasable";
    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Returns a Craft Commerce tax category id
     *
<% } -%>
     * @return int
     */
    public function getTaxCategoryId()
    {
        // Or return a user selected tax category.
        return craft()->commerce_taxCategories->getDefaultTaxCategoryId();

    }

    /**
<% if ((typeof codeComments !== 'undefined') && (codeComments)){ -%>
     * Validates this purchasable for the line item it is on. Called when Purchasable is added to the cart.
     *
     * You can add model errors to the line item like this: `$lineItem->addError('qty', $errorText);`
     *
<% } -%>
     * @param \Craft\Commerce_LineItemModel $lineItem
     *
     * @return mixed
     */
    public function validateLineItem(\Craft\Commerce_LineItemModel $lineItem)
    {
        // In this example no validation errors are addeed to the lineItem.
        return true;
    }

    /**
     * @return bool
     */
    public function hasFreeShipping()
    {
        // Or allow the user to decide this.
        return false;
    }

    /**
     * @return bool
     */
    public function getIsPromotable()
    {
        // Or allow the user to decide this.
        return false;
    }

}