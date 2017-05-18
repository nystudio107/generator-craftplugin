/* --------------------------------------------------------------------------------
    GENERATOR-CRAFTPLUGIN
    generator-craftplugin is a Yeoman generator for Craft CMS plugins

    Type just `yo craftplugin` and a new Craft CMS plugin template tailored to
    your liking will be created.
-------------------------------------------------------------------------------- */

'use strict';

/* --------------------------------------------------------------------------------
    *** Begin configuration section ***
-------------------------------------------------------------------------------- */

const PLUGIN_CONF_FILE_NAME = ".craftplugin";

const API_QUESTIONS = [
        {
            type: "list",
            name: 'apiVersion',
            message: 'Select what Craft CMS API to target:',
            choices: [
            ],
            store: true
        },
    ];

const TARGET_APIS_DIR = "/target_apis";

var apis = {};

/* --------------------------------------------------------------------------------
    *** End configuration section ***
-------------------------------------------------------------------------------- */

var yo               = require('yeoman-generator');
var chalk            = require('chalk');
var fs               = require('fs');
var child_process    = require('child_process');
var path             = require('path');
var optionOrPrompt   = require('yeoman-option-or-prompt');

var phpReservedWords = require('./php-reserved-words.js');

module.exports = yo.generators.Base.extend({

    _optionOrPrompt: optionOrPrompt,

/* -- initializing --  Your initialization methods (checking current project state, getting configs, etc) */

    initializing: function() {
        this.log(chalk.yellow.bold('[ Initializing ]'));
        var done = this.async();

        this.answers = {};
        this.askApiVersion = true;
        this.generateFullPlugin = true;
        if (fs.existsSync(PLUGIN_CONF_FILE_NAME)) {
            this.generateFullPlugin = false;
            var data = fs.readFileSync(PLUGIN_CONF_FILE_NAME);
            var obj = JSON.parse(data);
            for (var property in obj) {
                if (obj.hasOwnProperty(property)) {
                    var attributeValue = "";
                    if (Array.isArray(obj[property])) {
                        attributeValue = obj[property].join();
                    } else {
                        attributeValue = obj[property];
                    }
                    this.options[property] = [this.options[property], attributeValue].filter(function (val) {return val;}).join(',');
                }
            }
        }

/* -- Load in our API JSON configs */

        path = this.sourceRoot() + TARGET_APIS_DIR;
        fs.readdirSync(path).forEach(function(file, index) {
            var curPath = path + "/" + file;
            if (!fs.statSync(curPath).isDirectory()) {
                var ext = file.substr(file.lastIndexOf('.') + 1);
                if (ext == 'json') {
                    var data = fs.readFileSync(curPath);
                    var obj = JSON.parse(data);
/* -- Fill in the API_QUESTIONS with the found target APIs */
                    apis[obj.API_KEY] = obj;
                    API_QUESTIONS[0].choices.push({key: obj.API_KEY, name: obj.API_NAME, value: obj.API_KEY});
                    }
                }
            });

/* -- Ask them which API version they want */

        if (this.askApiVersion) {
            this._optionOrPrompt(API_QUESTIONS, function(answers) {
                this.api = apis[answers.apiVersion];
                this.apiVersion = answers.apiVersion;
/* -- Change the templates root based on the API version */
                this.sourceRoot(this.sourceRoot() + "/" + this.api.API_KEY);
                done();
                }.bind(this));
            }
        },

/* -- prompting -- Where you prompt users for options (where you'd call this.prompt()) */

    prompting: function() {
        this.log(chalk.yellow.bold('[ Prompting ]'));
        var done = this.async();

/* -- Turn the pluginComponents into an array */

        if (this.options.pluginComponents) {
            this.options.pluginComponents = this.options.pluginComponents.split(',');
            }

/* -- Change any questions with "when" properties into functions */

        for (var i = 0; i < this.api.QUESTIONS.length; i++) {
            if (this.api.QUESTIONS[i].hasOwnProperty('when')) {
                    var whatsRequired = this.api.QUESTIONS[i].when;
                    this.api.QUESTIONS[i].when = newClosure(whatsRequired);
                }
            }
/* -- Ask some questions about how they want the plugin customized */

        this._optionOrPrompt(this.api.QUESTIONS, function(answers) {
            var now = new Date();

            this.answers = answers;
            this.answers.apiVersion = this.apiVersion;
            this.rawAnswers = JSON.stringify(answers);

            if (this.api.API_KEY == "api_version_3_0") {
                // Make sure this isn't a reserved word
                if (phpReservedWords.indexOf(this.answers.pluginName.toLowerCase()) != -1) {
                    console.log("### Invalid use of a PHP reserved word as a plugin name: " + this.answers.pluginName);
                    this.answers.pluginName += "Plugin";
                }
            }
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
            this.answers.pluginIssuesUrl = "???";
            this.answers.pluginReleasesUrl = "???";
            this.answers.pluginChangelogUrl = "???";
            this.answers.pluginCloneUrl = "???";
            if (this.answers.pluginVendorName == "") {
                this.answers.pluginVendorName = this.answers.pluginAuthorGithub;
                }
            if (this.answers.pluginVendorName) {
                this.answers.pluginVendorName = this.answers.pluginVendorName.directorize();
                }
            if (this.answers.pluginAuthorGithub) {
                this.answers.pluginDownloadUrl = "https://github.com/" + this.answers.pluginAuthorGithub + "/" + this.answers.pluginDirName + "/archive/master.zip";
                this.answers.pluginCloneUrl = "https://github.com/" + this.answers.pluginAuthorGithub + "/" + this.answers.pluginDirName + ".git";
                this.answers.pluginDocsUrl = "https://github.com/" + this.answers.pluginAuthorGithub + "/" + this.answers.pluginDirName + "/blob/master/README.md";
                this.answers.pluginIssuesUrl = "https://github.com/" + this.answers.pluginAuthorGithub + "/" + this.answers.pluginDirName + "/issues";
                this.answers.pluginReleasesUrl = "https://raw.githubusercontent.com/" + this.answers.pluginAuthorGithub + "/" + this.answers.pluginDirName + "/master/releases.json";
                if (this.api.API_KEY == "api_version_3_0") {
                    this.answers.pluginChangelogUrl = "https://raw.githubusercontent.com/" + this.answers.pluginAuthorGithub + "/" + this.answers.pluginHandle.kebabize() + "/master/CHANGELOG.md";

                    this.answers.pluginDownloadUrl = "https://github.com/" + this.answers.pluginAuthorGithub + "/" + this.answers.pluginHandle.kebabize() + "/archive/master.zip";
                    this.answers.pluginCloneUrl = "https://github.com/" + this.answers.pluginAuthorGithub + "/" + this.answers.pluginHandle.kebabize() + ".git";
                    this.answers.pluginDocsUrl = "https://github.com/" + this.answers.pluginAuthorGithub + "/" + this.answers.pluginHandle.kebabize() + "/blob/master/README.md";
                    this.answers.pluginIssuesUrl = "https://github.com/" + this.answers.pluginAuthorGithub + "/" + this.answers.pluginHandle.kebabize() + "/issues";
                    this.answers.pluginReleasesUrl = "https://raw.githubusercontent.com/" + this.answers.pluginAuthorGithub + "/" + this.answers.pluginHandle.kebabize() + "/master/releases.json";
                    }
                }

/* -- Clean up the various handle names, and convert them to arrays */

            var subPrefixHandles = ["controllerName", "elementName", "fieldName", "modelName", "purchasableName", "recordName", "serviceName", "taskName", "widgetName"];
            var _this = this;

/* -- For API version 3.0x, we have a few more subPrefixHandles */
            if (_this.api.API_KEY == "api_version_3_0") {
                subPrefixHandles.push("consolecommandName");
                subPrefixHandles.push("utilityName");
                subPrefixHandles.push("cpsectionName");
                }

            subPrefixHandles.forEach(function(subElement) {
                if (typeof _this.answers[subElement] != 'undefined') {
                    _this.answers[subElement] = _this.answers[subElement].split(',');
/* -- For API version 2.5.x, prefixize() the names */
                    if (_this.api.API_KEY == "api_version_2_5") {
                        _this.answers[subElement].forEach(function(nameElement, nameIndex, nameArray) {
                            nameArray[nameIndex] = nameElement.prefixize();
                            });
                        }
/* -- For API version 3.0x, Camelize() the names */
                    if (_this.api.API_KEY == "api_version_3_0") {
                        _this.answers[subElement].forEach(function(nameElement, nameIndex, nameArray) {
                            nameArray[nameIndex] = nameElement.camelize().capitalizeFirstLetter();
                            });
                        }
                    }
                });

/* -- API version 3.0x-specific checks */
            if (_this.api.API_KEY == "api_version_3_0") {
                // Special-case for cpsections so that the default is "index"
                if ((_this.answers["cpsectionName"].length == 1) && (_this.answers["cpsectionName"][0]=="")) {
                    _this.answers["cpsectionName"] = ["Index"];
                }
                // Add an "Index" that will just redirect to the first actual CP Section
                if (_this.answers["cpsectionName"].length > 1) {
                    _this.answers["cpsectionName"].push ("Index");
                }
/* -- Make sure these defaultNameHandles have a name */
                var defaultNameHandles = ["consolecommandName", "controllerName", "modelName",  "recordName", "serviceName", "taskName", "utilityName", "widgetName"];
                defaultNameHandles.forEach(function(defaultNameElement) {
                    _this.answers[defaultNameElement].forEach(function(nameElement, nameIndex, nameArray) {
                        var defName = _this.answers.pluginHandle + defaultNameElement.capitalizeFirstLetter().slice(0, -4);
                        // Special-case for cpsections so that the default is "Default"
                        if ((defaultNameElement == "controllerName") || (defaultNameElement == "consolecommandName")) {
                            defName = "Default";
                        }
                        if (nameElement == "") {
                            nameArray[nameIndex] = defName;
                            }
                        // Make sure this isn't a reserved word
                        if (phpReservedWords.indexOf(nameElement.toLowerCase()) != -1) {
                            console.log("### Invalid use of a PHP reserved word as a component name: " + nameElement);
                            nameArray[nameIndex] = nameElement + defaultNameElement.capitalizeFirstLetter().slice(0, -4);
                        }
                        });
                    });
                }

            done();
            }.bind(this));
        },

/* -- configuring -- Saving configurations and configure the project (creating .editorconfig files and other metadata files) */

    configuring: function() {
        this.log(chalk.yellow.bold('[ Configuring ]'));

/* -- Create the destination folder */

        this.destDir = './';
        if (this.generateFullPlugin) {
            var dir = this.answers.pluginDirName;
            this.log('+ Creating Craft plugin folder ' + chalk.green(dir));
            if (!fs.existsSync(dir)){
                fs.mkdirSync(dir);
                }
            this.destDir = dir + '/';
        }

/* -- Write the answers out to a JSON file */

        fs.writeFile(this.destDir + PLUGIN_CONF_FILE_NAME, this.rawAnswers, "utf8");
        },

/* -- writing -- Where you write the generator specific files (routes, controllers, etc) */

    writing: function() {
        this.log(chalk.yellow.bold('[ Writing ]'));

/* -- Write template files */

        this.log(chalk.green('> Writing template files'));
        for (var i = 0; i < this.api.TEMPLATE_FILES.length; i++) {
            var file = this.api.TEMPLATE_FILES[i];
            var destFile;
            var skip = false;

            if ((file.subPrefix) && (typeof this.answers[file.subPrefix] == 'undefined')) {
                skip = true;
                }
            if ((typeof file.requires == 'object') && (file.requires.length)) {
                var _this = this;
                file.requires.forEach(function(thisRequires, index) {
                    if (_this.answers.pluginComponents.indexOf(thisRequires) == -1) {
                        skip = true;
                        }
                    });
                }
            if (!skip) {
                if (file.prefix) {
/* -- Handle templates that get prefixed */
                    if (file.subPrefix) {
/* -- Handle templates that have a prefix and a sub-prefix */
                        var subPrefix = this.answers[file.subPrefix];
                        var _this = this;
                        subPrefix.forEach(function(thisPrefix, index) {
                            var dirPrefix = "";
                            if (file.dirSubPrefix) {
                                dirPrefix = thisPrefix.directorize() + file.dirSubPrefix;
                            }
                            destFile = _this.destDir + file.destDir + dirPrefix + _this.answers.pluginHandle + thisPrefix + file.dest;
                            // Only write it if the file doesn't exist already
                            if (!fs.existsSync(destFile)) {
                                _this.log('+ ' + _this.answers.templatesDir + "/" + file.src + ' wrote to ' + chalk.green(destFile));
                                _this.answers['index'] = index;
                                if (file.justCopy) {
                                    _this.fs.copy(
                                        _this.templatePath(file.src),
                                        _this.destinationPath(destFile)
                                        );
                                } else {
                                    _this.fs.copyTpl(
                                        _this.templatePath(file.src),
                                        _this.destinationPath(destFile),
                                        _this.answers
                                        );
                                    }
                                }
                            });
                        } else {
/* -- Handle templates that only have a prefix */
                        var dirPrefix = "";
                        if (file.dirSubPrefix) {
                            dirPrefix = this.answers.pluginHandle.directorize() + file.dirSubPrefix;
                        }
                        if (file.lowercasePrefix)
                            destFile = this.destDir + file.destDir + dirPrefix + this.answers.pluginDirName + file.dest;
                        else
                            destFile = this.destDir + file.destDir + dirPrefix + this.answers.pluginHandle  + file.dest;
                        // Only write it if the file doesn't exist already
                        if (!fs.existsSync(destFile)) {
                            this.log('+ ' + this.answers.templatesDir + "/" + file.src + ' wrote to ' + chalk.green(destFile));
                            this.answers['index'] = 0;
                            if (file.justCopy) {
                                _this.fs.copy(
                                    _this.templatePath(file.src),
                                    _this.destinationPath(destFile)
                                    );
                            } else {
                                this.fs.copyTpl(
                                    this.templatePath(file.src),
                                    this.destinationPath(destFile),
                                    this.answers
                                    );
                                }
                            }
                        }
                    } else {
                    if (file.subPrefix) {
/* -- Handle templates that have a sub-prefix */
                        var subPrefix = this.answers[file.subPrefix];
                        var _this = this;
                        subPrefix.forEach(function(thisPrefix, index) {
                            var dirPrefix = "";
                            if (file.dirSubPrefix) {
                                dirPrefix = thisPrefix.directorize() + file.dirSubPrefix;
                                }
                            if (file.kebab) {
                                thisPrefix = thisPrefix.kebabize();
                                }
                            destFile = _this.destDir + file.destDir + dirPrefix + thisPrefix + file.dest;
                            // Only write it if the file doesn't exist already
                            if (!fs.existsSync(destFile)) {
                                _this.log('+ ' + _this.answers.templatesDir + "/" + file.src + ' wrote to ' + chalk.green(destFile));
                                _this.answers['index'] = index;
                                if (file.justCopy) {
                                    _this.fs.copy(
                                        _this.templatePath(file.src),
                                        _this.destinationPath(destFile)
                                        );
                                } else {
                                    _this.fs.copyTpl(
                                        _this.templatePath(file.src),
                                        _this.destinationPath(destFile),
                                        _this.answers
                                        );
                                    }
                                }
                            });
                        } else {
/* -- Handle templates that are not prefixed */
                        var dirPrefix = "";
                        if (file.dirSubPrefix) {
                            dirPrefix = file.dirSubPrefix;
                        }
                        destFile = this.destDir + file.destDir + dirPrefix + file.dest;
                        // Only write it if the file doesn't exist already
                        if (!fs.existsSync(destFile)) {
                            this.log('+ ' + this.answers.templatesDir + "/" + file.src + ' wrote to ' + chalk.green(destFile));
                            this.answers['index'] = 0;
                            if (file.justCopy) {
                                _this.fs.copy(
                                    _this.templatePath(file.src),
                                    _this.destinationPath(destFile)
                                    );
                            } else {
                                this.fs.copyTpl(
                                    this.templatePath(file.src),
                                    this.destinationPath(destFile),
                                    this.answers
                                    );
                                }
                            }
                        }
                    }
                }
            }

/* -- Copy boilerplate files */

        this.log(chalk.green('> Copying boilerplate files'));
        for (var i = 0; i < this.api.BOILERPLATE_FILES.length; i++) {
            var file = this.api.BOILERPLATE_FILES[i];
            var destFile = this.destDir + file.src;
            var skip = false;
            if ((typeof file.requires == 'object') && (file.requires.length)) {
                var _this = this;
                file.requires.forEach(function(thisRequires, index) {
                    if (_this.answers.pluginComponents.indexOf(thisRequires) == -1) {
                        skip = true;
                        }
                    });
                }
                if (!skip) {
                    // Only write it if the file doesn't exist already
                    if (!fs.existsSync(destFile)) {
                    this.log('+ ' + this.answers.templatesDir + "/" + file.src + ' copied to ' + chalk.green(destFile));
                    this.fs.copy(
                        this.templatePath(file.src),
                        this.destinationPath(destFile)
                        );
                    }
                }
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
        for (var i = 0; i < this.api.END_INSTALL_COMMANDS.length; i++) {
            var command = this.api.END_INSTALL_COMMANDS[i];
            this.log('+ ' + chalk.green(command.name) + ' executed');
            child_process.execSync(command.command);
        }

        this.log("Your Craft CMS plugin " + chalk.green(this.answers.pluginHandle) + " has been created.");
        this.log('The default LICENSE.txt is the ' + chalk.green('MIT license') +  '; feel free to change it as you see fit.');
        this.log(chalk.green('> All set.  Have a nice day.'));
        },

});

// Create a closure to wrap up our local scope
function newClosure(whatsRequired) {
    // Local variables that end up within closure
    var whichWhen = whatsRequired;
    return function(answers) {
                return (typeof answers.pluginComponents != 'object') ? false : (answers.pluginComponents.indexOf(whichWhen) != -1);
                };
}

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

// Return a string stripped of white space & non-alpha characters, and in CamelCase (lowercasing it first, if it has any whitespace in it)
String.prototype.camelize = function() {
    var _this = this;
    if (/\s/.test(_this)) {
       _this = _this.toLowerCase();
    }
    return _this.replace(/[^a-z0-9 ]/ig, '').replace(/(?:^\w|[A-Z]|\b\w|\s+)/g, function(match, index) {
        if (+match === 0) return ""; // or if (/\s+/.test(match)) for white spaces
        return index == 0 ? match.toLowerCase() : match.toUpperCase();
    });
}

// Return a string in kebab-case
String.prototype.kebabize = function() {
    return this.replace(/([A-Z])/g, function($1){return "-"+$1.toLowerCase();}).slice(1);
};

// Convert a string to have proceed with a _ and be camel-cased, with the first letter capitalized
String.prototype.prefixize = function() {
    if (this == "")
        return this;
    else
        return ("_" + this.camelize().capitalizeFirstLetter());
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