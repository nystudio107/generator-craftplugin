<?php
/**
 * <%- pluginName %> plugin for Craft CMS 4.x
 *
 * <%- pluginDescription %>
 *
 * @link      <%= pluginAuthorUrl %>
 * @copyright <%- copyrightNotice %>
 */

namespace <%= pluginVendorName %>\<%= pluginDirName %>\twigextensions;

use <%= pluginVendorName %>\<%= pluginDirName%>\<%= pluginHandle %>;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
/**
 * Twig can be extended in many ways; you can add extra tags, filters, tests, operators,
 * global variables, and functions. You can even extend the parser itself with
 * node visitors.
 *
 * http://twig.sensiolabs.org/doc/advanced.html
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
class <%= pluginHandle %>TwigExtension extends AbstractExtension
{
    // Public Methods
    // =========================================================================

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    public function getName(): string
    {
        return '<%= pluginHandle %>';
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Returns an array of Twig filters, used in Twig templates via:
     *
     *      {{ 'something' | someFilter }}
     *
     * @return array
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    public function getFilters(): array
    {
        return [
            new TwigFilter('someFilter', [$this, 'someInternalFunction']),
        ];
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = someFunction('something') %}
     *
    * @return array
     */
<% } else { -%>
    /**
     * @inheritdoc
     */
<% } -%>
    public function getFunctions(): array
    {
        return [
            new TwigFunction('someFunction', [$this, 'someInternalFunction']),
        ];
    }

<% if ((typeof codeComments !== 'undefined') && (codeComments)) { -%>
    /**
     * Our function called via Twig; it can do anything you want
     *
     * @param null $text
     *
     * @return string
     */
<% } else { -%>
    /**
     * @param null $text
     *
     * @return string
     */
<% } -%>
    public function someInternalFunction($text = null): string
    {
        $result = $text . " in the way";

        return $result;
    }
}
