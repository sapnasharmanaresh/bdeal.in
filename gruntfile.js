/*!
 *Bdeal.in
* http://bdeal.in
*@author Sapna Sharma
*/

'use strict';

/**
* Grunt Module
*/

module.exports = function(grunt){
  /**
   * Configuration
   */  
  
  grunt.initConfig({
     pkg: grunt.file.readJSON('package.json'),
     
     project:{
         app: '',
         assets: '<%= project.app %>assets',
        css: [
            '<%= project.assets %>/css/style.css'
            
        ],
        js: [
            '<%= project.assets %>/js/*/*.js'
        ]
     },
     tag: {
         banner : '/* !\n'+
                 ' * <%= pkg.name %>\n'+
                 ' * <%= pkg.title %>\n' +
                 ' * <%= pkg.url %>\n' +
                 ' * @author <%= pkg.author %>\n' +
                 ' * @version <%= pkg.version %>\n' +
                 ' * Copyright <%= pkg.copyright %>.<%= pkg.license'+
                 ' */\n'
               
     },
     sass:{
         dev:{
             options:{
                 style: 'expanded',
                 banner: '<%= tag.banner %>',
                 compass: true
             },
             files:{
                 '<%= project.assets %>/css/style.scss': '<%= project.css %>'
             }
         },
         dist: {
             options:{
                 style:'compressed',
                 compass: true
             },
             files: {
                 '<%= project.assets %>/css/style.css' : '<%=project.css %>'
             }
         }
     },
/**
 * Watch
 */
watch: {
  sass: {
    files: '<%= project.assets %>/css/{,*/}*.{scss,sass}',
    tasks: ['sass:dev']
  }
}
  });

grunt.loadNpmTasks('grunt-contrib-uglify');

/**
 * Load Grunt plugins
 */
require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);
/**
 * Default task
 * Run `grunt` on the command line
 */
grunt.registerTask('default', [
  'sass:dev',
  'watch'
]);

};
