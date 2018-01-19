<?php
/**
 * Yii Application Config
 *
 * Edit this file at your own risk!
 *
 * The array returned by this file will get merged with
 * vendor/craftcms/cms/src/config/app/main.php and [web|console].php, when
 * Craft's bootstrap script is defining the configuration for the entire
 * application.
 *
 * You can define custom modules and system components, and even override the
 * built-in system components.
 */
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
