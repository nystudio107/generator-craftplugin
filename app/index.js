/* --------------------------------------------------------------------------------
    GENERATOR-CRAFTPLUGIN
    generator-craftplugin is a Yeoman generator for Craft CMS plugins

    Type just `yo craftplugin` and a new Craft CMS plugin template tailored to
    your liking will be created.
-------------------------------------------------------------------------------- */

'use strict';

/* --------------------------------------------------------------------------------
    *** Being configuration section ***
-------------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------------
    QUESITONS
    These are the questions that are asked prior to installation.  The variables
    set here are passed into your TEMPLATE_FILES in the form of <%= name %> for
    substitution in your templates, e.g.:

        "name": "<%= pluginName %>",

       name: the internal variable name (used for substitution)
    message: the human-readable message asked during prompting
    default: the default answer
-------------------------------------------------------------------------------- */

const QUESTIONS = [

/* -- Standard questions */

    {
	    type: "input",
        name: 'pluginName',
        message: 'Plugin name:',
        default: 'Generic'
    },
    {
	    type: "input",
        name: 'pluginDescription',
        message: 'Short description of the plugin:',
        default: 'This is a generic Craft CMS plugin'
    },
    {
	    type: "input",
        name: 'pluginVersion',
        message: 'Plugin initial version:',
        default: '1.0.0',
        store: true
    },
    {
	    type: "input",
        name: 'pluginAuthorName',
        message: 'Plugin author name:',
        default: 'John Doe',
        store: true
    },
    {
	    type: "input",
        name: 'pluginAuthorUrl',
        message: 'Plugin author URL:',
        default: 'http://DoeDesign.com/',
        store: true
    },
    {
	    type: "input",
        name: 'pluginAuthorGithub',
        message: 'Plugin author GitHub.com name:',
        store: true
    },
    {
	    type: "checkbox",
        name: 'pluginComponents',
        message: 'Select what components your plugin will have:',
        choices: [
			{
				key: "controllers",
				name: "Controllers",
				value: "controllers"
			},
			{
				key: "elementtypes",
				name: "ElementTypes",
				value: "elementtypes"
			},
			{
				key: "fieldtypes",
				name: "FieldTypes",
				value: "fieldtypes"
			},
			{
				key: "models",
				name: "Models",
				value: "models"
			},
			{
				key: "records",
				name: "Records",
				value: "records"
			},
			{
				key: "services",
				name: "Services",
				value: "services"
			},
			{
				key: "twigextensions",
				name: "TwigExtensions",
				value: "twigextensions"
			},
			{
				key: "variables",
				name: "Variables",
				value: "variables"
			},
		],
        store: true
    },
    
/* -- Questions dependent on pluginComponents choices */

    {
		when: function (answers) {
			return (answers.pluginComponents.indexOf('elementtypes') != -1);
		},
	    type: "input",
        name: 'elementName',
        message: 'Name of your ElementType:',
        default: '',
        store: false
    },
    {
		when: function (answers) {
			return (answers.pluginComponents.indexOf('fieldtypes') != -1);
		},
	    type: "input",
        name: 'fieldName',
        message: 'Name of your FieldType:',
        default: '',
        store: false
    },
    {
		when: function (answers) {
			return (answers.pluginComponents.indexOf('models') != -1);
		},
	    type: "input",
        name: 'modelName',
        message: 'Name of your Model:',
        default: '',
        store: false
    },
    {
		when: function (answers) {
			return (answers.pluginComponents.indexOf('records') != -1);
		},
	    type: "input",
        name: 'recordName',
        message: 'Name of your Record:',
        default: '',
        store: false
    },

];

/* --------------------------------------------------------------------------------
    TEMPLATE_FILES
    Files that are parsed as templates with the 'answers' context, to allow for
    variable substitution while copying them from `src:` to `dest:`

        src: the source path for the file, relative to the 'templates' directory
    destDir: the destination path for the file, relative to the project directory
       dest: the destination name for the file, relative to the project directory
     prefix: should the file be prefixed with the plugin name?
-------------------------------------------------------------------------------- */

const TEMPLATE_FILES = [
    {
        src: "_Plugin.php",
        destDir: "",
        dest: "Plugin.php",
        requires: "",
        prefix: true
    },
    {
        src: "_PluginWithTwig.php",
        destDir: "",
        dest: "Plugin.php",
        requires: "twigextensions",
        prefix: true
    },
    {
        src: "_README.md",
        destDir: "",
        dest: "README.md",
        prefix: false
    },
    {
        src: "_LICENSE.txt",
        destDir: "",
        dest: "LICENSE.txt",
        prefix: false
    },
    {
        src: "_releases.json",
        destDir: "",
        dest: "releases.json",
        prefix: false
    },
    {
        src: "controllers/_Controller.php",
        destDir: "controllers/",
        dest: "Controller.php",
        requires: "controllers",
        prefix: true
    },
    {
        src: "elementtypes/_ElementType.php",
        destDir: "elementtypes/",
        dest: "ElementType.php",
        requires: "elementtypes",
        subPrefix: "elementName",
        prefix: true
    },
    {
        src: "fieldtypes/_FieldType.php",
        destDir: "fieldtypes/",
        dest: "FieldType.php",
        requires: "fieldtypes",
        subPrefix: "fieldName",
        prefix: true
    },
    {
        src: "templates/_field.html",
        destDir: "templates/",
        dest: "field.html",
        requires: "fieldtypes",
        prefix: false
    },
    {
        src: "resources/css/_field.css",
        destDir: "resources/css/",
        dest: "field.css",
        requires: "fieldtypes",
        prefix: false
    },
    {
        src: "resources/js/_field.js",
        destDir: "resources/js/",
        dest: "field.js",
        requires: "fieldtypes",
        prefix: false
    },
    {
        src: "models/_Model.php",
        destDir: "models/",
        dest: "Model.php",
        requires: "models",
        subPrefix: "modelName",
        prefix: true
    },
    {
        src: "records/_Record.php",
        destDir: "records/",
        dest: "Record.php",
        requires: "records",
        subPrefix: "recordName",
        prefix: true
    },
    {
        src: "services/_Service.php",
        destDir: "services/",
        dest: "Service.php",
        requires: "services",
        prefix: true
    },
    {
        src: "templates/_settings.html",
        destDir: "templates/",
        dest: "settings.html",
        prefix: false
    },
    {
        src: "translations/_en.php",
        destDir: "translations/",
        dest: "en.php",
        prefix: false
    },
    {
        src: "twigextensions/_TwigExtension.php",
        destDir: "twigextensions/",
        dest: "TwigExtension.php",
        requires: "twigextensions",
        prefix: true
    },
    {
        src: "variables/_Variable.php",
        destDir: "variables/",
        dest: "Variable.php",
        requires: "variables",
        prefix: true
    },
    {
        src: "resources/css/_style.css",
        destDir: "resources/css/",
        dest: "style.css",
        prefix: false
    },
    {
        src: "resources/js/_script.js",
        destDir: "resources/js/",
        dest: "script.js",
        prefix: false
    },
];

/* --------------------------------------------------------------------------------
    BOILERPLATE_FILES
    Individual files that we copy wholesale from 'templates' to the destination
    
     src: the source path of the file, relative to the 'templates' directory
-------------------------------------------------------------------------------- */

const BOILERPLATE_FILES = [
    {
        src: "resources/icon-mask.svg"
    },
    {
        src: "resources/icon.svg"
    },
    {
        src: "resources/images/plugin.png"
    },
    {
        src: "resources/screenshots/plugin_logo.png"
    },
];

/* --------------------------------------------------------------------------------
    END_INSTALL_COMMANDS
    A list of arbitrary shell commands to execute in sequence at the [ End ] phase
    of the generator

       name: The human-readable name of the command
    command: the shell command to be executed
-------------------------------------------------------------------------------- */

const END_INSTALL_COMMANDS = [
    {
        name: "Fin.",
        command: "echo 'Fin.'"
    },
];

/* --------------------------------------------------------------------------------
    *** End configuration section ***
-------------------------------------------------------------------------------- */

var yo              = require('yeoman-generator');
var chalk           = require('chalk');
var fs              = require('fs');
var child_process   = require('child_process');
var path            = require('path');

module.exports = yo.generators.Base.extend({
    
/* -- initializing --  Your initialization methods (checking current project state, getting configs, etc) */

    initializing: function() {
        this.log(chalk.yellow.bold('[ Initializing ]'));
        
        this.answers = {};
        
        },

/* -- prompting -- Where you prompt users for options (where you'd call this.prompt()) */

    prompting: function() {
        this.log(chalk.yellow.bold('[ Prompting ]'));

        var done = this.async();

/* -- Ask them the name they want for this app */

        this.prompt(QUESTIONS, function(answers) {
	        	var now = new Date();
	        	
                this.answers = answers;
                this.answers.templatesDir = 'templates';
                this.answers.pluginDirName = this.answers.pluginName.directorize();
                this.answers.pluginCamelHandle = this.answers.pluginName.camelize();
                this.answers.pluginHandle = this.answers.pluginCamelHandle.capitalizeFirstLetter();

/* -- Auto-fill some variables we'll be using in our templates */

                this.answers.dateNow = now.toISOString();
                this.answers.niceDate = now.yyyymmdd();

                this.answers.copyrightNotice = "Copyright (c) " + now.getFullYear() + " " + this.answers.pluginAuthorName;
                this.answers.pluginDownloadUrl = "???";
                this.answers.pluginDocsUrl = "???";
                this.answers.pluginReleasesUrl = "???";
                this.answers.pluginCloneUrl = "???";
                if (this.answers.pluginAuthorGithub) {
                	this.answers.pluginDownloadUrl = "https://github.com/" + this.answers.pluginAuthorGithub + "/" + this.answers.pluginDirName + "/archive/master.zip";
                	this.answers.pluginDocsUrl = "https://github.com/" + this.answers.pluginAuthorGithub + "/" + this.answers.pluginDirName + "/blob/master/README.md";
                	this.answers.pluginReleasesUrl = "https://raw.githubusercontent.com/" + this.answers.pluginAuthorGithub + "/" + this.answers.pluginDirName + "/master/releases.json";
                	this.answers.pluginCloneUrl = "https://github.com/" + this.answers.pluginAuthorGithub + "/" + this.answers.pluginDirName + ".git";
                	}
                done();
            }.bind(this));;
        },
        
/* -- configuring -- Saving configurations and configure the project (creating .editorconfig files and other metadata files) */

    configuring: function() {
        this.log(chalk.yellow.bold('[ Configuring ]'));
        this.log(this.answers);

/* -- Create the destination folder */

		var dir = this.answers.pluginDirName;
        this.log('+ Creating Craft plugin folder ' + chalk.green(dir));
		if (!fs.existsSync(dir)){
		    fs.mkdirSync(dir);
			}
		this.destDir = dir + '/';
        },
        
/* -- writing -- Where you write the generator specific files (routes, controllers, etc) */

    writing: function() {
        this.log(chalk.yellow.bold('[ Writing ]'));
    
/* -- Write template files */

        this.log(chalk.green('> Writing template files'));
        for (var i = 0; i < TEMPLATE_FILES.length; i++) {
            var file = TEMPLATE_FILES[i];
            var destFile;
            var skip = false;
			
			if (file.requires) {
	            if (this.answers.pluginComponents.indexOf(file.requires) == -1) {
		            skip = true;
	            	}
            	}
            if (!skip) {
	            if (file.prefix) {
		            var subPrefix = "";
		            if (file.subPrefix) {
			            subPrefix = "_" + this.answers[file.subPrefix];
		            }
	            	destFile = this.destDir + file.destDir + this.answers.pluginHandle + subPrefix + file.dest;
	            	}
	            else
	            	destFile = this.destDir + file.destDir + file.dest;
	            this.log('+ ' + this.answers.templatesDir + "/" + file.src + ' wrote to ' + chalk.green(destFile));
	            this.fs.copyTpl(
	                this.templatePath(file.src),
	                this.destinationPath(destFile),
	                this.answers
					);
				}
			}

/* -- Copy boilerplate files */

        this.log(chalk.green('> Copying boilerplate files'));
        for (var i = 0; i < BOILERPLATE_FILES.length; i++) {
            var file = BOILERPLATE_FILES[i];
            var destFile = this.destDir + file.src;
            this.log('+ ' + this.answers.templatesDir + "/" + file.src + ' copied to ' + chalk.green(destFile));
            this.fs.copy(
                this.templatePath(file.src),
                this.destinationPath(destFile)
				);
        	}


	    this.log(chalk.green('> Sync to file system'));
	    },
        
/* -- install -- Where installation are run (npm, bower) */

    install: function() {
        this.log(chalk.yellow.bold('[ Install ]'));

        },
        
/* -- end - Called last, cleanup, say good bye, etc */

    end: function() {
        this.log(chalk.yellow.bold('[ End ]'));      

/* -- Craft base plugins */

        this.log(chalk.green('> End install commands'));
        for (var i = 0; i < END_INSTALL_COMMANDS.length; i++) {
            var command = END_INSTALL_COMMANDS[i];
            this.log('+ ' + chalk.green(command.name) + ' executed');
            child_process.execSync(command.command);
        }

        this.log("Your Craft CMS plugin " + chalk.green(this.answers.pluginHandle) + " has been created.");
        this.log('The default LICENSE.txt is the ' + chalk.green('MIT license') +  '; feel free to change it as you see fit.');
        this.log(chalk.green('> All set.  Have a nice day.'));
        },
        
});  

// Return a date in YYYY.MM.DD format
Date.prototype.yyyymmdd = function() {
   //Grab each of your components
   var yyyy = this.getFullYear().toString();
   var MM = (this.getMonth()+1).toString();
   var dd  = this.getDate().toString();

   //Returns your formatted result
  return yyyy + '.' + (MM[1]?MM:"0"+MM[0]) + '.' + (dd[1]?dd:"0"+dd[0]);
};

// Return a string stripped of non-alpha characters, and replace spaces with _'s
String.prototype.directorize = function() {
  return this.toLowerCase().replace(/\W/g, '');
}

// Return a string stripped of white space & non-alpha characters, and in CamelCase
String.prototype.camelize = function() {
  return this.replace(/[^a-z ]/ig, '').replace(/(?:^\w|[A-Z]|\b\w|\s+)/g, function(match, index) {
    if (+match === 0) return ""; // or if (/\s+/.test(match)) for white spaces
    return index == 0 ? match.toLowerCase() : match.toUpperCase();
  });
}

// Capitalize the first letter of a string
String.prototype.capitalizeFirstLetter = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

// Mimic PHP's in_array()
if (!Array.prototype.indexOf)
{
  Array.prototype.indexOf = function(elt /*, from*/)
  {
    var len = this.length >>> 0;

    var from = Number(arguments[1]) || 0;
    from = (from < 0)
         ? Math.ceil(from)
         : Math.floor(from);
    if (from < 0)
      from += len;

    for (; from < len; from++)
    {
      if (from in this &&
          this[from] === elt)
        return from;
    }
    return -1;
  };
}