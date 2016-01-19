# generator-craftplugin

generator-craftplugin is a [Yeoman](http://yeoman.io) generator for [Craft CMS](http://www.buildwithcraft.com) plugins

Type just `yo craftplugin` and a new Craft CMS plugin tailored to your liking will be created.

You can also access the generator via the web at [pluginfactory.io](http://pluginfactory.io)

## Installation

This assumes you have `nodejs`, `npm`, and `yeoman` installed already.

1. Download & unzip the file and place the `generator-craftplugin` directory onto your dev machine
2.  -OR- do a `git clone https://github.com/khalwat/generator-craftplugin.git` directly onto your dev machine.  You can then update it with `git pull`
3. On the command line, from the root of the generator-craftplugin project (in the `generator-craftplugin/` folder), type: `npm link` to install the project dependencies and symlink a global module.  On some setups, you may have to do `sudo npm link --no-bin-links`
4.  -OR- do an `npm -g install generator-craftplugin` to install it via npm (and thus skip the `npm link` step)
5. The generator folder should be named `generator-craftplugin`.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

Requires Node version 4.0.0 or later.

## Usage

To create a new Craft CMS plugin and use generator-craftplugin to scaffold it:

    yo craftplugin

generator-craftplugin will ask you a few questions:

* **Plugin name:** - enter the name of your plugin
* **Short description of the plugin:** - enter a short (around 120 characters or less) description of the plugin and what it does
* **Plugin initial version:** - enter the initial version of the plugin, e.g.: `1.0.0` or `0.0.1`
* **Plugin author name:** - enter the name of the author of the plugin (either an individual or a company)
* **Plugin author URL:** - enter the URL (with the `http://`) of the website of the plugin author
* **Plugin author GitHub.com name:** - enter the GitHub.com handle of the author of the plugin.  If you don't have one, just leave it blank
* **Select what components your plugin will have:** - select the components you want included in your plugin, using the arrow keys to change the component, and `<space>` to select them.

If you selected `Controllers`, `ElementTypes`, `FieldTypes`, `Models`, `Purchasables`. `Records`, `Services`, `Tasks`, or `Widgets` components, it will also ask you for a name for each one, respectively.  If you want multiple components, just separate them with a , in the name input.

generator-craftplugin will then do the following for you:

1. Create the `pluginname` directory in the current directory, properly lower-cased and stripped of spaces
2. Create all of the properly named, documented files & folders for your new Craft CMS plugin

The code generated conforms to Pixel & Tonic's [Coding Standards](https://github.com/pixelandtonic/CodingStandards/blob/master/standards/PHP.md), and includes a number of other ancillary files such as `README.md`, `icon.svg`, `releases.json`, etc. to get you going.

### Sample Output

Here's an example of the output from a `yo nystudio107` generator:

```
[ Initializing ]
? Select what Craft CMS API to target: (Use arrow keys)
❯ Version 2.5.x 
[ Prompting ]
? Plugin name: My Cool new thing!
? Short description of the plugin: This is a generic Craft CMS plugin
? Plugin initial version: 1.0.0
? Plugin author name: John Doe
? Plugin author URL: http://DoeDesign.com/
? Plugin author GitHub.com name: doedesign
? Select what components your plugin will have: (Press <space> to select)
❯◯ Controllers
 ◉ ElementTypes
 ◉ FieldTypes
 ◉ Models
 ◯ Purchasables
 ◉ Records
 ◯ Services
 ◯ Tasks
 ◉ TwigExtensions
 ◉ Variables
 ◯ Widgets
? Name of your ElementType: Satu
? Name of your FieldType: Dua
? Name of your Model: Tiga
? Name of your Record: Empat
[ Configuring ]
{ pluginName: 'My Cool new thing!',
  pluginDescription: 'This is a generic Craft CMS plugin',
  pluginVersion: '1.0.0',
  pluginAuthorName: 'John Doe',
  pluginAuthorUrl: 'http://DoeDesign.com/',
  pluginAuthorGithub: 'doedesign',
  pluginComponents: 
   [ 'elementtypes',
     'fieldtypes',
     'models',
     'records',
     'twigextensions',
     'variables' ],
  elementName: [ '_Satu' ],
  fieldName: [ '_Dua' ],
  modelName: [ '_Tiga' ],
  recordName: [ '_Empat' ],
  templatesDir: 'templates',
  pluginDirName: 'mycoolnewthing',
  pluginCamelHandle: 'myCoolNewThing',
  pluginHandle: 'MyCoolNewThing',
  dateNow: '2016-01-10T04:48:29.362Z',
  niceDate: '2016.01.10',
  copyrightNotice: 'Copyright (c) 2016 John Doe',
  pluginDownloadUrl: 'https://github.com/doedesign/mycoolnewthing/archive/master.zip',
  pluginDocsUrl: 'https://github.com/doedesign/mycoolnewthing/blob/master/README.md',
  pluginReleasesUrl: 'https://raw.githubusercontent.com/doedesign/mycoolnewthing/master/releases.json',
  pluginCloneUrl: 'https://github.com/doedesign/mycoolnewthing.git' }
+ Creating Craft plugin folder mycoolnewthing
[ Writing ]
> Writing template files
+ templates/_Plugin.php wrote to mycoolnewthing/MyCoolNewThingPlugin.php
+ templates/_PluginWithTwig.php wrote to mycoolnewthing/MyCoolNewThingPlugin.php
+ templates/_README.md wrote to mycoolnewthing/README.md
+ templates/_LICENSE.txt wrote to mycoolnewthing/LICENSE.txt
+ templates/_releases.json wrote to mycoolnewthing/releases.json
+ templates/elementtypes/_ElementType.php wrote to mycoolnewthing/elementtypes/MyCoolNewThing_SatuElementType.php
+ templates/fieldtypes/_FieldType.php wrote to mycoolnewthing/fieldtypes/MyCoolNewThing_DuaFieldType.php
+ templates/templates/_field.twig wrote to mycoolnewthing/templates/field.twig
+ templates/resources/css/_field.css wrote to mycoolnewthing/resources/css/field.css
+ templates/resources/js/_field.js wrote to mycoolnewthing/resources/js/field.js
+ templates/models/_Model.php wrote to mycoolnewthing/models/MyCoolNewThing_TigaModel.php
+ templates/models/_ElementModel.php wrote to mycoolnewthing/models/MyCoolNewThing_SatuModel.php
+ templates/records/_Record.php wrote to mycoolnewthing/records/MyCoolNewThing_EmpatRecord.php
+ templates/records/_ElementRecord.php wrote to mycoolnewthing/records/MyCoolNewThing_SatuRecord.php
+ templates/templates/_settings.twig wrote to mycoolnewthing/templates/settings.twig
+ templates/translations/_en.php wrote to mycoolnewthing/translations/en.php
+ templates/twigextensions/_TwigExtension.php wrote to mycoolnewthing/twigextensions/MyCoolNewThingTwigExtension.php
+ templates/variables/_Variable.php wrote to mycoolnewthing/variables/MyCoolNewThingVariable.php
+ templates/resources/css/_style.css wrote to mycoolnewthing/resources/css/style.css
+ templates/resources/js/_script.js wrote to mycoolnewthing/resources/js/script.js
> Copying boilerplate files
+ templates/resources/icon-mask.svg copied to mycoolnewthing/resources/icon-mask.svg
+ templates/resources/icon.svg copied to mycoolnewthing/resources/icon.svg
+ templates/resources/images/plugin.png copied to mycoolnewthing/resources/images/plugin.png
+ templates/resources/screenshots/plugin_logo.png copied to mycoolnewthing/resources/screenshots/plugin_logo.png
> Sync to file system
   create mycoolnewthing/MyCoolNewThingPlugin.php
   create mycoolnewthing/README.md
   create mycoolnewthing/LICENSE.txt
   create mycoolnewthing/releases.json
   create mycoolnewthing/elementtypes/MyCoolNewThing_SatuElementType.php
   create mycoolnewthing/fieldtypes/MyCoolNewThing_DuaFieldType.php
   create mycoolnewthing/templates/field.twig
   create mycoolnewthing/resources/css/field.css
   create mycoolnewthing/resources/js/field.js
   create mycoolnewthing/models/MyCoolNewThing_TigaModel.php
   create mycoolnewthing/models/MyCoolNewThing_SatuModel.php
   create mycoolnewthing/records/MyCoolNewThing_EmpatRecord.php
   create mycoolnewthing/records/MyCoolNewThing_SatuRecord.php
   create mycoolnewthing/templates/settings.twig
   create mycoolnewthing/translations/en.php
   create mycoolnewthing/twigextensions/MyCoolNewThingTwigExtension.php
   create mycoolnewthing/variables/MyCoolNewThingVariable.php
   create mycoolnewthing/resources/css/style.css
   create mycoolnewthing/resources/js/script.js
   create mycoolnewthing/resources/icon-mask.svg
   create mycoolnewthing/resources/icon.svg
   create mycoolnewthing/resources/images/plugin.png
   create mycoolnewthing/resources/screenshots/plugin_logo.png
[ Install ]
[ End ]
> End install commands
+ Fin. executed
Your Craft CMS plugin MyCoolNewThing has been created.
The default LICENSE.txt is the MIT license; feel free to change it as you see fit.
> All set.  Have a nice day.
```

## Command line options

The `craftplugin` generator can also be passed arguments via the command line, bypassing the interactive prompts.  So it's possible do do something like this:

    yo craftplugin --pluginComponents="controllers,elementtypes,fieldtypes,models,records,services,twigextensions,variables" --apiVersion="api_version_2_5" --pluginName="Gimme the works" --pluginDescription="Some cool plugin" --pluginVersion="1.0.0" --pluginAuthorName="Andrew Welch" --pluginAuthorUrl="http://nystudio107.com" --pluginAuthorGithub="khalwat" --elementName="Satu,One" --fieldName="Dua" --modelName="Tiga" --recordName="Empat"

## Changelog

### 1.1.2 -- 2016.01.20

* Craft Commerce "Purchasables" now adds an ElementType, Model, and Record
* Fixed an error in the naming of the plugin's Settings.twig template
* Updated README.md

### 1.1.2 -- 2016.01.19

* Added a Craft Commerce Purchasable ElementType template
* Updated README.md

### 1.1.1 -- 2016.01.11

* We now create per-FieldType and per-Widget CSS/JS/Twig templates, named appropriately
* Cleaned up the Widget.php template
* We now create Body and Settings Twig template for Widgets
* Made the naming of certain templates more consistent
* Updated README.md

### 1.1.0 -- 2016.01.09

* In preparation for Craft 3.0, added support for multiple API targets for the plugin scaffolding
* Moved all of the configuration out of the Javascript and into a directory of `.json` files, one file per API target
* Updated README.md

### 1.0.9 -- 2016.01.07

* Fixes
* Updated README.md

### 1.0.8 -- 2016.01.07

* Added the ability to enter as many *Name's as you need, for multiple template files.  Just separate them with a ,
* Sanitized all of the templates to remove trailing white space, and converted all tabs to 4 spaces
* Updated README.md

### 1.0.7 -- 2016.01.06

* Template fixes
* Updated README.md

### 1.0.6 -- 2016.01.06

* Added Tasks to the templates
* Updated README.md

### 1.0.5 -- 2016.01.06

* Added Widgets to the templates
* Added additional Record and Model templates if you select ElementTypes
* Minor generated code cleanup
* Updated README.md

### 1.0.4 -- 2016.01.06

* Added support for named Services and Controllers
* Cleaned up the naming scheme for all plugin components; null values will be properly handled for all of the *Name's
* Updated README.md

### 1.0.3 -- 2016.01.05

* You can now access the generator via the web at [pluginfactory.io](http://pluginfactory.io)
* Added support for command line arguments being passed to the generator
* Updated README.md

### 1.0.2 -- 2016.01.04

* Added sub-questions for `ElementTypes`, `FieldTypes`, `Models`, and `Records` so that you can specify the name for each
* Updated README.md

### 1.0.1 -- 2016.01.04

* Added the `store` property to some questions that should retain the default answers the user gives
* Added a selectable list of components that you want included in your plugin, so you can tailor it to exactly what you want included
* Added `field.html`, `field.css`, and `field.js` templates for FieldTypes
* Updated README.me

### 1.0.0 -- 2016.01.03

* Initial release
