# generator-craftplugin

generator-craftplugin is a [Yeoman](http://yeoman.io) generator for [Craft CMS](http://www.buildwithcraft.com) plugins

Type just `yo craftplugin` and a new Craft CMS plugin tailored to your liking will be created.

You can also access the generator via the web at [pluginfactory.io](http://pluginfactory.io)

## Installation

This assumes you have `nodejs`, `npm`, and `yeoman` installed already.

1. Download & unzip the file and place the `generator-craftplugin` directory onto your dev machine
2.  -OR- do a `git clone https://github.com/nystudio107/generator-craftplugin.git` directly onto your dev machine.  You can then update it with `git pull`
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

Here's an example of the output from a `yo craftplugin` generator:

```
[ Initializing ]
? Select what Craft CMS API to target: (Use arrow keys)
  Version 2.5.x
❯ Version 3.0.x
[ Prompting ]
? Plugin name: Some Plugin
? Short description of the plugin: Some Description
? Plugin initial version: 1.0.0
? Plugin author name: Some Author
? Plugin vendor name: Some Vendor
? Plugin author URL: https://SomeDomain.com
? Plugin author GitHub.com name: SomeGithub
? Should there be code comments generated: (Press <space> to select, <a> to toggle all, <i> to invers
e selection)
❯◉ Code Comments
? Select what components your plugin will have: (Press <space> to select, <a> to toggle all, <i> to invers
e selection)
❯◉ ConsoleCommands
 ◉ Controllers
 ◉ ElementTypes
 ◉ FieldTypes
 ◉ Models
 ◯ Purchasables
 ◉ Records
 ◉ Services
 ◉ Settings
 ◉ Tasks
 ◉ TwigExtensions
 ◉ Utilities
 ◉ Variables
 ◉ Widgets
? Name of your ConsoleCommand: Een,Twee,Drie
? Name of your Controller: One,Two,Three
? Name of your Element: Neung,Song,Sam
? Name of your Field: Ichi,Ni,San
? Name of your Model: Uno,Dos,Tres
? Name of your Record: Satu,Dua,Tiga
? Name of your Service: Yi,Er,San
? Name of your Task: Hana,Dul,Set
? Name of your Utility: Eins,Zwei,Drei
? Name of your Widget: Un,Deux,Trois
[ Configuring ]
{ pluginName: 'Some Plugin',
  pluginDescription: 'Some Description',
  pluginVersion: '1.0.0',
  pluginAuthorName: 'Some Author',
  pluginVendorName: 'somevendor',
  pluginAuthorUrl: 'https://SomeDomain.com',
  pluginAuthorGithub: 'SomeGithub',
  codeComments: 'yes',
  pluginComponents:
   [ 'controllers',
     'consolecommands',
     'elementtypes',
     'fieldtypes',
     'models',
     'records',
     'services',
     'settings',
     'tasks',
     'twigextensions',
     'utilities',
     'variables',
     'widgets' ],
  consolecommandName: [ 'Een', 'Twee', 'Drie' ],
  controllerName: [ 'One', 'Two', 'Three' ],
  elementName: [ 'Neung', 'Song', 'Sam' ],
  fieldName: [ 'Ichi', 'Ni', 'San' ],
  modelName: [ 'Uno', 'Dos', 'Tres' ],
  purchasableName: [ '' ],
  recordName: [ 'Satu', 'Dua', 'Tiga' ],
  serviceName: [ 'Yi', 'Er', 'San' ],
  taskName: [ 'Hana', 'Dul', 'Set' ],
  utilityName: [ 'Eins', 'Zwei', 'Drei' ],
  widgetName: [ 'Un', 'Deux', 'Trois' ],
  templatesDir: 'templates',
  pluginDirName: 'someplugin',
  pluginCamelHandle: 'somePlugin',
  pluginHandle: 'SomePlugin',
  dateNow: '2017-01-22T04:43:17.276Z',
  niceDate: '2017.01.22',
  copyrightNotice: 'Copyright (c) 2017 Some Author',
  pluginDownloadUrl: 'https://github.com/SomeGithub/someplugin/archive/master.zip',
  pluginDocsUrl: 'https://github.com/SomeGithub/someplugin/blob/master/README.md',
  pluginReleasesUrl: 'https://raw.githubusercontent.com/SomeGithub/someplugin/master/releases.json',
  pluginChangelogUrl: 'https://raw.githubusercontent.com/SomeGithub/someplugin/master/CHANGELOG.md',
  pluginCloneUrl: 'https://github.com/SomeGithub/someplugin.git' }
+ Creating Craft plugin folder someplugin
[ Writing ]
{ pluginName: 'Some Plugin',
  pluginDescription: 'Some Description',
  pluginVersion: '1.0.0',
  pluginAuthorName: 'Some Author',
  pluginVendorName: 'somevendor',
  pluginAuthorUrl: 'https://SomeDomain.com',
  pluginAuthorGithub: 'SomeGithub',
  codeComments: 'yes',
  pluginComponents:
   [ 'controllers',
     'consolecommands',
     'elementtypes',
     'fieldtypes',
     'models',
     'records',
     'services',
     'settings',
     'tasks',
     'twigextensions',
     'utilities',
     'variables',
     'widgets' ],
  consolecommandName: [ 'Een', 'Twee', 'Drie' ],
  controllerName: [ 'One', 'Two', 'Three' ],
  elementName: [ 'Neung', 'Song', 'Sam' ],
  fieldName: [ 'Ichi', 'Ni', 'San' ],
  modelName: [ 'Uno', 'Dos', 'Tres' ],
  purchasableName: [ '' ],
  recordName: [ 'Satu', 'Dua', 'Tiga' ],
  serviceName: [ 'Yi', 'Er', 'San' ],
  taskName: [ 'Hana', 'Dul', 'Set' ],
  utilityName: [ 'Eins', 'Zwei', 'Drei' ],
  widgetName: [ 'Un', 'Deux', 'Trois' ],
  templatesDir: 'templates',
  pluginDirName: 'someplugin',
  pluginCamelHandle: 'somePlugin',
  pluginHandle: 'SomePlugin',
  dateNow: '2017-01-22T04:43:17.276Z',
  niceDate: '2017.01.22',
  copyrightNotice: 'Copyright (c) 2017 Some Author',
  pluginDownloadUrl: 'https://github.com/SomeGithub/someplugin/archive/master.zip',
  pluginDocsUrl: 'https://github.com/SomeGithub/someplugin/blob/master/README.md',
  pluginReleasesUrl: 'https://raw.githubusercontent.com/SomeGithub/someplugin/master/releases.json',
  pluginChangelogUrl: 'https://raw.githubusercontent.com/SomeGithub/someplugin/master/CHANGELOG.md',
  pluginCloneUrl: 'https://github.com/SomeGithub/someplugin.git' }
> Writing template files
+ templates/src/_Plugin.php wrote to someplugin/src/SomePlugin.php
+ templates/src/models/_Settings.php wrote to someplugin/src/models/Settings.php
+ templates/_README.md wrote to someplugin/README.md
+ templates/_CHANGELOG.md wrote to someplugin/CHANGELOG.md
+ templates/_LICENSE.md wrote to someplugin/LICENSE.md
+ templates/_composer.json wrote to someplugin/composer.json
+ templates/src/console/controllers/_Command.php wrote to someplugin/src/console/controllers/EenController.php
+ templates/src/console/controllers/_Command.php wrote to someplugin/src/console/controllers/TweeController.php
+ templates/src/console/controllers/_Command.php wrote to someplugin/src/console/controllers/DrieController.php
+ templates/src/controllers/_Controller.php wrote to someplugin/src/controllers/OneController.php
+ templates/src/controllers/_Controller.php wrote to someplugin/src/controllers/TwoController.php
+ templates/src/controllers/_Controller.php wrote to someplugin/src/controllers/ThreeController.php
+ templates/src/elements/_Element.php wrote to someplugin/src/elements/Neung.php
+ templates/src/elements/_Element.php wrote to someplugin/src/elements/Song.php
+ templates/src/elements/_Element.php wrote to someplugin/src/elements/Sam.php
+ templates/src/fields/_Field.php wrote to someplugin/src/fields/Ichi.php
+ templates/src/fields/_Field.php wrote to someplugin/src/fields/Ni.php
+ templates/src/fields/_Field.php wrote to someplugin/src/fields/San.php
+ templates/src/templates/_components/fields/_input.twig wrote to someplugin/src/templates/_components/fields/Ichi_input.twig
+ templates/src/templates/_components/fields/_input.twig wrote to someplugin/src/templates/_components/fields/Ni_input.twig
+ templates/src/templates/_components/fields/_input.twig wrote to someplugin/src/templates/_components/fields/San_input.twig
+ templates/src/templates/_components/fields/_settings.twig wrote to someplugin/src/templates/_components/fields/Ichi_settings.twig
+ templates/src/templates/_components/fields/_settings.twig wrote to someplugin/src/templates/_components/fields/Ni_settings.twig
+ templates/src/templates/_components/fields/_settings.twig wrote to someplugin/src/templates/_components/fields/San_settings.twig
+ templates/src/resources/css/fields/_field.css wrote to someplugin/src/resources/css/fields/Ichi_field.css
+ templates/src/resources/css/fields/_field.css wrote to someplugin/src/resources/css/fields/Ni_field.css
+ templates/src/resources/css/fields/_field.css wrote to someplugin/src/resources/css/fields/San_field.css
+ templates/src/resources/js/fields/_field.js wrote to someplugin/src/resources/js/fields/Ichi_field.js
+ templates/src/resources/js/fields/_field.js wrote to someplugin/src/resources/js/fields/Ni_field.js
+ templates/src/resources/js/fields/_field.js wrote to someplugin/src/resources/js/fields/San_field.js
+ templates/src/models/_Model.php wrote to someplugin/src/models/Uno.php
+ templates/src/models/_Model.php wrote to someplugin/src/models/Dos.php
+ templates/src/models/_Model.php wrote to someplugin/src/models/Tres.php
+ templates/src/records/_Record.php wrote to someplugin/src/records/Satu.php
+ templates/src/records/_Record.php wrote to someplugin/src/records/Dua.php
+ templates/src/records/_Record.php wrote to someplugin/src/records/Tiga.php
+ templates/src/migrations/_Install.php wrote to someplugin/src/migrations/Install.php
+ templates/src/services/_Service.php wrote to someplugin/src/services/Yi.php
+ templates/src/services/_Service.php wrote to someplugin/src/services/Er.php
+ templates/src/services/_Service.php wrote to someplugin/src/services/San.php
+ templates/src/tasks/_Task.php wrote to someplugin/src/tasks/Hana.php
+ templates/src/tasks/_Task.php wrote to someplugin/src/tasks/Dul.php
+ templates/src/tasks/_Task.php wrote to someplugin/src/tasks/Set.php
+ templates/src/utilities/_Utility.php wrote to someplugin/src/utilities/Eins.php
+ templates/src/utilities/_Utility.php wrote to someplugin/src/utilities/Zwei.php
+ templates/src/utilities/_Utility.php wrote to someplugin/src/utilities/Drei.php
+ templates/src/templates/_components/utilities/_content.twig wrote to someplugin/src/templates/_components/utilities/Eins_content.twig
+ templates/src/templates/_components/utilities/_content.twig wrote to someplugin/src/templates/_components/utilities/Zwei_content.twig
+ templates/src/templates/_components/utilities/_content.twig wrote to someplugin/src/templates/_components/utilities/Drei_content.twig
+ templates/src/resources/css/utilities/_utility.css wrote to someplugin/src/resources/css/utilities/Eins.css
+ templates/src/resources/css/utilities/_utility.css wrote to someplugin/src/resources/css/utilities/Zwei.css
+ templates/src/resources/css/utilities/_utility.css wrote to someplugin/src/resources/css/utilities/Drei.css
+ templates/src/resources/js/utilities/_utility.js wrote to someplugin/src/resources/js/utilities/Eins.js
+ templates/src/resources/js/utilities/_utility.js wrote to someplugin/src/resources/js/utilities/Zwei.js
+ templates/src/resources/js/utilities/_utility.js wrote to someplugin/src/resources/js/utilities/Drei.js
+ templates/src/widgets/_Widget.php wrote to someplugin/src/widgets/Un.php
+ templates/src/widgets/_Widget.php wrote to someplugin/src/widgets/Deux.php
+ templates/src/widgets/_Widget.php wrote to someplugin/src/widgets/Trois.php
+ templates/src/templates/_components/widgets/_body.twig wrote to someplugin/src/templates/_components/widgets/Un_body.twig
+ templates/src/templates/_components/widgets/_body.twig wrote to someplugin/src/templates/_components/widgets/Deux_body.twig
+ templates/src/templates/_components/widgets/_body.twig wrote to someplugin/src/templates/_components/widgets/Trois_body.twig
+ templates/src/templates/_components/widgets/_settings.twig wrote to someplugin/src/templates/_components/widgets/Un_settings.twig
+ templates/src/templates/_components/widgets/_settings.twig wrote to someplugin/src/templates/_components/widgets/Deux_settings.twig
+ templates/src/templates/_components/widgets/_settings.twig wrote to someplugin/src/templates/_components/widgets/Trois_settings.twig
+ templates/src/resources/css/widgets/_widget.css wrote to someplugin/src/resources/css/widgets/Un.css
+ templates/src/resources/css/widgets/_widget.css wrote to someplugin/src/resources/css/widgets/Deux.css
+ templates/src/resources/css/widgets/_widget.css wrote to someplugin/src/resources/css/widgets/Trois.css
+ templates/src/resources/js/widgets/_widget.js wrote to someplugin/src/resources/js/widgets/Un.js
+ templates/src/resources/js/widgets/_widget.js wrote to someplugin/src/resources/js/widgets/Deux.js
+ templates/src/resources/js/widgets/_widget.js wrote to someplugin/src/resources/js/widgets/Trois.js
+ templates/src/templates/_settings.twig wrote to someplugin/src/templates/settings.twig
+ templates/src/translations/_en.php wrote to someplugin/src/translations/en/someplugin.php
+ templates/src/twigextensions/_TwigExtension.php wrote to someplugin/src/twigextensions/SomePluginTwigExtension.php
+ templates/src/variables/_Variable.php wrote to someplugin/src/variables/SomePluginVariable.php
+ templates/src/resources/css/_style.css wrote to someplugin/src/resources/css/SomePlugin.css
+ templates/src/resources/js/_script.js wrote to someplugin/src/resources/js/SomePlugin.js
> Copying boilerplate files
+ templates/src/icon-mask.svg copied to someplugin/src/icon-mask.svg
+ templates/src/icon.svg copied to someplugin/src/icon.svg
+ templates/src/resources/images/plugin.png copied to someplugin/src/resources/images/plugin.png
+ templates/src/resources/screenshots/plugin_logo.png copied to someplugin/src/resources/screenshots/plugin_logo.png
> Sync to file system
   create someplugin/src/SomePlugin.php
   create someplugin/src/models/Settings.php
   create someplugin/README.md
   create someplugin/CHANGELOG.md
   create someplugin/LICENSE.md
   create someplugin/composer.json
   create someplugin/src/console/controllers/EenController.php
   create someplugin/src/console/controllers/TweeController.php
   create someplugin/src/console/controllers/DrieController.php
   create someplugin/src/controllers/OneController.php
   create someplugin/src/controllers/TwoController.php
   create someplugin/src/controllers/ThreeController.php
   create someplugin/src/elements/Neung.php
   create someplugin/src/elements/Song.php
   create someplugin/src/elements/Sam.php
   create someplugin/src/fields/Ichi.php
   create someplugin/src/fields/Ni.php
   create someplugin/src/fields/San.php
   create someplugin/src/templates/_components/fields/Ichi_input.twig
   create someplugin/src/templates/_components/fields/Ni_input.twig
   create someplugin/src/templates/_components/fields/San_input.twig
   create someplugin/src/templates/_components/fields/Ichi_settings.twig
   create someplugin/src/templates/_components/fields/Ni_settings.twig
   create someplugin/src/templates/_components/fields/San_settings.twig
   create someplugin/src/resources/css/fields/Ichi_field.css
   create someplugin/src/resources/css/fields/Ni_field.css
   create someplugin/src/resources/css/fields/San_field.css
   create someplugin/src/resources/js/fields/Ichi_field.js
   create someplugin/src/resources/js/fields/Ni_field.js
   create someplugin/src/resources/js/fields/San_field.js
   create someplugin/src/models/Uno.php
   create someplugin/src/models/Dos.php
   create someplugin/src/models/Tres.php
   create someplugin/src/records/Satu.php
   create someplugin/src/records/Dua.php
   create someplugin/src/records/Tiga.php
   create someplugin/src/migrations/Install.php
   create someplugin/src/services/Yi.php
   create someplugin/src/services/Er.php
   create someplugin/src/services/San.php
   create someplugin/src/tasks/Hana.php
   create someplugin/src/tasks/Dul.php
   create someplugin/src/tasks/Set.php
   create someplugin/src/utilities/Eins.php
   create someplugin/src/utilities/Zwei.php
   create someplugin/src/utilities/Drei.php
   create someplugin/src/templates/_components/utilities/Eins_content.twig
   create someplugin/src/templates/_components/utilities/Zwei_content.twig
   create someplugin/src/templates/_components/utilities/Drei_content.twig
   create someplugin/src/resources/css/utilities/Eins.css
   create someplugin/src/resources/css/utilities/Zwei.css
   create someplugin/src/resources/css/utilities/Drei.css
   create someplugin/src/resources/js/utilities/Eins.js
   create someplugin/src/resources/js/utilities/Zwei.js
   create someplugin/src/resources/js/utilities/Drei.js
   create someplugin/src/widgets/Un.php
   create someplugin/src/widgets/Deux.php
   create someplugin/src/widgets/Trois.php
   create someplugin/src/templates/_components/widgets/Un_body.twig
   create someplugin/src/templates/_components/widgets/Deux_body.twig
   create someplugin/src/templates/_components/widgets/Trois_body.twig
   create someplugin/src/templates/_components/widgets/Un_settings.twig
   create someplugin/src/templates/_components/widgets/Deux_settings.twig
   create someplugin/src/templates/_components/widgets/Trois_settings.twig
   create someplugin/src/resources/css/widgets/Un.css
   create someplugin/src/resources/css/widgets/Deux.css
   create someplugin/src/resources/css/widgets/Trois.css
   create someplugin/src/resources/js/widgets/Un.js
   create someplugin/src/resources/js/widgets/Deux.js
   create someplugin/src/resources/js/widgets/Trois.js
   create someplugin/src/templates/settings.twig
   create someplugin/src/translations/en/someplugin.php
   create someplugin/src/twigextensions/SomePluginTwigExtension.php
   create someplugin/src/variables/SomePluginVariable.php
   create someplugin/src/resources/css/SomePlugin.css
   create someplugin/src/resources/js/SomePlugin.js
   create someplugin/src/icon-mask.svg
   create someplugin/src/icon.svg
   create someplugin/src/resources/images/plugin.png
   create someplugin/src/resources/screenshots/plugin_logo.png
[ Install ]
[ End ]
> End install commands
+ Fin. executed
Your Craft CMS plugin SomePlugin has been created.
The default LICENSE.txt is the MIT license; feel free to change it as you see fit.
> All set.  Have a nice day.
```

## Command line options

The `craftplugin` generator can also be passed arguments via the command line, bypassing the interactive prompts.  So it's possible do do something like this:

    yo craftplugin --pluginComponents="controllers,consolecommands,elementtypes,fieldtypes,models,records,services,settings,tasks,twigextensions,utilities,variables,widgets" --apiVersion="api_version_3_0" --pluginName="Some Plugin" --pluginDescription="Some Description" --pluginVersion="1.0.0" --pluginVendorName="Some Vendor" --pluginAuthorName="Some Author" --pluginAuthorUrl="https://SomeDomain.com" --pluginAuthorGithub="SomeGithub" --codeComments="yes" --consolecommandName="Een,Twee,Drie" --controllerName="One,Two,Three" --elementName="Neung,Song,Sam" --fieldName="Ichi,Ni,San" --modelName="Uno,Dos,Tres" --purchasableName="" --recordName="Satu,Dua,Tiga" --serviceName="Yi,Er,San" --utilityName="Eins,Zwei,Drei" --taskName="Hana,Dul,Set" --widgetName="Un,Deux,Trois"

Brought to you by [nystudio107](http://nystudio107.com)