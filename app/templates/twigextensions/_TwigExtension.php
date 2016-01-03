<?php 
/**
 * <%= pluginName %> plugin for Craft CMS
 *
 * <%= pluginName %> Twig Extension
 *
 * --snip--
 * All of your plugin’s business logic should go in services, including saving data, retrieving data, etc. They
 * provide APIs that your controllers, template variables, and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 * --snip--
 * 
 * @author    <%= pluginAuthorName %>
 * @copyright <%= copyrightNotice %>
 * @link      <%= pluginAuthorUrl %>
 * @package   <%= pluginHandle %>
 * @since     <%= pluginVersion %>
 */

namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class <%= pluginHandle %>TwigExtension extends \Twig_Extension
{
	/**
	 * Returns the name of the extension.
	 *
	 * @return string The extension name
	 */
    public function getName()
    {
        return '<%= pluginHandle %>';
    }

	/**
	 * Returns an array of Twig filters, used in Twig templates via:
	 *
	 *		{{ 'something' | someFilter }}
	 *
	 * @return array
	 */
    public function getFilters()
    {
        return array(
            'someFilter' => new \Twig_Filter_Method($this, 'someInteralFunction'),
        );
    }

	/**
	 * Returns an array of Twig functions, used in Twig templates via:
	 *
	 *		{% set this = someFunction('something') %}
	 *
	 * @return array
	 */
    public function getFunctions()
    {
        return array(
            'someFunction' => new \Twig_Function_Method($this, 'someInteralFunction'),
        );
    }

	/**
	 * Our function called via Twig; it can do anything you want
	 *
	 * @return string
	 */
    public function someInteralFunction($text = null)
    {
        $result = $text . " in the way";
        
        return $result;
    }   
}