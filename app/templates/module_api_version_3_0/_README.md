# <%- pluginName %> module for Craft CMS 3.x

<%- pluginDescription %>

## Requirements

This module requires Craft CMS 3.0.0-RC1 or later.

## Installation

To install the module, follow these instructions.

First, you'll need to add the contents of the `app.php` file to your `config/app.php` (or just copy it there if it does not exist). This ensures that your module will get loaded for each request. The file might look something like this:
```
return [
    'modules' => [
        '<%= pluginKebabHandle %>' => [
            'class' => \modules\<%= pluginDirName %>\<%= pluginHandle %>::class,
<% if (pluginComponents.indexOf('services') >= 0){ -%>
<% var components = serviceName -%>
<% if ((typeof(components[0]) !== 'undefined') && (components[0] !== "")) { -%>
            'components' => [
<% components.forEach(function(component, index, array){ -%>
                '<%= component[0].toLowerCase() + component.slice(1) %>' => [
                    'class' => 'modules\<%= pluginDirName %>\services\<%= component%>',
                ],
<% }); -%>
            ],
<% } -%>
<% } -%>
        ],
    ],
    'bootstrap' => ['<%= pluginKebabHandle %>'],
];
```
You'll also need to make sure that you add the following to your project's `composer.json` file so that Composer can find your module:

    "autoload": {
        "psr-4": {
          "modules\\<%= pluginDirName %>\\": "modules/<%= pluginDirName %>/src/"
        }
    },

After you have added this, you will need to do:

    composer dump-autoload
 
 …from the project’s root directory, to rebuild the Composer autoload map. This will happen automatically any time you do a `composer install` or `composer update` as well.

## <%- pluginName %> Overview

-Insert text here-

## Using <%- pluginName %>

-Insert text here-

## <%- pluginName %> Roadmap

Some things to do, and ideas for potential features:

* Release it

Brought to you by [<%- pluginAuthorName %>](<%= pluginAuthorUrl %>)
