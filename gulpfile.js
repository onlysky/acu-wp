/*!TODO! - Todo List:
------------------------------------------------------------------------

+ Use theme options for various things.
	- createa default options file that gets copied into options.json on npm install, and don't track options.json since it contains sensitive info.



+ Add Twig Support

+ gulp-newer (https://www.npmjs.com/package/gulp-newer) vs gulp-changed?

+ READ THIS: 
	- command line args and prompts - http://fettblog.eu/gulp-recipes-part-2/
	+ http://loige.co/gulp-and-ftp-update-a-website-on-the-fly/
	- http://stefanimhoff.de/2014/gulp-tutorial-1-intro-setup/
	- http://blog.rangle.io/angular-gulp-bestpractices/
	- https://github.com/vigetlabs/gulp-starter/tree/master/gulpfile.js/tasks
	- http://ponyfoo.com/articles/my-first-gulp-adventure
	- https://github.com/40Digits/gulp-eta
	- https://github.com/netsells/gulp
	+ https://ahmadawais.com/my-advanced-gulp-workflow-for-wordpress-themes/
	
	+ http://browserify.org/
		- https://www.youtube.com/watch?v=OQk2MhdzIHo&feature=iv&src_vid=78_iyqT-qT8&annotation_id=annotation_1772568231
		- https://viget.com/extend/gulp-browserify-starter-faq
		- https://gist.github.com/ktmud/9384509
		- https://github.com/sogko/gulp-recipes/tree/master/browserify-separating-app-and-vendor-bundles
		- https://github.com/eugeneware/debowerify

		- https://github.com/substack/watchify
		- https://github.com/gulpjs/gulp/blob/master/docs/recipes/fast-browserify-builds-with-watchify.md

+ bower assets
	+ use bower for scss vendor files, in addition to whatever is in the vendor's folder... concat the files and add to theme-vendor.scss (or change the name from theme-vendor to just vendor)
		- reset.css
		- normalize.css
	
	+ run css clean (remove unused css) from bourbon?

	+ Optionally use CDN vs Bower for vendor files
		- https://github.com/sindresorhus/gulp-google-cdn
		- https://github.com/OverZealous/gulp-cdnizer

+ Add a living stylesheet for build page.
	- https://github.com/davidhund/styleguide-generators#user-content-grunt--gulp-tasks
	- http://styleguides.io/tools.html
	- http://www.smashingmagazine.com/2015/03/automating-style-guide-driven-development/

	- http://warpspire.com/kss/

	- https://github.com/fbrctr/fabricator
		- https://www.youtube.com/watch?v=onQf0gPAEM8
	- https://github.com/SC5/sc5-styleguide
	- http://patternlab.io/
	- https://trulia.github.io/hologram/
	- https://github.com/livingstyleguide/livingstyleguide#readme
		- https://github.com/efacilitation/gulp-livingstyleguide
	- http://sourcejs.com/

	- https://frontify.com/styleguide
	- http://patternry.com/

Git + Wordpress
	- https://plausiblethought.net/wordpress-git-workflow/
	- http://roybarber.com/version-controlling-wordpress/

	- https://gist.github.com/therealklanni/9966d215d2b13a9c0e6e
	
	+ Setup command line WP installs
		- so that entire site can be installed by command line
		- http://wp-cli.org/
		- http://wp-cli.org/blog/scaffolding-custom-post-types-and-taxonomies.html

	+ CI 
		- https://travis-ci.org/
		- http://www.sitepoint.com/supercharge-continuous-delivery-jenkins-workflow-plugin/


+ Revision static assets (images, js, css) (see notes)
	- make this optional: either thru option (gulpif, easier?) or via different tasks (more work?)
	- Add references to revised assets in template files / WP
	- Add caching policy to headers (investigate CDN setup)
	- Notes: 
	- https://github.com/raulghm/gulp-wp-rev
	- https://github.com/galkinrost/gulp-rev-css-url
	- https://github.com/smysnk/gulp-rev-all
	- http://stefanimhoff.de/2014/gulp-tutorial-13-revisioning/
	- https://www.mobify.com/blog/beginners-guide-to-http-cache-headers/
	- https://www.tipsandtricks-hq.com/how-to-add-far-future-expires-headers-to-your-wordpress-site-1533

	+ Version the theme package ( for WP and for package.json)
		- http://gomakethings.com/automating-css-and-js-cache-busting-with-gulp-and-wordpress

+ Break out gulp configuration to a json file or other external file from the gulpfile
	- rework the path configs
	- Breakout gulp tasks: https://www.npmjs.com/package/gulp-load-tasks
	
	DONE -  Move variables into objects 
		- http://www.mikestreety.co.uk/blog/an-advanced-gulpjs-file

+ Clean build and dist folders on run

+ add gulp task listing - https://github.com/OverZealous/gulp-task-listing

+ Investigate SASS @import caching
	- https://github.com/robrichard/gulp-newer-sass

DONE + fine tune which files browsersync is watching
	- http://www.browsersync.io/docs/options/

+ Conditionally use sprites instead of icons?
	- Investigate Automatic spritesheets - //https://github.com/sprity/sprity
	- https://github.com/twolfson/gulp.spritesmith

+ Automatic screenshot
	- Create an automatic screenshot if option is set to true or if screenshot is missing?
	- https://github.com/danielhusar/gulp-local-screenshots

+ Add a header to files
	- add to css? 
	- add to php... php docs?

+ Critical CSS (load css before fold)
	- https://github.com/filamentgroup/criticalCSS
+ Do Linting

	+ Add CSS linting

	+ Add PHP linting?
		- http://marcofranssen.nl/using-gulp-js-to-check-your-code-quality/
		- https://sites.lafayette.edu/fultonc/2014/10/13/gulp-its-code-checker/
		- https://github.com/wayneashleyberry/phplint
			- 	//phplint 	= require('phplint').lint 						// PHP Linting - https://github.com/wayneashleyberry/phplint

		- https://github.com/squizlabs/PHP_CodeSniffer#installation
		- https://github.com/JustBlackBird/gulp-phpcs
		- https://github.com/clarkeash/gulp-php-cs-fixer
		- https://github.com/kid-icarus/gulp-phpmd


	+ Add JS linting
		- https://github.com/jscs-dev/gulp-jscs
		- https://www.npmjs.com/package/gulp-jscs-stylish

	+ Make Linting output optional
		- Gulpif and yargs?
		- https://github.com/bguiz/task-yargs

+ Test icon fonts
	- https://github.com/johanbrook/gulp-fontcustom

+ implement all reporting and analytics
	- http://ponyfoo.com/articles/measure-optimize-automate
	- http://seesparkbox.com/foundry/automating_performance_testing_with_gulp
	- http://perf-tooling.today/tools
	- https://github.com/johnpapa/gulp-patterns

	- checkout modules already installed
	- https://github.com/andyshora/grunt-yslow
	- //https://github.com/addyosmani/psi
	- //https://github.com/es-analysis/plato
	- //https://github.com/AvraamMavridis/gulp-louis
	- //https://github.com/assetgraph/assetgraph
	- //https://github.com/pagespeed/mod_pagespeed

+ testing
	- http://ponyfoo.com/articles/browser-test-automation-dreams
	- https://geowarin.github.io/coverage-with-gulp-phantom-and-mocha.html
	
	- http://dalekjs.com/pages/documentation.html
	- http://phantomjs.org/headless-testing.html
	- http://casperjs.org/
	- http://zombie.js.org/
	- https://github.com/yguan/browser-automation
	- https://github.com/matoilic/gulp-browserstack

+ Decide on license to use
	- Talk to salar about open sourcing the framework
	+ Make the starter theme available on git

DONE + add icons to gulp notifications
	- https://github.com/mikaelbr/gulp-notify/blob/master/examples/gulpfile.js#L64-L74


+ Deploy theme as a yeoman generator
------------------------------------------------------------------------
	- Through this app? https://github.com/yeoman/yeoman-app (http://electron.atom.io/)
+ WordPress bundle (theme + plugins + uploads)



WP STUFF:
------------------------------------------------------------------------
+ Create a package that delivers WP bundle
	+ theme
	+ plugins
	+ uploads folder
	+ database
+ use command line to deploy new theme




!TODO! - Investigate plugins:
------------------------------------------------------------------------
//https://github.com/tounano/gulp-update
//https://github.com/stevelacy/gulp-bump
//https://github.com/hughsk/gulp-duration
https://www.npmjs.com/package/gulp-flatten
https://www.npmjs.com/package/gulp-gitignore
https://www.npmjs.com/package/load-gulp-tasks

//https://github.com/austinpray/asset-builder
//https://github.com/taptapship/wiredep
//https://github.com/mahnunchik/gulp-responsive

https://github.com/ahaurw01/gulp-remember
https://github.com/pgherveou/gulp-file-cache

//https://github.com/jas/gulp-preprocess
//https://github.com/jonkemp/gulp-useref

//https://github.com/Wenqer/gulp-base64

/* NOTES
------------------------------------------------------------------------


*/

/*====================================================
=                  Theme & Gulp Setup                =
====================================================*/
	
/*---------------  Project Variables  --------------*/

var project     = 'acu-wp',							// Project Name
	url         = 'acu.dev', 						// Development URL (For Proxy)
	version 	= '1.0',							// Package Version

	/* Destinations */
	source      = 'src/', 							// Source Files
    build       = 'build/', 						// Build Directory
    dist        = 'dist/' + project + '/', 			// Distribution Directory
    lib 		= 'lib/',							// Development Files Library Directory
    
    bower       = 'lib/vendor/bower_components/',	// Bower Component Files

    sass 		= source + 'styles/**/*.scss',		// SCSS/SASS Files
    templates 	= source + 'templates/**/*.php',	// Template Files
    lang        = 'languages/';						// Language Files

var package		= require('./package.json'),		// Get details from package.json
	options		= require('./options.json'),		// Get development options from options.json
    theme		= require('./src/theme.json'),		// Get theme details from theme.json

    /* Base Paths */
	paths 		=  {
		root 		: './',									// Root Project Directory
		source      : './src/', 							// Source Files
	    build       : './build/', 							// Build Directory
	    dist        : './dist/' + theme.name + '/', 		// Distribution Directory
	    lib 		: './lib/',								// Development Files Library Directory
		bower 		: './lib/vendor/bower_components/'		// Bower Component Files
    },

    /* Asset Paths */
    assets 		= {

    	/* Styles Paths */
		styles 	: {
			src 	 : 	paths.source + 'styles/',
			build 	 : 	paths.build + 'css/',
			dist 	 : 	paths.dist + 'css/',
			
			fonts 	 :  paths.source + 'styles/typography/fonts/theme-fonts/',
			stylesrc :  [										// SCSS Source Files Only (Minus Fonts & Styleguide Edits)
								  paths.source + 'styles/' +'**/*.scss', 
							'!' + paths.source + 'styles/typography/fonts/icon-font/template/**/*.*',
							'!' + paths.source + 'styles/styleguide/**/*.*'
						]								
		},

		/* Scripts Paths */
		scripts : {

				src 	: 	paths.source + 'scripts/',
				build 	: 	paths.build + 'assets/js/',
				dist 	: 	paths.dist + 'assets/js/'
		},

		/* Template Paths */
		templates : {
				src 	: 	paths.source + 'templates/',
				build 	: 	paths.build,
				dist 	: 	paths.dist
		},

		/* Include Paths */
		includes : {
				src 	:   paths.source + 'includes/',
				build 	: 	paths.build + 'includes/',
				dist 	: 	paths.dist + 'includes/'
		},

		/* Images Paths */
		images : {

				src 	: 	paths.source + 'images/',
				build 	: 	paths.build + 'assets/img/',
				dist 	: 	paths.dist + 'assets/img/'
		}
	}
;

/*-----------  Gulp Settings & Plugins  -----------*/
var gulp        = require('gulp'),								// Initialize Gulp
	path 		= require("path"),								// Node Path module - https://github.com/jinder/path
	argv 		= require('yargs').argv;						// Arguments for gulp tasks - https://github.com/bcoe/yargs

    /* Gulp plugins */
	plugins 	= require('gulp-load-plugins')({				// Automatically load all Gulp plugins - https://github.com/jackfranklin/gulp-load-plugins
		lazy: true,													// Lazy load plugins
		pattern: ['*', '!gulp'], 									// The glob(s) to search for (include all modules, exlcude gulp)
		rename: {
																	// A mapping of plugins to rename
			/* Node plugins */
			'browser-sync'				: 'browserSync',				// Sync multiple browsers & devices + live reloading - https://github.com/Browsersync/browser-sync
			'run-sequence'				: 'runSequence',				// Run a sequence of gulp tasks in a specified order - https://github.com/OverZealous/run-sequence
			'del'						: 'del',						// Delete files or folders using globs - https://github.com/sindresorhus/del
			'opn'						: 'open',						// Open websites, files and executables - https://github.com/sindresorhus/opn
			'merge-stream'				: 'merge',						// Merge vinyl streams - https://github.com/grncdr/merge-stream
			'vinyl-source-stream'		: 'vinylSource',				// Use text streams at start of gulp pipelines - https://github.com/hughsk/vinyl-source-stream
			'browserify'				: 'browserify',					// Run modules in browser with dependency bundling - https://github.com/substack/node-browserify#usage
			'watchify'					: 'watchify',					// Watch mode for browserify builds - https://github.com/substack/watchify
			'vinyl-ftp'					: 'ftp',						// FTP files to a server - https://github.com/morris/vinyl-ftp

			'pretty-error'				: 'prettyError',				// Display "pretty errors" for node.js errors - https://github.com/AriaMinaei/pretty-error
			'jshint-stylish'			: 'jsHintStyl',					// Javascript Linter stylish reporting - https://github.com/sindresorhus/jshint-stylish
			'pageres'					: 'pageres',					// Capture screenshots of webites at various resolutions - https://github.com/sindresorhus/pageres
			
			/* Gulp Plugins */

			/* General Utilities */
            'gulp-header'				: 'header',						// Add a header to files - https://github.com/tracker1/gulp-header
            'gulp-notify'            	: 'notify',                     // Send notification messages from Gulp - https: //github.com/mikaelbr/gulp-notify
            'gulp-if'            		: 'gulpif',                     // Conditionally run tasks - https: //github.com/robrich/gulp-if
            'gulp-plumber'				: 'plumber',                    // Fixes issues with Node Streams piping - https: //github.com/floatdrop/gulp-plumber
            'gulp-consolidate'			: 'consolidate',                // Template engine consolidation using consolidate.js - https: //github.com/timrwood/gulp-consolidate
            'gulp-concat'            	: 'concat',                     // Concatenate files - https: //github.com/contra/gulp-concat
            'gulp-changed'				: 'changed',                    // Only pass through changed files - https: //github.com/sindresorhus/gulp-changed
            'gulp-cached'            	: 'cached',                     // Cache files passing through pipe - https: //github.com/contra/gulp-cached
            'gulp-rename'            	: 'rename',                     // Rename files - https: //github.com/hparra/gulp-rename
            'gulp-replace'				: 'replace',					// Replace strings in files - https://github.com/lazd/gulp-replace
            'gulp-copy'					: 'copy',                       // Copy source files to new destination and use destination as new source - https: //github.com/klaascuvelier/gulp-copy
            'gulp-ignore'            	: 'ignore',                     // Ignore files/conditions - https: //github.com/robrich/gulp-ignore
            'gulp-filter'            	: 'filter',                     // Filter a subset of files using globbing - https: //github.com/sindresorhus/gulp-filter
            'gulp-substituter'   		: 'substituter',                // Replace matched strings in files for defined values - https: //github.com/madebysource/gulp-substituter
            'gulp-rev'           		: 'rev',                        // Asset revisioning by setting filename hash - https: //github.com/sindresorhus/gulp-rev
            'gulp-git'           		: 'git',                        // Run Git commands from Gulp - https: //github.com/stevelacy/gulp-git
            'gulp-zip'           		: 'zip',                        // Zip compress files - https: //github.com/sindresorhus/gulp-zip
            'gulp-main-bower-files'    	: 'mainBowerFiles',             // Get main files used in Bower dependencies
            'gulp-debug'             	: 'debug',                      // Show which files are running through pipe - https: //github.com/sindresorhus/gulp-debug
            'gulp-wp-rev'				: 'wpRev',						// Revision JS and CSS assets for WP - https://github.com/raulghm/gulp-wp-rev
            'gulp-config-sync'			: 'configSync',					// Synchronize configuration files (package.json, bower.json, compoment.json...) - https://github.com/danlevan/gulp-config-sync
            'gulp-license'				: 'license',					// Add licenses to gulp streams - https://github.com/terinjokes/gulp-license
            'gulp-template'				: 'template',					// Lodash templates for gulp - https://github.com/sindresorhus/gulp-template
            'gulp-data'					: 'data',						// Inject data into templates - https://github.com/colynb/gulp-data
            'gulp-tap'					: 'tap',						// Tap into gulp streams - https://github.com/geejs/gulp-tap
            'gulp-util'					: 'gutil', 						// Utilities for Gulp plugins - https: //github.com/gulpjs/gulp-util

            //!TODO! Remove if unused: 'gulp-strip-json-comments' 	: 'stripCommentsJSON',			// Strip comments from JSON - https://github.com/sindresorhus/gulp-strip-json-comments

			/* HTML */
			'gulp-minify-html'			: 'minifyHTML', 				// Minify htmly with Minimize library - https://github.com/murphydanger/gulp-minify-html
			
			/* PHP */
			'gulp-phpcbf'				: 'phpcbf',						// PHP Code Beautifier - https://github.com/gaving/gulp-phpcbf

		    /* CSS/SASS */
            'node-neat'					: 'neat',						// Bourbon Neat for Node - https://github.com/lacroixdesign/node-neat					
            'gulp-sass'         		: 'sass',                       // Compile SASS code with Gulp - https: //github.com/dlmanning/gulp-sass
            'gulp-autoprefixer' 		: 'autoprefixer',               // Automatically add browser CSS prefixes - https: //github.com/sindresorhus/gulp-autoprefixer
            'gulp-minify-css'   		: 'cssmin',                     // Minify CSS - https: //github.com/murphydanger/gulp-minify-css
            'gulp-concat-css'   		: 'concatCSS',                  // Concatenate CSS files - https: //github.com/mariocasciaro/gulp-concat-css
            'gulp-uncss'        		: 'uncss',                      // Remove unused CSS selectors - https: //github.com/ben-eb/gulp-uncss
            'gulp-scss-lint'    		: 'scssLint',                   // SASS/SCSS Linter - https: //github.com/juanfran/gulp-scss-lint
    		'sc5-styleguide'			: 'styleguide',					// SC5 Styleguide - https://github.com/SC5/sc5-styleguide
          	
          	//!TODO - Not currently working with gulp-csslint -> https: //github.com/lazd/gulp-csslint/pull/29 
			//'csslint-stylish'			: 'cssLintStylish',				// CSS Linter Stylish - https: //github.com/simenb/csslint-stylish


            /* Javascript */
            'gulp-uglify'         		: 'uglify',                     // Minifiy javascript files - https: //github.com/terinjokes/gulp-uglify
            'gulp-autopolyfiller'   	: 'autopolyfiller',             // Automatic javascript polyfills - https: //github.com/azproduction/gulp-autopolyfiller
            'gulp-strip-debug'      	: 'stripDebug',                 // Strips console.log and debug statments - https: //github.com/sindresorhus/gulp-strip-debug 
            'gulp-sourcemaps'       	: 'sourcemaps',                 // Generate sourcemaps for files - https: //github.com/floridoo/gulp-sourcemaps

            /* Images */
            'gulp-imagemin'      		: 'imagemin',                   // Minify images - https: //github.com/sindresorhus/gulp-imagemin
            'gulp-webp'          		: 'webp',                       // WebP image converter - https: //github.com/sindresorhus/gulp-webp
            'gulp-svgmin'           	: 'svgmin',                     // Minify SVG files - https: //github.com/ben-eb/gulp-svgmin
            'gulp-sprites-preprocessor' : 'sprites',          			// Generate sprites from CSS file - https: //github.com/madebysource/gulp-sprites-preprocessor
            'gulp-iconfont'      		: 'iconfont',                   // Create icon fonts from svgs - https: //github.com/nfroidure/gulp-iconfont
                
            /* Reporting & Analysis */
            'gulp-jscpd'             	: 'jscpd',                      // Javascript Copy/Paste detector - https: //github.com/yannickcr/gulp-jscpd
            'gulp-complexity'        	: 'complexity',                 // Javascript complexity analysis - https: //github.com/alexeyraspopov/gulp-complexity
            'gulp-buddy.js'       		: 'buddyjs',                    // Javascript "Magic Number" detection - https: //github.com/Semigradsky/gulp-buddy.js
            'gulp-jshint'           	: 'jsHint',                     // Javascript Linter - https: //github.com/spalger/gulp-jshint
            'gulp-htmlhint'      		: "htmlHint",                   // HTML Linter - https: //github.com/bezoerb/gulp-htmlhint
            //!TODO not using so far... 'gulp-csslint'       		: 'cssLint',                    // CSS Linter - https: //github.com/lazd/gulp-csslint
            'gulp-phpcs'       			: 'phpcs',						// PHP Code Sniffer - https://github.com/JustBlackBird/gulp-phpcs

            'gulp-scss-lint-stylish' 	: 'scssLintStylish',            // SASS/SCSS Linter Stylish - https: //github.com/roeldev/gulp-scss-lint-stylish
            'gulp-size'          		: 'size',                       // Display the size of the project - https: //github.com/sindresorhus/gulp-size
            'gulp-filesize'      		: 'filesize'                   	// Log filesizes in console - https: //github.com/Metrime/gulp-filesize
	    }
	})
;

plugins.prettyError.start();											// Start Pretty Errors Plugin


/* Gulp Dev Tools */
module.exports 	= gulp;													// Gulp Chrome extension - https://github.com/niki4810/gulp-devtools
//Run gulp-devtools in a directory with a gulpfile!

/*=============================================
=            Functions & Templates            =
=============================================*/
var reload      = plugins.browserSync.reload,                           // Reload Call for BrowserSync
	stream 		= plugins.browserSync.stream,							// Stream Call for BrowserSync
	timeStamp   = Math.round(Date.now()/1000);                          // Create a timestamp

/* Get gulp task name for current task */
gulp.Gulp.prototype.__runTask = gulp.Gulp.prototype._runTask;
gulp.Gulp.prototype._runTask = function(task) {
  this.currentTask = task;
  this.__runTask(task);
}

/* Create a vinyl file stream from a string */
function string_src(filename, string) {
  var src = require('stream').Readable({ objectMode: true })
  src._read = function () {
    this.push(new plugins.gutil.File({ cwd: "", base: "", path: filename, contents: new Buffer(string) }))
    this.push(null)
  }
  return src
}


/* Error Handling */
var onError = function(err) {
    plugins.notify.onError({
        title:    'Gulp Task Error [' + err.plugin + ']',
        message:  'Error: <%= error.message %>'
    })(err);
    plugins.gutil.beep();
    this.emit('end');
};

/* Template file & WordPress banner templates */
var banner = {
	
	//Full Style Banner
	full :
		'/**\n' +
		' * @package <%= theme.name %> \n' + 
		' * @version <%= theme.version %>\n' +
		' * @link <%= theme.repository.url %> \n' +
		' * <%= theme.description %>\n' +
		' * \n' +
		' * @author <%= theme.author.name %> <<%= theme.author.email %>> | <%= theme.author.url %>\n' +
		' * \n' +
		' * @license <%= theme.license %> | See license.txt\n' +
		' */\n\n',
	
	// Minified Style Banner
	min :
		'/**' +
		' <%= theme.name %> v<%= theme.version %>, by <%= theme.author.name %> <<%= theme.author.email %>>' +
		' | <%= theme.author.url %> | <%= theme.repository.url %>' +
		' | Licensed under: <%= theme.license %> | See license.txt %>' +
		' */\n\n',
	
	// Theme File information (styles.css)
	theme :
		'/**\n' +
		'Theme Name: <%= theme.title %>\n' +
		' * Theme URI: <%= theme.repository.url %>\n' +
		' * Author: <%= theme.author.name %>\n' +
		' * Author URI: <%= theme.author.homepage %>\n' +
		' * Description: <%= theme.description %>\n' +
		' * Theme Package: <%= theme.name %>\n' +
		' * Version: <%= theme.version %>\n' +
		' * License: <%= theme.license %> or later\n' +
		' * Tags: <% for(var tag in theme.tags){ %> <%= theme.tags[tag] %>, <% } %> \n' +
		' * \n' +
		' * This theme is built with the <%= package.title %> | <%= package.repository.url %> \n' +
		' * (C) 2015 <%= package.author.name %> <<%= package.author.email %> > | <%= package.homepage %> \n' +
		' * \n' +
		' * This theme is based on Underscores http://underscores.me/, (C) 2012-2015 Automattic, Inc.\n' +
		' * Underscores is distributed under the terms of the GNU GPL v2 or later.\n' +
		' * \n' +
		' * Normalizing styles have been helped along thanks to the fine work of\n' +
		' * Nicolas Gallagher and Jonathan Neal http://necolas.github.com/normalize.css/\n' +
		' */\n\n',
};

/*=====  End of Functions & Templates  ======*/


/*=====  End of Theme & Gulp Setup  ======*/

/*==================================
=            Gulp Tasks            =
==================================*/

/*----------  System Tasks  ----------*/

/* Browser Sync */
gulp.task('browser-sync', function() {									// BrowserSync Task - http://www.browsersync.io/docs/options
	plugins.browserSync.init({
		proxy: url,															// Proxy to use
		browser: 'chromium-browser',										// Open website in Chromium Browser (Change to whatever browser you use: ['google chrome', firefox'])
		reloadOnRestart: true
	});
});

/* Sync Configuration */
gulp.task('config-sync', function() {									// Sync package.json and bower.json fields
  gulp.src(['package.json', 'lib/vendor/bower.json'])
    .pipe(plugins.configSync({
    	src: 'package.json',
    	fields: [ 'name', 'title', 'description', 'version', 'author', 'repository', 'bugs','keywords', 'license', {from: 'contributors', to: 'contributors'} ]
    }))	
    .pipe(gulp.dest(lib+'vendor'));
});

/* Create License */
gulp.task('license', function() {															// Setup license.txt file for the project	
	 return string_src('license.txt', '')														// Create a new vinyl file in stream called license.txt 
		.pipe(plugins.plumber({errorHandler: onError}))
		.pipe(plugins.license(theme.license, {													// Process the license template
			tiny: false, 
			organization: theme.author.name + ' | ' + theme.author.email + ' | ' + theme.author.url, 
			project: '@package '+theme.name
		}))
		.pipe(plugins.plumber.stop())
		.pipe(gulp.dest(build))																	// Output license.txt file in build folder
		.pipe(gulp.dest(dist))														// Output license.txt file in distrubution folder
		.pipe(plugins.notify({ 																	// Notify that task has completed
			title: 'Gulp License Task',
			message: 'License file created', 
			onLast: true 
		})); 
});

/* Create the theme info file - styles.css */
gulp.task('theme-info', function () {														// Setup style.css theme info file
  return string_src('style.css', '')															// Create a new vinyl file in stream called style.css
  	.pipe(plugins.plumber({errorHandler: onError}))
	.pipe(plugins.header(banner.theme, { theme : theme, package : package }))					// Add theme info banner to style.css
	.pipe(plugins.plumber.stop())
  	.pipe(gulp.dest(build))																		// Output style.css in the "build" directory
  	.pipe(gulp.dest(dist))																		// Output style.css in the "dist" directory
    .pipe(plugins.notify({ 																		// Notify that task has completed
		title: 'Gulp Theme Info Task',
		icon:  path.join(__dirname, lib + "icons/flat/css.png"),
		message: 'Created theme info file style.css', onLast: true 
	}));
})





/* Process Scripts */
gulp.task('scripts', function (){
	return gulp.src([																		// Select all JS source files
		assets.scripts.src + '**/*.js'
	])
	.pipe(plugins.changed(assets.scripts.src))									// Use only changed files
	.pipe(plugins.debug({title: 'JS files processed:'}))
	.pipe(plugins.plumber({errorHandler: onError}))
	.pipe(plugins.plumber.stop())
	.pipe(gulp.dest(build + 'js'))
	.pipe(reload({stream:true}))
	.pipe(plugins.notify({ 																	// Notify that task has completed
			title: 'Gulp JS Task',
			icon:  path.join(__dirname, lib + "icons/flat/js.png"),
			message: 'Scripts processing complete', 
			onLast: true 
		}));
});





/* Compile SASS */
gulp.task('sass', function (){
	return gulp.src([																		// Select all SASS source files, excluding icon fonts folder
			source + 'styles/**/*.scss', 
			'!' + source + 'styles/typography/fonts/icon-font/**/*.*',
			'!' + source + 'styles/styleguide/**/*.*'
			//'!' + source + 'styles/typography/fonts/icon-font/*.*'
		])
		//.pipe(plugins.debug({title: 'SCSS files processed:'}))
		.pipe(plugins.plumber({errorHandler: onError}))
		.pipe(plugins.sourcemaps.init())														// Initialize source maps
			.pipe(plugins.sass({																// Compile SASS	
				errLogToConsole: true,
				outputStyle: 'expanded',
				includePaths: plugins.neat.includePaths,										// Include Neat & Bourbon
				precision: 10
			}))
		.pipe(plugins.sourcemaps.write({includeContent: false}))								// Create souremaps
		.pipe(plugins.sourcemaps.init({loadMaps: true}))		
		.pipe(plugins.autoprefixer('last 2 version'))											// Autoprefix CSS with vendor prefixes
		.pipe(plugins.sourcemaps.write('.'))
		.pipe(plugins.gulpif(options.linting.sassLinting, 								// If SASS/SCSS linting enabled in development options
			plugins.scssLint({ 																			// Lint SASS/SCSS
				//config: './lib/custom-linters/scss-lint.yml', 										// Enable custom linter in "lib/custom-linters" directory
				customReport: plugins.scssLintStylish 
			})
		))
		.pipe(plugins.plumber.stop())
		.pipe(gulp.dest(build + 'css'))															// Output resulting CSS files and source maps to build directory
		.pipe(plugins.filter('**/*.css')) 														// Filtering stream to only css files
		.pipe(reload({stream:true})) 															// Inject Styles when style file is created
		.pipe(plugins.notify({ 																	// Notify that task has completed
			title: 'Gulp SASS Task',
			icon:  path.join(__dirname, lib + "icons/flat/sass.png"),
			message: 'SASS compilation complete', 
			onLast: true 
		}));
});

/* Minify and Optimize CSS Only*/
gulp.task('css', function (){
	return gulp.src([build + 'css/**/*.css'])												// Select all CSS files in build directory
		.pipe(plugins.cached('css',{optimizeMemory:true}))									// Only select files which have changed
		//.pipe(plugins.rev())																// Version the file
		.pipe(plugins.plumber({errorHandler: onError}))
		//.pipe(plugins.debug({title: 'CSS file minified:'}))
		.pipe(plugins.rename({ suffix: '.min' }))											// Add "-min" suffix to minified CSS file
		.pipe(plugins.cssmin({																// Minifiy the CSS ffile
			compatibility: 'ie9'
		}))
		.pipe(plugins.plumber.stop())
		.pipe(gulp.dest(dist + 'css'))														// Output the CSS file in the distrubution directory
		.pipe(reload({stream:true})) 														// Inject Styles when min style file is created
		.pipe(plugins.notify({ 																// Notify that task has completed
			title: 'Gulp CSS Task',
			icon:  path.join(__dirname, lib + "icons/flat/css.png"),
			message: 'CSS styles optimization complete', onLast: true 
		}))
		.pipe(plugins.size());
});

/* Fonts */ 
gulp.task('fonts', function (){
	return gulp.src([																		// Select all font source files
			assets.styles.fonts + '**/*.*',
			'!' + assets.styles.fonts + '**/*.scss',
		])
		.pipe(plugins.plumber({errorHandler: onError}))
		.pipe(plugins.changed(assets.styles.build + 'fonts'))									// Use only changed files
		.pipe(plugins.debug({title: 'Font files processed:'}))
		.pipe(plugins.plumber.stop())
		.pipe(gulp.dest(assets.styles.build + 'fonts'))											// Output fonts to build directory														// Inject Styles when style file is created
		.pipe(reload({stream:true}))
		.pipe(plugins.notify({ 																	// Notify that task has completed
			title: 'Gulp SASS Task',
			icon:  path.join(__dirname, lib + "icons/flat/sass.png"),
			message: 'Theme fonts processed.', 
			onLast: true 
		}));
});

/* Icons */
gulp.task('icons', function (){
	return gulp.src([source + 'images/icons/**/*.svg'])										// Select all svg icon image source files
		.pipe(plugins.plumber({errorHandler: onError}))
		//!TODO! gulp-iconfont rewrites .svg source files so can't use cached here.
		//.pipe(plugins.cached('icons'))
		//.pipe(plugins.debug({title: 'Icon file processed:'}))
		.pipe(plugins.iconfont({															// Create the icon font
	      fontName: project + '-icons', 													// Set the icon font name
	      appendUnicode: true,
	      formats: ['ttf', 'eot', 'woff', 'svg'],											// Icon font formats
	      timestamp: timeStamp,
	    }))
			.on('glyphs', function(glyphs, options) {										// Create the icon font styles
		      gulp.src([																		// Define the styles template
		      		source + 'styles/typography/fonts/icon-font/template/_icon-font.scss'
		      	])	
		        .pipe(plugins.consolidate('lodash', {
		          glyphs: glyphs,
		          fontName: project + '-icons',													// Icon font name
		          fontPath: '../fonts/'+ project + '-icon-font/',								// Icon font path in styles	(should be relative to styles.css in build folder)
		          className: project + '-icon'													// Icon font class name
		        }))
		        .pipe(gulp.dest(source + 'styles/typography/fonts/icon-font'));					// Output the icon font styles file
		    })
	    .pipe(plugins.plumber.stop())
	    .pipe(gulp.dest(build + 'fonts/' + project +'-icon-font'))							// Output the icon font files
	    .pipe(reload({stream:true}))
		.pipe(plugins.notify({																// Notify that task has completed
			title: 'Gulp Icons Task',
			message: 'Icon font creation complete', onLast: true 
		}));
});


/* Style Guide - Generate*/
gulp.task('styleguide:generate', function() {
  return gulp.src(assets.styles.stylesrc)
  	.pipe(plugins.plumber({errorHandler: onError}))
    .pipe(plugins.styleguide.generate({
        title: theme.title + ' Style Guide',
        server: true,
        disableHtml5Mode: false,
        port: 3008,
        customColors: './src/styles/styleguide/styleguide.scss',
        //appRoot: '../styleguide',
        rootPath: 'styleguide',
        overviewPath: assets.styles.src + 'styleguide/overview.md'
      }))
    .pipe(plugins.plumber.stop())
    .pipe(gulp.dest('./styleguide'));
});

/* Style Guide - Apply Styles*/
gulp.task('styleguide:applystyles', function() {
  return gulp.src(assets.styles.src + 'styles.scss')
	.pipe(plugins.plumber({errorHandler: onError}))
	.pipe(plugins.sass({																// Compile SASS	
		errLogToConsole: true,
		outputStyle: 'expanded',
		includePaths: plugins.neat.includePaths,										// Include Neat & Bourbon
		precision: 10
	}))
    .pipe(plugins.styleguide.applyStyles())
    .pipe(plugins.plumber.stop())
    .pipe(gulp.dest('./styleguide'))
    .pipe(plugins.notify({ 																	// Notify that task has completed
		title: 'Gulp SASS Task',
		icon:  path.join(__dirname, lib + "icons/flat/sass.png"),
		message: 'Styleguide Applied', 
		onLast: true 
	}));
});

/* Style Guide Task*/
gulp.task('styleguide', ['styleguide:generate', 'styleguide:applystyles']);


/* Styles - Compile SASS, Minify CSS, Process Fonts */
gulp.task('styles', function (callback){
	runSequence('fonts', 'sass', 'icons', 'css', callback);
});

/* Images */
gulp.task('images', function (){
	return gulp.src([																		// Select all image source files except icon files
			source + 'images/**/*.{png,jpg,gif,svg}',
			'!' + source + 'images/icons/*.*'
		])
		.pipe(plugins.plumber({errorHandler: onError}))								
		.pipe(plugins.changed(build + 'img'))												// Work with changed files only
		//.pipe(debug({title: 'Image file processed:'}))
		.pipe(plugins.imagemin({ 															// Optimize images
			optimizationLevel: 5, progressive: true, interlaced: false
		}))
		.pipe(plugins.plumber.stop())
		.pipe(gulp.dest(build + 'img'))														// Output optimized images
		.pipe(reload({stream:true}))
		.pipe(plugins.notify({																// Notify that task has completed
			title: 'Gulp Images Task',
			message: 'Image optimization complete', onLast: true 
		}));
});

/* Clean Templates */
gulp.task('clean-templates', function () {											// Clean out the templates from the build directory
  console.log('Clean Templates Ran');
  return plugins.del([paths.build + '**/*.php']);
  
});

/*Templates */
gulp.task('templates', function (){															// Move changed templates to build folder
	return gulp.src([
		//Templates
	 	assets.templates.src + '**/*.php', 
	])
        .pipe(plugins.changed(paths.build))													// Work with changed files only
        .pipe(plugins.debug({title: 'PHP file processed:'}))
        .pipe(plugins.replace('onlysky_wp_framework', theme.name))							// Change theme framework function names to use theme name
        .pipe(gulp.dest(paths.build))
        .pipe(reload({stream:true}))		
    	.pipe(plugins.notify({ 
			message: 'Gulp Templates Task Complete',
			icon:  path.join(__dirname, lib + "icons/flat/php.png"),
			onLast: true
		}));
});

/* Includes */
gulp.task('includes', function (){															// Move changed includes to build folder
	return gulp.src([
	 		assets.includes.src + '**/*.php', 
	 		paths.source + 'functions.php'
		], {base: paths.source})
         .pipe(plugins.changed(paths.build))												// Work with changed files only
         .pipe(plugins.replace('onlysky_wp_framework', theme.name))							// Change theme framework function names to use theme name
         //.pipe(plugins.debug({title: 'PHP file processed:'}))
         .pipe(gulp.dest(paths.build))
         .pipe(reload({stream:true}))
         .pipe(plugins.notify({ 
			message: 'Gulp Includes Task Complete',
			icon:  path.join(__dirname, lib + "icons/flat/php.png"),
			onLast: true
		}));	
});

/* Name Refrences in PHP files*/
gulp.task('php-name-references', function (){
															// Update theme name refrences in php files on theme.json change
	return gulp.src([paths.source + '**/*.php'])
		.pipe(plugins.plumber({errorHandler: onError}))	
		.pipe(plugins.replace('onlysky_wp_framework', theme.name))
		.pipe(plugins.plumber.stop())
		.pipe(gulp.dest(paths.build))
		.pipe(plugins.notify({ 
			message: 'Gulp Name Reference Task Complete',
			icon:  path.join(__dirname, lib + "icons/flat/php.png"),
			onLast: true
		}));
});

/* Built Name References */
gulp.task('built-php-name-references', function() {						// Run the php name references task after building templates
  	return plugins.runSequence( 'clean-templates', ['templates', 'includes']/*, 'php-name-references'*/ );
});

/* PHP Code Style */
gulp.task( 'phpcs', function() {
	
	return gulp.src([paths.source + '**/*.php'])
		.pipe(plugins.plumber({errorHandler: onError}))	
		.pipe(plugins.debug({title: 'PHP file processed:'}))
		.pipe(plugins.phpcs({
			bin: path.join(__dirname, lib + '/vendor/composer/bin/phpcs'),
			standard: 'WordPress'
		}))
		.pipe(plugins.phpcs.reporter( 'log' ))
		.pipe(plugins.plumber.stop())
		.pipe(plugins.notify({ 
			message: 'Gulp phpcs Task Complete',
			icon:  path.join(__dirname, lib + 'icons/flat/php.png'),
			onLast: true
		}));
});

/* PHP Beautify */
gulp.task( 'phpcbf', function() {
	return gulp.src(['src/**/*.php']) 
		//.pipe(plugins.debug({title: 'PHP file processed:'}))
		//.pipe(plugins.plumber({errorHandler: onError}))	
		.pipe(plugins.phpcbf({
		   	bin: path.join(__dirname, lib + '/vendor/composer/bin/phpcbf'),
		    standard: 'WordPress',
		    warningSeverity: 0
		}))
		//.pipe(plugins.plumber.stop())
		.pipe(gulp.dest(paths.source))
		.on('error', plugins.gutil.log)
		.pipe(plugins.notify({ 
			message: 'Gulp phpbs Task Complete',
			icon:  path.join(__dirname, lib + 'icons/flat/php.png'),
			onLast: true
		}));
});

/* Add Headers to files */
gulp.task('headers', function (){
	return gulp.src([source + 'templates/*.php'])	
		//!TODO! add if statement here to add full vs min header, also to not add these unless headers have changed (theme.json)
		//.pipe(plugins.header(banner.full, { theme : theme, package : package }))
		//.pipe(gulp.dest(build));
});

// !TODO
// Probably move this into the both the build and dist tasks... since you only need it once you've done that.
// you may need this to run first if the default gulp task rebuilds your whole project for the build dir (which you like to dev WP)
/* First Run - Setup theme and project  */
gulp.task('first-run', function (){
	return plugins.runSequence('theme-info','license','includes','templates');
});


/* FTP Sync to Remote */
gulp.task( 'ftpSync', function () {

    if (argv.sync) {
    	console.log("Syncing to remote FTP.");

	    var ftpSync = plugins.ftp.create( {
		    host:     options.staging.host,
		    user:     options.staging.user,
		    password: options.staging.password,
		    parallel: 10,
		    log:      plugins.gutil.log
		} );

	    console.log("FTP Sync Destination Host: " + options.staging.host);
	    console.log("FTP Sync Destination Path: " + options.staging.path);

	    // using base = '.' will transfer everything to /public_html correctly
	    // turn off buffering in gulp.src for best performance
	    return gulp.src( paths.build + '**/*.*', { /*base: '.',*/ buffer: false } )
	        .pipe( ftpSync.newer( options.staging.path ) ) 										// only upload newer files
	        .pipe( ftpSync.dest( options.staging.path ) )
	        .pipe(plugins.notify({ 
				message: 'Gulp FTP Sync Task Complete',
				onLast: true
			}));
    }
    else {
    	console.log("FTP Syncing Disabled. Enable FTP Syncing with '--sync' flag. ");
    }
} );

/*----------  User Tasks  ----------*/

/* Watch Files for Changes */
gulp.task('watch', ['browser-sync'], function() {											// Watch Files Task
	
  	// Watch Config Files
	gulp.watch('./package.json', ['config-sync', 'theme-info']);									// Watch framework config file (package.json): sync, create theme info file on change
	gulp.watch(paths.source +'theme.json', ['theme-info', 'license'/*, 'built-php-name-references'*/]);	// Watch theme config file (theme.json): create theme info file on change

	// Watch Assets
	gulp.watch([																					// Watch source images files: optimize files on change
		assets.images.src + '**/*(*.png|*.jpg|*.jpeg|*.gif|*.svg)', 
		'!'+assets.images.src+'icons' 
	], ['images']);				
	gulp.watch(assets.images.src + 'icons/**/*.svg', ['icons']);									// Watch icon image files: create icon font on change												
	gulp.watch(assets.styles.src + '**/*.scss', ['sass'/*,'styleguide'*/]);							// Watch SASS/SCSS files: compile to css on change
	gulp.watch([assets.templates.src + '**/*.php'], ['templates']);									// Watch PHP files & Templates: move templates and php to build
	gulp.watch([paths.source + '*.php', assets.includes.src + '**/*.php'], ['includes']);			// Watch includes PHP files: move includes to build
  	gulp.watch([assets.scripts.src +'**/*.js'], ['scripts']);										// Watch Scripts files
  //gulp.watch(source+'**/*.php', ['php']);
  //gulp.watch([build + '**/*', dist + '**/*'], reload);
  
  	gulp.watch(paths.build + '**/*.*', ['ftpSync']);
});

/* Startup Task */
gulp.task('startup', function (callback){
	plugins.runSequence('config-sync', 'theme-info', 'includes', 'templates', /*'built-php-name-references',*/'fonts', 'sass', callback);
});


/* Default Task -> Run "gulp" to start */
//gulp.task('default', ['startup']);

gulp.task('default', function (callback){
	plugins.runSequence('startup', 'watch', callback);	
});


/* Test Task */
gulp.task('test', function(){

	//console.log(JSON.stringify(plugins));
	//console.log(Object.keys(plugins));
	//console.log(plugins);
	
	//console.log(assets.templates.src);
	//console.log(paths.lib +'vendor/composer/bin/phpcbf');
	
	//console.log(theme);

	//console.log(paths.styles.src);

	//console.log(assets);

	//console.log(banner);
});

/*=====  End of Gulp Tasks  ======*/
