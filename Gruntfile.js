module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // Compile sass files into single root css file
    sass: {
      dev: {
        options: {
          style: 'expanded',
          sourcemap: 'none',
        },
        files: {
          'style-uncompressed.css': 'sass/style.scss'
        }
      },
      build: {
        options: {
          style: 'compressed',
          sourcemap: 'none',
        },
        files: {
          'style.css': 'sass/style.scss'
        }
      }

    },

    // Watch for changes in all scss files
    watch: {
      css: {
        files: '**/*.scss',
        // If a change is detected, run the sass task
        tasks: ['sass', 'autoprefixer']
      }
    },

    // Prefix css for older browsers
    autoprefixer: {
      options: {
        browsers: ['last 2 versions']
      },
      // Prefix all files
      multiple_files: {
        expand: true,
        flatten: true,
        src: '*.css',
        dest: ''
      }
    }

  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.registerTask('default', ['watch']);

}